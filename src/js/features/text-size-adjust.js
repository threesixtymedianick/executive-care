$(document).ready(function() {

    // min font size
    var min = 14;

    // max font size
    var max = 18;

    // font resize these elements
    var elm = $('.main').find('p, h1, h2, h3');

    // Set size on page load if cookie value is set
    if (getCookie() !== undefined) {
        elm.css({'fontSize' : parseFloat(getCookie())});
    }

    // Increase font size
    $('#larger').click(function(e) {

        e.preventDefault();

        if (getCookie() === undefined) {
            var currentSize = parseFloat($('p').css('fontSize'));
        } else {
            var currentSize = parseFloat(getCookie());
        }

        // if the font size is lower or equal than the max value
        if (currentSize <= max) {

            // Onload text size is in em's, so the currentSize calculation
            // returns a value smaller than the minimum
            if (currentSize < min) {
                currentSize = min;
            }

            // increase the size
            currentSize = currentSize + 1;

            // set the font size
            elm.css({'fontSize' : currentSize});

            // Set cookie value
            setCookie(parseFloat(currentSize));
        }
    });

    // Decrease font size
    $('#smaller').click(function(e) {

        e.preventDefault();

        if (getCookie() === undefined) {
            var currentSize = parseFloat($('p').css('fontSize'));
        } else {
            var currentSize = parseFloat(getCookie());
        }

        // if the font size is greater or equal than min value
        if (currentSize >= min) {

            // decrease the size
            currentSize = currentSize - 1;

            // set the font size
            elm.css({'fontSize' : currentSize});

            // Set cookie value
            setCookie(parseFloat(currentSize));
        }
    });

    /**
     * Set a text-size cookie
     * @param int value
     */
    function setCookie(value) {
        $.cookie('text-size', value, { expires: 365, path: '/' });
    }

    /**
     * Get the text-size cookie
     * @return int
     */
    function getCookie() {
        return $.cookie('text-size');
    }
});
