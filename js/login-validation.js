$().ready(function () {
    $("#loginForm").validate({
        // Specify validation rules
        rules: {
            email: {
                required: true,
                maxlength: 50
            },
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
            email: {
                required: "Your email cannot be empty.",
                maxlength: "The email you entered was too long. Please check again."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});