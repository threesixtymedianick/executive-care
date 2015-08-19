$(document).ready(function () {

    var required = "*  - Required";

    $(".application_form_fields").hide();
    $(".application_form_fields:first").show();

    $("#personal_details .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        var form = $("#application_form");
        form.validate({
            rules: {
                application_name                : "required",
                application_number              : { required: true, number: true },
                application_address             : "required",
                application_message             : "required",
                application_email               : { required: true, email: true },
                application_apply_reason        : "required",
                application_special_experience  : "required",
                application_strengths           : "required"
            },
            messages: {
                application_name                : required,
                application_number              : {
                    required: required,
                    number : "Please enter a valid number"
                },
                application_email               : {
                    email: "Please enter a valid email address",
                    required: required
                },
                application_message             : required,
                application_address             : required,
                application_apply_reason        : required,
                application_special_experience  : required,
                application_strengths           : required
            }
        });
        if (form.valid() === true) {
            nextFormPage($(this));
        }
    });

    $("#personal_details_two .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        var form1 = $("#application_form");
        form1.validate({
            rules: {
                application_recent_company_name             : "required",
                application_recent_company_position         : "required",
                application_recent_company_address          : "required",
                application_recent_company_number           : "required",
                application_recent_company_email            : { required: true, email: true },
                application_recent_company_from_date        : "required",
                application_recent_company_to_date          : "required",
                application_reason_for_leaving              : "required"
            },
            messages: {
                application_recent_company_name             : required,
                application_recent_company_position         : required,
                application_recent_company_address          : required,
                application_recent_company_number           : required,
                application_recent_company_email            : {
                    email: "Please enter a valid email address",
                    required: required
                },
                application_recent_company_from_date        : required,
                application_recent_company_to_date          : required,
                application_reason_for_leaving              : required
            }
        });
        if (form1.valid() === true) {
            nextFormPage($(this));
        }
    });

    $("#complete .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        var form = $("#application_form");
        form.validate({
            rules: {
                application_agree_statement             : "required",
                application_signature                   : "required"
            },
            messages: {
                application_agree_statement             : required,
                application_signature                   : required
            }
        });
        if (form.valid() === true) {
            nextFormPage($(this));
        }
    });

    $("#medical .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        nextFormPage($(this));
    });

    $("#position .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        var form = $("#application_form");
        form.validate({
            rules: {
                application_home_name_1             : "required",
                application_position_1              : "required",
                application_preferred_shift         : "required",
                application_preferred_hours         : "required",
                application_how_did_you_hear        : "required"
            },
            messages: {
                application_home_name_1             : required,
                application_position_1              : required,
                application_preferred_shift         : required,
                application_preferred_hours         : required,
                application_how_did_you_hear        : required
            }
        });
        if (form.valid() === true) {
            nextFormPage($(this));
        }
    });

    $("#education_training .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        nextFormPage($(this));
    });

    $("#references .careers__apply__left__form__nextbutton").click(function (e) {
        e.preventDefault();
        var form = $("#application_form");
        form.validate({

        });
        if (form.valid() === true) {
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