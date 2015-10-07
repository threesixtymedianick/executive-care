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
