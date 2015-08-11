$(document).ready(function () {

    // The cookie name for text size
    var cookieName = "textSize";

    // The default text size
    var defaultTextSize = "0.625em";

    // The lowest limit we want the text size to go
    var textSizeLowerLimit = -1;

    // The highest limit we want the text size to go
    var textSizeUpperLimit = 3;

    // The value to adjust the font by
    var textSizeAdjustment = getCookie(cookieName);

    if (textSizeAdjustment !== null && !isNaN(textSizeAdjustment)) {
        resizeText(parseInt(textSizeAdjustment), false);
    } else {
        resizeText(0);
        setCookie(cookieName, 0, 365, '/', '', '', true)
    }

    $("#larger").click(function() {
        resizeText(1, true);
    });

    $("#smaller").click(function() {
        resizeText(-1, true);
    })

    /**
     * Resizes the text on in on the website based on the supplied multiplier
     *
     * Should usually just use a multiplier of 1, the method will then increase by 1 * 0.1, or 10%
     *
     * A cookie is set if the parameter is set
     * @param multiplier  the multiplier to increase the text by. This is multiplied by 0.1
     * @param useCookie  Whether or not to set a cookie storing this value. Should not be used on document load
     */
    function resizeText(multiplier, useCookie) {
        // Set the default font value just in case it's not set
        // This should never be the case
        if (document.body.style.fontSize == "") {
            document.body.style.fontSize = defaultTextSize;
        }

        // The value of the cookie for text size
        var cookieValue = getCookie(cookieName);

        // Check the cookie value isn't null
        // Set to 0- if it us, else parse the value to an int
        if (cookieValue == null) {
            cookieValue = 0;
        } else {
            cookieValue = parseInt(cookieValue);
        }

        /**
         * If the multiplier is a 0 then we are resetting the font size
         *
         */
        if (multiplier == 0) {
            document.body.style.fontSize = defaultTextSize;
        }
        /**
         * If the cookie value is currently the lower limit and the multiplier intends
         * to go lower, and we're intending to set a cookie (I.E, this isn't the page load) then block the change
         *
         * Or, if the cookie value is the upper limit and the multiplier intends on going higher, block the change
         */
        else if (cookieValue <= textSizeLowerLimit && multiplier === -1 && useCookie
            || cookieValue >= textSizeUpperLimit && multiplier === 1) {
            // Block the change
            useCookie = false;
        }
        /**
         * Else, set the value
         */
        else {
            document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.1) + "em";
        }

        /**
         * If we're intending to use a cookie, set the value
         */
        if (useCookie) {
            setCookie(cookieName, (cookieValue) + multiplier, 365, '/', '', '');
        }
    }

    /**
     * A function for setting cookies on the end users device
     * @param name  The name of the cookie key
     * @param value  The value of the cookie key
     * @param expires  The number of days to store the cookie for before it expires
     * @param path  The document path for the cookie, relative to the domain
     * @param domain  The domain for the cookie
     * @param secure  Whether or not the cookie is secure
     */
    function setCookie(name, value, expires, path, domain, secure) {
        // set time, it's in milliseconds
        var today = new Date();
        today.setTime(today.getTime());

        /*
         if the expires variable is set, make the correct
         expires time, the current script below will set
         it for x number of days, to make it for hours,
         delete * 24, for minutes, delete * 60 * 24
         */
        if (expires) {
            expires = expires * 1000 * 60 * 60 * 24;
        }
        var expires_date = new Date(today.getTime() + (expires));

        document.cookie = name + "=" + escape(value) +
            ((expires) ? ";expires=" + expires_date.toGMTString() : "") +
            ((path) ? ";path=" + path : "") +
            ((domain) ? ";domain=" + domain : "") +
            ((secure) ? ";secure" : "");
    }

    /**
     * Get and return the value of a cookie on the device. Returns null if no cookie is found
     * @param check_name  The cookie name to lookup
     * @returns {*}  Either the cookie, if found, or null, if cannot be found
     */
    function getCookie(check_name) {
        // first we'll split this cookie up into name/value pairs
        // note: document.cookie only returns name=value, not the other components
        var a_all_cookies = document.cookie.split(';');
        var a_temp_cookie = '';
        var cookie_name = '';
        var cookie_value = '';
        var b_cookie_found = false; // set boolean t/f default f

        for (i = 0; i < a_all_cookies.length; i++) {
            // now we'll split apart each name=value pair
            a_temp_cookie = a_all_cookies[i].split('=');

            // and trim left/right whitespace while we're at it
            cookie_name = a_temp_cookie[0].replace(/^\s+|\s+$/g, '');

            // if the extracted name matches passed check_name
            if (cookie_name == check_name) {
                b_cookie_found = true;
                // we need to handle case where cookie has no value but exists (no = sign, that is):
                if (a_temp_cookie.length > 1) {
                    cookie_value = unescape(a_temp_cookie[1].replace(/^\s+|\s+$/g, ''));
                }
                // note that in cases where cookie is initialized but no value, null is returned
                return cookie_value;
                break;
            }
            a_temp_cookie = null;
            cookie_name = '';
        }
        if (!b_cookie_found) {
            return null;
        }
    }
});



