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

        $('.main-screen').fadeOut(500, function() {
            $('.select-screen').fadeIn();
        });

        selectingPixels = true;

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
        }

        $('#donation-amount').html((selectedPixels*0.5).toFixed(2));
    });

    /**
     * Save the pixels
     */
    /*$('.save-button').click(function() {
        var pixels= [];
        $('.user-specified').each(function() {
            var coordinates = $(this).attr('id');
            var pixel = {
                color: $(this).css('background-color'),
                x: coordinates.substr(0, coordinates.indexOf('x')),
                y: coordinates.substr(coordinates.indexOf('x')+1, coordinates.length)
            };
            pixels.push(pixel);
        });

        var data = {
            //Get the fundraiser
            fundraiser: fundraiser,
            pixels: pixels
        };

        //Save using ajax
        $.ajax(saveUrl, {
            data: JSON.stringify(data),
            contentType: 'application/json',
            type: 'POST'
        }).done(function() {
            //Redirect back home
            $(location).attr('href', siteUrl);
        }).fail(function() {
            alert("Something's gone wrong. Please try again");
            location.reload();
        });

    });*/
});