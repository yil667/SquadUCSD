$().ready(function () {
    $("#registrationForm").validate({
        // Specify validation rules
        rules: {
            first: {
                required: true.
                maxlength: 40
            },
            last: {
                required: true.
                maxlength: 40
            },
            email: {
                required: {
                    depends: function () {
                        $(this).val($.trim($(this).val()));
                        return true;
                    }
                },
                customemail: true,
                maxlength: 40
            },
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
            first: {
                required: "Please enter your first name.",
                maxlength: "The maximum length is 40 characters."
            },
            last: {
                required: "Please enter your last name.",
                maxlength: "The maximum length is 40 characters."
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6-12 characters long.",
                maxlength: "Your password must be at least 6-12 characters long.",
                pwcheck: "Your password can only consist of characters and numbers."
            },
            password2: {
                required: "Please re-enter your password.",
                equalTo: "Passwords do not match."
            },
            email: {
                customemail: "Please enter a valid UCSD email address.",
                maxlength: "The maximum length is 40 characters."
            }
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