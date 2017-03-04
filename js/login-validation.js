$().ready(function () {
    $("#loginForm").validate({
        // Specify validation rules
        rules: {
            email: {
                required: true,
                maxlength: 40
            }
            password: {
                required: true,
                maxlength: 12
            }
        },
        // Specify validation error messages
        messages: {
            password: {
                required: "Your password cannot be empty.",
                maxlength: "The password your entered was too long. Please check again."
            },
            email: "Please enter a valid UCSD email address.",
            maxlength: "The email you entered was too long. Please check again."
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d!@#$%^&*\-._]+$/.test(value) // consists of only these
    });

    $.validator.addMethod("customemail",
        function (value, element) {
            return /^([a-zA-Z0-9_.\-+])+\@(([a-zA-Z0-9-])+\.)*ucsd\.edu+$/.test(value);
        }
    );
});