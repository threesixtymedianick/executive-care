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
        var careHome = getParameterByName('carehome');

        if (typeof careHome !== 'undefined') {
            // Set the care home select option to the care home passed in the query string
            $('#bookAVisit_careHomes').val(careHome);
        }
    }
});

function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
