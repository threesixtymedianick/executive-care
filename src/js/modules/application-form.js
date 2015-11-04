var queryString = require("../utils/query-string-parameter");

$(document).ready(function() {
    if ($('.careers__apply__left').length > 0) {

        // Get care home id if passed in query string
        var careHome = queryString.search('carehome');

        if (typeof careHome !== 'undefined') {
            // Set the care home select option to the care home passed in the query string
            $('#application_careHomes').val(careHome);
        }

        // Get care home id if passed in query string
        var vacancy = queryString.search('vacancy');

        if (typeof vacancy !== 'undefined') {
            // Set the care home select option to the care home passed in the query string
            $('#application_vacancyRoles').val(vacancy);
        }
    }
});