$("#enquiry_form").validate({
    rules: {
        name    : "required",
        number  : {
                    required: true,
                    number: true
                },
        address : "required",
        message : "required",
        email   : {
                required: true,
                email: true
            }
    },
    messages: {
        name: "Please enter your name",
        number: "Please enter your contact number",
        email: "Please enter a valid email address",
        message: "Please enter a message to send",
        address: "Please enter an address to contact you with"
    }
});

$("#brochure_form").validate({
    rules: {
        care_home       : "required",
        delivery_method : "required",
        name            : "required",
        number          : {
                            required: true,
                            number: true
                        },
        address         : "required",
        message         : "required",
        email           : {
                        required: true,
                        email: true
                    }
    },
    messages: {
        care_home       : "Please choose a Care Home",
        delivery_method : "Please choose a delivery method",
        name            : "Please enter your name",
        number          : "Please enter your contact number",
        email           : "Please enter a valid email address",
        message         : "Please enter a message to send",
        address         : "Please enter an address to contact you with"
    }
});