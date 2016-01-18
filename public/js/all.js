var colorPicker = '';
var colorSelected = '00d4ff';
var selectedPixels = 0;
var pixelsSelected = [];
var selectingPixels = false;

$(document).ready(function () {

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
            } else {
                $(this).css('fill', '#333').removeClass('user-specified');
                selectedPixels--;
                var index = pixelsSelected.indexOf($(this).attr('id'));
                pixelsSelected.splice(index, 1);
            }
        } else if (selectingPixels) {
            swal({
                title: "Someone's already taken that pixel!",
                type: "error"
            });
        }

        $('#donation-amount').html((selectedPixels*0.5).toFixed(2));
    });

    /**
     * Save the pixels and redirect
     */
    $('.donate').click(function() {

        $('.donate').attr("disabled", true);

        if (pixelsSelected.length > 3) {
            var pixels = [];
            for (var i = 0; i < pixelsSelected.length; i++) {
                var pixel = {
                    color: $(this).css('fill'),
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
                title: "You must select at least 4 pixels!",
                type: "warning"
            });
        }

        event.preventDefault();
    });
});
//# sourceMappingURL=all.js.map
