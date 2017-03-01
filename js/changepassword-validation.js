$().ready(function () {
    $("#changePasswordForm").validate({
        // Specify validation rules
        rules: {
            currpassword: "required",
            password: {
                required: true,
                minlength: 6,
                maxlength: 12
            },
            password2: {
                required: true,
                equalTo: "#password"
            }
        },
        // Specify validation error messages
        messages: {
            currpassword: "Please enter your current password",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6-12 characters long"
            },
            password2: {
                required: "Please re-enter your password",
                equalTo: "Passwords do not match"
            },
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});