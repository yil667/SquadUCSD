$().ready(function () {
    $("#inviteForm").validate({
        // Specify validation rules
        rules: {
            groupselect: {
                required: true
            },
            message: {
                required: true,
                maxlength: 200
            }
        },
        // Specify validation error messages
        messages: {
            groupselect: {
                required: "You must select a group."
            },
            message: {
                required: "Your message cannot be empty.",
                maxlength: "Your message should be less than 200 characters."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
        
    });
});