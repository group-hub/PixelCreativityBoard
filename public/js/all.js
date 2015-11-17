var colorPicker = '';
var colorSelected = 'f83a22';
var maxPixels = 0;
var selectedPixels = 0;
var fundraiser = 0;

$(document).ready(function () {
    /**
     * Setup the color selector
     */
    $('.color-selector select option').each(function() {
        var color = $(this).val();
        colorPicker += '<div class="color" id="' + color.replace('#', '') + '" style="background-color:' + color + '"></div>';
    });
    $('.color-selector').html(colorPicker).show();
    $('#'+colorSelected).addClass('selected');
    maxPixels = $('#max-pixels').html();

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
    $('.grid td').click(function() {
        //If the grid item can be selected
        if (!$(this).is('.disabled')) {
            //If the user has not currently selected the item
            if (!$(this).hasClass('user-specified')) {
                if (selectedPixels < maxPixels) {
                    $(this).css('background-color', '#'+colorSelected).addClass('user-specified');
                    selectedPixels++;
                }
            } else {
                $(this).css('background-color', 'inherit').removeClass('user-specified');
                selectedPixels--;
            }
            $('#selected-pixels').html(selectedPixels);
        }
    });

    /**
     * Select fundraiser
     */
    $('.select-fundraiser li').click(function() {
       $('.select-fundraiser li').each(function() {
          $(this).removeClass('selected');
       });

        //Set the selected fundraiser
        fundraiser = $(this).attr('id');
        $(this).addClass('selected');
    });

    /**
     * Save the pixels
     */
    $('.save-button').click(function() {
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

        console.log(data);

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

    });
});
//# sourceMappingURL=all.js.map
