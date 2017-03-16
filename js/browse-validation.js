$().ready(function () {
    $("#searchForm").validate({
        // Specify validation rules
        rules: {
            query: {
                maxlength: 100,
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            query: {
                maxlength: "Search entry should be less than 100 characters.",
                required: "Search entry cannot be empty."
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});