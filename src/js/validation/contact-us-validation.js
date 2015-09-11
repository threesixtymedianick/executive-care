$("#enquiry_form").validate({
    rules: {
        enquiry_name                : "required",
        enquiry_number              : { required: true, number: true },
        enquiry_address             : "required",
        enquiry_message             : "required",
        enquiry_email               : { required: true, email: true }
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
        enquiry_address             : "Please enter an address to contact you with"
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
        brochure_email              : { required: true, email: true }
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