$(document).ready(function () {
    $('#application_form').multipage({
        'stayLinkable': true,      // whether or not the id of the page will be appended to the url as a hashtag for permalinking purposes
        'submitLabel': 'Submit',    // default label for the last page's submit button, if not included in form
        'hideLegend': false,        // should the plugin hide the <legend> tags?  useful in concert with externally generated nav
        'hideSubmit': true,         // should the plugin hide the submit button?
        'generateNavigation': false // should the plugin generate its own navigation buttons?
    });
    $('#application_form').getPages();
});