$().ready(function () {
    $("#inviteForm").validate({
        // Specify validation rules
        rules: {
            messageboxinvite: {
                maxlength: 500
            },
            groupid: {
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            messageboxinvite: {
                maxlength: "Your message should be less than 500 characters."
            },
            groupid: {
                required: "You must select a group"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
        
    });

});