
$("#volunteer_form").validate({
    rules: {
        volunteer_name                : "required",
        volunteer_number              : { required: true, number: true },
        volunteer_address             : "required",
        volunteer_message             : "required",
        volunteer_email               : { required: true, email: true }
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