$().ready(function () {
    $("#createForm").validate({
        // Specify validation rules
        rules: {
            message: {
                required: true,
                maxlength: 200
            },
            classname: {
                required: true,
                maxlength: 40
            },
            groupname: {
                required: true,
                maxlength: 40,
                formatcheck: true
            }
        },
        // Specify validation error messages
        messages: {
            message: {
                required: "Your message cannot be empty.",
                maxlength: "Your message should be less than 200 characters."
            },
            classname: {
                required: "Your message cannot be empty.",
                maxlength: "Your message should be less than 40 characters."
            },
            groupname: {
                required: "Your message cannot be empty.",
                maxlength: "Your message should be less than 40 characters.",
                formatcheck: "Please use only alphabetical characters and spaces."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
        
    });
     $.validator.addMethod("formatcheck", function (value) {
         return /^[A-Za-z\ ]+$/.test(value); // consists of only these
     });   

});