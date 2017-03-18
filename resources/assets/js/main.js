var colorPicker = '';
var colorSelected = '00d4ff';
var selectedPixels = 0;
var pixelsSelected = [];
var selectingPixels = false;

$(document).ready(function () {

    var setImageTwo = function() {
        $('#image-swap').fadeIn(500).html('<a href="http://www.childrenssociety.org.uk/" id="logo-2"><img src="/images/cs-logo.png" alt="The Children\'s Society" class="logo" /></a>');
    };

    $('#image-swap').delay(2000).fadeOut(500, function () { setImageTwo(); });

    setTimeout(function() {
        $('.grid rect').tooltipster();
    }, 3000);

    $('.start').click(function(event) {
        selectingPixels = true;

        $('.main-screen').fadeOut(500, function() {
            $('.select-screen').fadeIn();
        });

        event.preventDefault();
    });

    $('.instructions-button').click(function(event) {
        swal({
            title: "Instructions",
            text: '<div class="instruction"><img src="/images/pictograms/picto1.jpeg" alt="Select a colour" /><p>Select a colour</p></div>' +
            '<div class="instruction"><img src="/images/pictograms/picto2.jpg" alt="Create Art" /><p>Create amazing artwork</p></div>' +
            '<div class="instruction"><img src="/images/pictograms/picto3.jpg" alt="Donate to Save" /><p>Donate to save</p></div>' +
            '<div class="grid-full">When the grid is full, a new grid appears</div>',
            html: true,
            customClass: "instructions-modal"
        });

        event.preventDefault();
    });

    /**
     * Setup the color selector
     */
    $('.color-selector select option').each(function() {
        var color = $(this).val();
        colorPicker += '<div class="color" id="' + color.replace('#', '') + '" style="background-color:' + color + '"></div>';
    });
    $('.color-selector').html(colorPicker).show();
    $('#'+colorSelected).addClass('selected');

    /**
     * Select a color
     */
    $('.color-selector .color').click(function() {
        //Get the currently selected color
        $('.color.selected').removeClass('selected');

        //Set the new selected color
        colorSelected = $(this).attr('id').replace('#', '');
        $(this).addClass('selected');
    });

    /**
     * Select a grid item
     */
    $('.grid rect').click(function() {
        //If the grid item can be selected
        if (!$(this).is('.disabled') && selectingPixels) {
            //If the user has not currently selected the item
            if (pixelsSelected.indexOf($(this).attr('id')) == -1) {
                $(this).css('fill', '#'+colorSelected);
                selectedPixels++;
                pixelsSelected.push($(this).attr('id'));
                updateDonateMore();
            } else {
                $(this).css('fill', '#333').removeClass('user-specified');
                selectedPixels--;
                var index = pixelsSelected.indexOf($(this).attr('id'));
                pixelsSelected.splice(index, 1);
                updateDonateMore();
            }
        } else if (selectingPixels) {
            swal({
                title: "Someone's already taken that pixel!",
                type: "error"
            });
        }

        $('#donation-amount').html((selectedPixels*0.25).toFixed(2));
    });

    var updateDonateMore = function () {
        var message = '';
        var pixelsLeft = 0;

        if (selectedPixels < 10) {
            pixelsLeft = 10 - selectedPixels;
            message = "a swing seat";
        } else if (selectedPixels < 20) {
            pixelsLeft = 20 - selectedPixels;
            message = "a fun pretend motorbike";
        } else if (selectedPixels < 50) {
            pixelsLeft = 50 - selectedPixels;
            message = "a low tyre bridge";
        } else if (selectedPixels < 80) {
            pixelsLeft = 80 - selectedPixels;
            message = "two pretend cars";
        } else if (selectedPixels < 180) {
            pixelsLeft = 180 - selectedPixels;
            message = "a slide";
        }

        if (message != '') {
            if (pixelsLeft == 1) {
                message = "1 more pixel = " + message;
            } else {
                message = pixelsLeft + " more pixels would build " + message;
            }
        }

        $(".donate-more").html(message);
    };

    updateDonateMore();

    /**
     * Save the pixels and redirect
     */
    $('.donate').click(function() {

        $('.donate').attr("disabled", true);

        if (pixelsSelected.length > 7) {
            var pixels = [];
            for (var i = 0; i < pixelsSelected.length; i++) {
                var pixel = {
                    color: $("#"+pixelsSelected[i]).css("fill"),
                    x: pixelsSelected[i].substr(0, pixelsSelected[i].indexOf('x')),
                    y: pixelsSelected[i].substr(pixelsSelected[i].indexOf('x') + 1, pixelsSelected[i].length)
                };
                pixels.push(pixel);
            }

            var data = {
                pixels: pixels
            };

            //Save using ajax
            $.ajax(selectedUrl, {
                data: JSON.stringify(data),
                contentType: 'application/json',
                type: 'POST'
            }).done(function (data) {
                //Redirect to JustGiving
                $(location).attr('href', data);
            }).fail(function () {
                swal({
                    title: "Something's gone wrong. Please try again.",
                    type: "error"
                });
                location.reload();
            });
        } else {
            swal({
                title: "You must select at least 8 pixels!",
                type: "warning"
            });
        }

        event.preventDefault();
    });
});
