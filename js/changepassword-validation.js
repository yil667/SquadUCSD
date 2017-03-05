$().ready(function () {
    $("#changePasswordForm").validate({
        // Specify validation rules
        rules: {
            currpassword: "required",
            password: {
                required: true,
                minlength: 6,
                maxlength: 12,
                pwcheck: true
            },
            password2: {
                required: true,
                equalTo: "#password"
            }
        },
        // Specify validation error messages
        messages: {
            currpassword: "Please enter your current password.",
            password: {
                required: "Please provide a password.",
                minlength: "Your password must be between 6-12 characters long.",
                maxlength: "Your password must be between 6-12 characters long.",
                pwcheck: "Your password can only consist of characters, numbers and '!@#$%^&*-._'."
            },
            password2: {
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