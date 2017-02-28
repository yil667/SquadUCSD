$().ready(function () {

    $("#editProfileForm").validate({
        // Specify validation rules
        rules: {
            phone: {
                minlength: 8,
                maxlength: 15,
                digits: true
            },
            major: {
                maxlength: 40
            },
            about: {
                maxlength: 200
            },
            class1: {
                maxlength: 10
            },
            class2: {
                maxlength: 10
            },
            class3: {
                maxlength: 10
            },
            class4: {
                maxlength: 10
            },
            class5: {
                maxlength: 10
            },
            class6: {
                maxlength: 10
            }
        },
        // Specify validation error messages
        messages: {
            phone: "Please enter a valid phone number (8-15 characters)",
            major: {
                maxlength: "Your major should be less than 40 characters"
            },
            about: {
                maxlength: "Your about should be less than 200 characters"
            },
            class1: {
                maxlength: "Your class should be less than 10 characters"
            },
            class2: {
                maxlength: "Your class should be less than 10 characters"
            },
            class3: {
                maxlength: "Your class should be less than 10 characters"
            },
            class4: {
                maxlength: "Your class should be less than 10 characters"
            },
            class5: {
                maxlength: "Your class should be less than 10 characters"
            },
            class6: {
                maxlength: "Your class should be less than 10 characters"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });

});