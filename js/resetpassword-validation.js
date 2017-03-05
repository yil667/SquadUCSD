$().ready(function () {
    $("#changePasswordForm").validate({
        // Specify validation rules
        rules: {
            newpassword: {
                required: true,
                minlength: 6,
                maxlength: 12,
                pwcheck: true
            },
            confirmpass: {
                required: true,
                equalTo: "#password"
            }
        },
        // Specify validation error messages
        messages: {
            newpassword: {
                required: "Please provide a password.",
                minlength: "Your password must be at least 6-12 characters long.",
                maxlength: "Your password must be at least 6-12 characters long.",
                pwcheck: "Your password can only consist of characters, numbers and '!@#$%^&*-._'."
            },
            confirmpass: {
                required: "Please re-enter your password.",
                equalTo: "Passwords do not match."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d!@#$%^&*\-._]+$/.test(value); // consists of only these
    });

});