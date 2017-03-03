$().ready(function () {

    $("#editGroupForm").validate({
        // Specify validation rules
        rules: {
            groupname: {
                required: true
            },
            course: {
                required: true
            },
            size: {
                required: true
            }
        },
        // Specify validation error messages
        messages: {
            groupname: {
                required: "Group name cannot be empty"
            },
            course: {
                required: "Course name cannot be empty"
            },
            size: {
                required: "Size cannot be empty"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});