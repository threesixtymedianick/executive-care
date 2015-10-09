$(document).ready(function () {

    var required = "*  - Required";

    $("#application_form").validate({
        rules: {
            application_name                            : { required: true },
            application_email                           : { required: true, email: true, valDomain: true },
            application_number                          : { required: true, number: true },
            application_careHomes                       : { required: true },
            application_vacancyRole                     : { required: true },
            application_coverLetter                     : { required: true }
        },
        messages: {
            application_name                            : required,
            application_email                           : { required: required, email: "Please used an email address", valDomain: "Please enter a valid email address" },
            application_number                          : required,
            application_careHomes                       : required,
            application_vacancyRole                     : required,
            application_coverLetter                     : required
        }
    });
});