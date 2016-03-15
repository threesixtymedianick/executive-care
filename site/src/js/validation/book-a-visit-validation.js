$("#bookAVisit_form").validate({
    rules: {
        bookAVisit_date               : "required",
        bookAVisit_time               : "required",
        bookAVisit_name               : "required",
        bookAVisit_number             : { required: true, number: true },
        bookAVisit_address            : "required",
        bookAVisit_email              : { required: true, email: true, valDomain: true }
    },
    messages: {
        bookAVisit_name                : "Please enter your name",
        bookAVisit_number              : {
            required: "Please enter your contact number",
            number : "Please enter a valid number"
        },
        bookAVisit_email               : {
            email: "Please enter a valid email address",
            required: "An email address is required"
        },
        bookAVisit_address             : "Please enter an address to contact you with"
    }
});
