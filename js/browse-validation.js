$().ready(function () {
    $("#searchForm").validate({
        // Specify validation rules
        rules: {
            course: {
                maxlength: 40,
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            course: {
                maxlength: "Class name should be less than 40 characters.",
                required: "Please enter a class to search."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});