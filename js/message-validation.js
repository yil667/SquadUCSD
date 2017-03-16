$().ready(function () {
    $("#messageForm").validate({
        // Specify validation rules
        rules: {
            sendmessageform: {
                required: true,
                maxlength: 500
            }
        },
        // Specify validation error messages
        messages: {
            sendmessageform: {
                required: "Your message cannot be empty.",
                maxlength: "Your message should be less than 500 characters."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
        
    });
});