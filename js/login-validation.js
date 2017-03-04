$().ready(function () {

    $("#loForm").validate({
        // Specify validation rules
        rules: {
            enail: {
                required: true,
                maxlength:
            },
            password: {
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            phone: "Please enter a valid phone number (8-15 characters).",
            major: {
                maxlength: "Your major should be less than 40 characters."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});