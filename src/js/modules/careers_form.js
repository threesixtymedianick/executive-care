$(document).ready(function () {

    var required = "*  - Required";

    $(".application_form_fields").hide();
    $(".application_form_fields:first").show();

    var form = "#application_form",
        rules = {
        application_name                            : "required",
        application_number                          : { required: true, number: true },
        application_address                         : "required",
        application_email                           : { required: true, email: true },
        application_apply_reason                    : "required",
        application_special_experience              : "required",
        application_strengths                       : "required",
        application_recent_company_name             : "required",
        application_recent_company_position         : "required",
        application_recent_company_address          : "required",
        application_recent_company_number           : "required",
        application_recent_company_email            : { required: true, email: true },
        application_recent_company_from_date        : "required",
        application_recent_company_to_date          : "required",
        application_reason_for_leaving              : "required",
        application_agree_statement                 : "required",
        application_signature                       : "required",
        application_home_name_1                     : "required",
        application_position_1                      : "required",
        application_preferred_shift                 : "required",
        application_preferred_hours                 : "required",
        application_how_did_you_hear                : "required"
    };

    if($(form).length > 0) {
        var validator = $(form).validate({
            rules: rules
        });
    }



    $('.careers__apply__left__form__nextbutton').on('click', function (event) {
        event.preventDefault();

        var visible = $('.careers__apply__left__form').find('input[type=text], textarea, select').filter(":visible"),
            checkbox = $('.careers__apply__left__form').find('input[type=checkbox]').filter(":visible"),
            valid = 0;

        // Get elements in sections
        visible.each(function() {
            // Validate each element
            if($(this).valid()) {
                valid++;
            }
        });

        // Separate check for checkboxes
        checkbox.each(function() {
            // Validate each element
            if($(this).valid()) {
                valid++;
            }
        });

        if ((visible.length + checkbox.length) === valid) {
            nextFormPage($(this));
        }
    });

    function nextFormPage (thisPage) {
        $('.application_form_fields').fadeOut(600, function() {
            thisPage.parent().next('.application_form_fields').fadeIn();
        });
    }

    function previousFormPage () {
        $(".application_form_fields").fadeOut();
        $(this).parent().prev('.application_form_fields').fadeIn();
    }
});