jQuery.validator.addMethod("valDomain",function (emailAddress) {
    var filter = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
        return filter.test(emailAddress);
}, 'Invalid domain name.');