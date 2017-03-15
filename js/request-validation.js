$().ready(function () {
    $("#requestForm").validate({
        // Specify validation rules
        rules: {
            messageboxreq: {
                maxlength: 500
            }
        },
        // Specify validation error messages
        messages: {
            messageboxreq: {
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