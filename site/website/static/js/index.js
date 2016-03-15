(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
$(document).ready(function() {
    if ($('#careHomeMap').length > 0) {

        var mapDiv    = $('#careHomeMap'),
               id     = mapDiv.data('id'),
               lat    = mapDiv.data('lat'),
               lon    = mapDiv.data('lon'),
               latLon = new google.maps.LatLng(lat, lon);

        // Google Map Options
        var options = {
            zoom: 9,
            center: latLon,
            disableDefaultUI: true,
            zoomControl: true,
            scrollwheel: false,
            disableDoubleClickZoom: false,
        };

        // Initalise map
        var map = new google.maps.Map(document.getElementById('careHomeMap'), options);

        var marker = new google.maps.Marker({
            position: latLon,
            icon: '/website/static/images/buttons/icons/place-icon.png',
            map: map,
        });
    }
});

},{}],2:[function(require,module,exports){
$(document).ready(function () {
    if ($('.our-homes .map').length > 0) {
        // Google Map Options
        var options = {
            zoom: 7,
            center: new google.maps.LatLng(53.7996388, -1.5491221),
            disableDefaultUI: true,
            zoomControl: true,
            scrollwheel: false,
            disableDoubleClickZoom: false
        };

        // Initalise map
        var map = new google.maps.Map(document.getElementById('map'), options);

        // Get care home JSON
        $.ajax({
            url: '/ajax/care-homes',
            type: 'GET',
            dataType: 'json',
        })
            .done(function (data) {
                $.each(data, function (key, data) {
                    // Set the info box to show the first care home
                    if (key === 0) {
                        updateCareHomeDetails(data.id);
                    }

                    // Check lat long is specified
                    if (data.lat !== null && data.lon !== null) {
                        // Create LatLng
                        var latLng = new google.maps.LatLng(data.lat, data.lon);

                        var iconBase = '../website/static/images/buttons/icons/';

                        // Create marker
                        var marker = new google.maps.Marker({
                            position: latLng,
                            icon: iconBase + 'place-icon.png',
                            map: map,
                            careHomeId: data.id,
                        });

                        marker.addListener('click', function () {
                            updateCareHomeDetails(marker.careHomeId);
                        });
                    }
                });
            })
            .fail(function () {
                // Handle errors
            });

        function updateCareHomeDetails(id) {
            $.ajax({
                url: '/ajax/care-home/' + id,
                type: 'GET',
                dataType: 'json',
            })
                .done(function (data) {
                    $('.homecontent > h3.title').html(data.Title);
                    var address = data.Address;
                    address = address.replace(',', ',<br />');
                    $('.homecontent > p').html(address + '<br /> ' + data.Postcode);

                    var listingImage = data.ListingImage;

                    if ((typeof(listingImage) !== 'undefined') && listingImage !== null && listingImage !== "") {
                        $('.sidebar__panel--our-homes-find-a-home-image').css("background-image", "url('" + listingImage + "')");
                    } else {
                        $('.sidebar__panel--our-homes-find-a-home-image').css("background-image", "url('/website/static/images/default/default-home.png')");
                    }

                    $('.homecontent > a').attr('href', '/care-homes/detail/' + data.o_key);
                })
                .fail(function () {

                })
        }
    }
});

},{}],3:[function(require,module,exports){
$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "hidden" );

    var showHide = $(".show_hide:first");
    var showMoreText = '<span class="desktop-hide">Show More </span>+';
    var showLessText = '<span class="desktop-hide">Show Less </span>-';
    var viewText = "View +";
    var hideText = "Hide -";
    var errorText = "Error";

    var plus = "+";
    var minus = "-";

    function controlSlide(e) {
        $(this).closest('.sliding_content').find('.slide').slideToggle(500);

        var text = $(this).find('.show_hide').html();

        switch (text) {
            case showMoreText:
                text = showLessText;
                break;
            case showLessText:
                text = showMoreText;
                break;
            case viewText:
                text = hideText;
                break;
            case hideText:
                text = viewText;
                break;
            case plus:
                text = minus;
                break;
            case minus:
                text = plus;
                break;
            default:
                text = errorText; // Shouldn't be here
                break;
        }

        $(this).find('.show_hide').html(text);

        e.preventDefault();
    }

    // init();

    $('.our-care__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });

    $('.our-homes__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });
});
},{}],4:[function(require,module,exports){
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

},{}],5:[function(require,module,exports){
$(document).ready(function() {
    if ($('.careers__left__content__box--search').length > 0) {

        /**
         * urlParams array
         */
        var urlParams;

        /**
         * URL to redirect to
         * @type {String}
         */
        var filterUrl = '/vacancy/filter';

        urlParams = {};

        // Get query string params
        (window.onpopstate = function () {
            var match,
                pl     = /\+/g,  // Regex for replacing addition symbol with a space
                search = /([^&=]+)=?([^&]*)/g,
                decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                query  = window.location.search.substring(1);

            while (match = search.exec(query))
               urlParams[decode(match[1])] = decode(match[2]);
        })();

        var home = urlParams['home'],
            role = urlParams['role'];

        if (typeof home !== 'undefined') {
            $('select#home_search').val(home);
        }

        if (typeof role !== 'undefined') {
            $('select#vacancy_search').val(role);
        }

        // Filter vacancies by care home
        $('select#home_search').change(function() {
            window.location.href = filterUrl + '?home=' + $(this).val();
        });

        // Filter vacancies by role
        $('select#vacancy_search').change(function() {
            window.location.href = filterUrl + '?role=' + $(this).val();
        });
    }
});


},{}],6:[function(require,module,exports){
require("./modules/tabs");
require("./modules/homepage-slider");
require("./modules/blog-slider");
require("./modules/nav");
require("./modules/box-height");
require("./modules/date-picker");
require("./modules/live-chat");
require("./modules/nearby-homes-slider");
require("./modules/book-a-visit-form");
require("./modules/contact-us-form");
require("./modules/lightbox2-options");
require("./modules/googleanalytics");
require("./modules/wysiwyg-overrides");
require("./modules/application-form");
require("./modules/wysiwyg-overrides");
require("./modules/application-form");

require("./features/show-more-less");
require("./features/text-size-adjust");
require("./features/our-homes-map");
require("./features/vacancy-filter");
require("./features/care-home-map");

require("./validation/custom-validation-rules");
require("./validation/contact-us-validation");
require("./validation/volunteer-validation");
require("./validation/careers-validation");
require("./validation/book-a-visit-validation");

},{"./features/care-home-map":1,"./features/our-homes-map":2,"./features/show-more-less":3,"./features/text-size-adjust":4,"./features/vacancy-filter":5,"./modules/application-form":7,"./modules/blog-slider":8,"./modules/book-a-visit-form":9,"./modules/box-height":10,"./modules/contact-us-form":11,"./modules/date-picker":12,"./modules/googleanalytics":13,"./modules/homepage-slider":14,"./modules/lightbox2-options":15,"./modules/live-chat":16,"./modules/nav":17,"./modules/nearby-homes-slider":18,"./modules/tabs":19,"./modules/wysiwyg-overrides":20,"./validation/book-a-visit-validation":22,"./validation/careers-validation":23,"./validation/contact-us-validation":24,"./validation/custom-validation-rules":25,"./validation/volunteer-validation":26}],7:[function(require,module,exports){
var queryString = require("../utils/query-string-parameter");

$(document).ready(function() {
    if ($('.careers__apply__left').length > 0) {

        // Get care home id if passed in query string
        var careHome = queryString.search('carehome');

        if (typeof careHome !== 'undefined') {
            // Set the care home select option to the application form selection box passed in the query string
            $('#application_careHomes').val(careHome);
        }

        // Get vacancy role id if passed in query string
        var vacancy = queryString.search('vacancy');

        if (typeof vacancy !== 'undefined') {
            // Set the vacancy select option to the application form selection box passed in the query string
            $('#application_vacancyRoles').val(vacancy);
        }
    }
});
},{"../utils/query-string-parameter":21}],8:[function(require,module,exports){
$(document).ready(function(){
    $('.blogslider').bxSlider({
        mode: 'fade',
        auto : true,
        pause: 5000,
        pager: false,
        autoHover: true,
        controls: true,
        touchEnabled: false
    });
});
},{}],9:[function(require,module,exports){
var queryString = require("../utils/query-string-parameter");

$(document).ready(function() {
    if ($('.book-a-visit__left__content__box').length > 0) {
        // Date picker
        $('#bookAVisit_date').datetimepicker({
            timepicker: false,
            format: 'd/m/Y'
        });

        // Time picker
        $('#bookAVisit_time').timepicker();

        // Get care home id if passed in query string
        var careHome = queryString.search('carehome');

        if (typeof careHome !== 'undefined') {
            // Set the care home select option to the care home passed in the query string
            $('#bookAVisit_careHomes').val(careHome);
        }
    }
});

},{"../utils/query-string-parameter":21}],10:[function(require,module,exports){
$(function() {
   $('.equalHeight').matchHeight();

   $('.heightMatch').matchHeight({
    byRow: false
   });
});
},{}],11:[function(require,module,exports){
var queryString = require("../utils/query-string-parameter");

$(document).ready(function() {
    if ($('.contact-us__left').length > 0) {
        // Date picker
        $('#bookAVisit_date').datetimepicker({
            timepicker: false,
            format: 'd/m/Y'
        });

        // Time picker
        $('#bookAVisit_time').timepicker();

        // Get care home id if passed in query string
        var careHome = queryString.search('carehome');

        if (typeof careHome !== 'undefined') {
            // Set the care home select option to the care home passed in the query string
            $('#care_home_options').val(careHome);
        }
    }
});

},{"../utils/query-string-parameter":21}],12:[function(require,module,exports){
jQuery('.date_picker').datetimepicker({
  timepicker: false,
  format: 'd/m/Y'
});
},{}],13:[function(require,module,exports){
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-69155449-1', 'auto');
ga('send', 'pageview');

},{}],14:[function(require,module,exports){
$(document).ready(function(){
    $('.bxslider').bxSlider({
        adaptiveHeight: true,
        mode: 'fade',
        auto : true,
        pause: 8000,
        pager: false,
        controls: true,
        autoHover: true,
        touchEnabled: false
    });
});
},{}],15:[function(require,module,exports){
lightbox.option({
    'resizeDuration': 200,
    'wrapAround': true,
    'alwaysShowNavOnTouchDevices': true
})
},{}],16:[function(require,module,exports){
if (window.location.pathname == '/contact-us') {
    window.lpTag = window.lpTag || {};
    if (typeof window.lpTag._tagCount === 'undefined') {
        window.lpTag = {
            site: '12085730' || "",
            section: lpTag.section || "",
            autoStart: lpTag.autoStart === false ? false : true,
            ovr: lpTag.ovr || {},
            _v: '1.5.1',
            _tagCount: 1,
            protocol: location.protocol,
            events: {
                bind: function(app, ev, fn) {
                    lpTag.defer(function() {
                        lpTag.events.bind(app, ev, fn);
                    }, 0);
                },
                trigger: function(app, ev, json) {
                    lpTag.defer(function() {
                        lpTag.events.trigger(app, ev, json);
                    }, 1);
                }
            },
            defer: function(fn, fnType) {
                if (fnType == 0) {
                    this._defB = this._defB || [];
                    this._defB.push(fn);
                } else if (fnType == 1) {
                    this._defT = this._defT || [];
                    this._defT.push(fn);
                } else {
                    this._defL = this._defL || [];
                    this._defL.push(fn);
                }
            },
            load: function(src, chr, id) {
                var t = this;
                setTimeout(function() {
                    t._load(src, chr, id);
                }, 0);
            },
            _load: function(src, chr, id) {
                var url = src;
                if (!src) {
                    url = this.protocol + '//' + ((this.ovr && this.ovr.domain) ? this.ovr.domain : 'lptag.liveperson.net') + '/tag/tag.js?site=' + this.site;
                }
                var s = document.createElement('script');
                s.setAttribute('charset', chr ? chr : 'UTF-8');
                if (id) {
                    s.setAttribute('id', id);
                }
                s.setAttribute('src', url);
                document.getElementsByTagName('head').item(0).appendChild(s);
            },
            init: function() {
                this._timing = this._timing || {};
                this._timing.start = (new Date()).getTime();
                var that = this;
                if (window.attachEvent) {
                    window.attachEvent('onload', function() {
                        that._domReady('domReady');
                    });
                } else {
                    window.addEventListener('DOMContentLoaded', function() {
                        that._domReady('contReady');
                    }, false);
                    window.addEventListener('load', function() {
                        that._domReady('domReady');
                    }, false);
                } if (typeof(window._lptStop) == 'undefined') {
                    this.load();
                }
            },
            start: function() {
                this.autoStart = true;
            },
            _domReady: function(n) {
                if (!this.isDom) {
                    this.isDom = true;
                    this.events.trigger('LPT', 'DOM_READY', {
                        t: n
                    });
                }
                this._timing[n] = (new Date()).getTime();
            },
            vars: lpTag.vars || [],
            dbs: lpTag.dbs || [],
            ctn: lpTag.ctn || [],
            sdes: lpTag.sdes || [],
            ev: lpTag.ev || []
        };
        lpTag.init();
    } else {
        window.lpTag._tagCount += 1;
    }
}
},{}],17:[function(require,module,exports){
$(document).ready(function() {
	$('.mob-menu').click(function() {
		$('.site-navigation__main-navigation').toggleClass('open');
	});
});
},{}],18:[function(require,module,exports){
$(window).load(function(){
    $('.nearby-homes-slider').bxSlider({
        slideWidth: 380,
        minSlides: 2,
        maxSlides: 2,
        moveSlides: 1,
        auto : false,
        pager: false,
        controls: true,
        touchEnabled: false
    });
});

},{}],19:[function(require,module,exports){
// Wait until the DOM has loaded before querying the document
$(document).ready(function(){
    $('ul.tabs').each(function(){
        // For each set of tabs, we want to keep track of
        // which tab is active and it's associated content
        var $active, $content, $links = $(this).find('a');

        // If the location.hash matches one of the links, use that as the active tab.
        // If no match is found, use the first link as the initial active tab.
        $active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
        $active.addClass('active');

        $content = $($active[0].hash);

        // Hide the remaining content
        $links.not($active).each(function () {
            $(this.hash).hide();
        });

        // Bind the click event handler
        $(this).on('click', 'a', function(e){
            // Make the old tab inactive.
            $active.removeClass('active');
            $content.hide();

            // Update the variables with the new link and content
            $active = $(this);
            $content = $(this.hash);

            // Make the tab active.
            $active.addClass('active');
            $content.show();

            // Prevent the anchor's default click action
            e.preventDefault();
        });
    });
});
},{}],20:[function(require,module,exports){
(function() {
    if (window.CKEDITOR) {
        CKEDITOR.config.fontSize_sizes = "Small/0.75em;Normal/1em;Large/1.125em;Larger/1.25em;";
    }
}());


},{}],21:[function(require,module,exports){
"use strict";

/**
 * Get URL Parameter by name
 *
 **/
module.exports = (function() {
    return {
        search: function(name) {
            name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
            var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
                results = regex.exec(location.search);
            return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
        }
    };
}());

},{}],22:[function(require,module,exports){
$("#bookAVisit_form").validate({
    rules: {
        bookAVisit_date               : "required",
        bookAVisit_time               : "required",
        bookAVisit_name               : "required",
        bookAVisit_number             : { required: true, number: true },
        bookAVisit_address            : "required",
        bookAVisit_email              : { required: true, email: true, valDomain: true }
    },
    messages: {
        bookAVisit_name                : "Please enter your name",
        bookAVisit_number              : {
            required: "Please enter your contact number",
            number : "Please enter a valid number"
        },
        bookAVisit_email               : {
            email: "Please enter a valid email address",
            required: "An email address is required"
        },
        bookAVisit_address             : "Please enter an address to contact you with"
    }
});

},{}],23:[function(require,module,exports){
$(document).ready(function () {

    var required = "*  - Required";

    $("#application_form").validate({
        rules: {
            application_name: {
                required: true
            },
            application_email: {
                required: true,
                email: true,
                valDomain: true
            },
            application_number: {
                required: true,
                number: true
            },
            application_careHomes: {
                required: true
            },
            application_vacancyRole: {
                required: true
            },
            application_coverLetter: {
                required: true
            },
            application_cvFile: {
                extension: "pdf|doc|docx|rtf"
            }
        },
        messages: {
            application_name: required,
            application_email: {
                required: required,
                email: "Please use an email address",
                valDomain: "Please enter a valid email address"
            },
            application_number: required,
            application_careHomes: required,
            application_vacancyRole: required,
            application_coverLetter: required,
            application_cvFile: {
                extension: "Please use a valid document type"
            }
        }
    });
});
},{}],24:[function(require,module,exports){
$("#enquiry_form").validate({
    rules: {
        enquiry_name                : "required",
        enquiry_number              : { required: true, number: true },
        enquiry_message             : "required",
        enquiry_email               : { required: true, email: true, valDomain: true }
    },
    messages: {
        enquiry_name                : "Please enter your name",
        enquiry_number              : {
            required: "Please enter your contact number",
            number : "Please enter a valid number"
        },
        enquiry_email               : {
            email: "Please enter a valid email address",
            required: "An email address is required"
        },
        enquiry_message             : "Please enter a message to send",
    }
});

$("#brochure_form").validate({
    rules: {
        care_home_options           : "required",
        delivery_method_options     : "required",
        brochure_name               : "required",
        brochure_number             : { required: true, number: true },
        brochure_address            : "required",
        brochure_message            : "required",
        brochure_email              : { required: true, email: true, valDomain: true }
    },
    messages: {
        care_home_options           : "Please choose a care home",
        delivery_method_options     : "Please choose a delivery method",
        brochure_name               : "Please enter your name",
        brochure_number             : {
            required: "Please enter your contact number",
            number : "Please enter a valid number"
        },
        brochure_email              : {
            email: "Please enter a valid email address",
            required: "An email address is required"
        },
        brochure_message            : "Please enter a message to send",
        brochure_address            : "Please enter an address to contact you with"
    }
});
},{}],25:[function(require,module,exports){
jQuery.validator.addMethod("valDomain",function (emailAddress) {
    var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        return filter.test(emailAddress);
}, 'Invalid domain name.');
},{}],26:[function(require,module,exports){
$("#volunteer_form").validate({
    rules: {
        volunteer_name                : "required",
        volunteer_number              : { required: true, number: true },
        volunteer_address             : "required",
        volunteer_message             : "required",
        volunteer_email               : { required: true, email: true, valDomain: true }
    },
    messages: {
        volunteer_name                : "Please enter your name",
        volunteer_number              : {
            required: "Please enter your contact number",
            number : "Please enter a valid number"
        },
        volunteer_email               : {
            email: "Please enter a valid email address",
            required: "An email address is required"
        },
        volunteer_message             : "Please enter a message to send",
        volunteer_address             : "Please enter an address to contact you with"
    }
});
},{}]},{},[6]);
