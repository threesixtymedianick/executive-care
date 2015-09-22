jQuery.validator.addMethod("valDomain",function (emailAddress) {
    var pattern = new RegExp(/\S+@\S+\.\S+/);
    return pattern.test(emailAddress);
}, 'Invalid domain name.');