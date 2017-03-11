$().ready(function () {
    $("#createForm").validate({
        // Specify validation rules
        rules: {
            messageboxform: {
                maxlength: 200
            },
            classname: {
                required: true,
                maxlength: 40
            },
            groupname: {
                required: true,
                maxlength: 40
            }
        },
        // Specify validation error messages
        messages: {
            messageboxform: {
                maxlength: "Your message should be less than 200 characters."
            },
            classname: {
                required: "Your class name cannot be empty.",
                maxlength: "Your message should be less than 200 characters."
            },
            groupname: {
                required: "Your group name cannot be empty.",
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