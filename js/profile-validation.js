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
                maxlength: 40,
                notEqualToGroup: {'.form-control-class'}
            },
            class2: {
                maxlength: 40
            },
            class3: {
                maxlength: 40
            },
            class4: {
                maxlength: 40
            },
            class5: {
                maxlength: 40
            },
            class6: {
                maxlength: 40
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
                maxlength: "Your class should be less than 40 characters"
            },
            class2: {
                maxlength: "Your class should be less than 40 characters"
            },
            class3: {
                maxlength: "Your class should be less than 40 characters"
            },
            class4: {
                maxlength: "Your class should be less than 40 characters"
            },
            class5: {
                maxlength: "Your class should be less than 40 characters"
            },
            class6: {
                maxlength: "Your class should be less than 40 characters"
            }
        },
        // Make sure the form is submitted to the destination defined
        // in the "action" attribute of the form when valid
        submitHandler: function (form) {
            form.submit();
        }
    });
    $.validator.addMethod("notEqualToGroup", function (value, element, options) {
        // get all the elements passed here with the same class
        var elems = $(element).parents('form').find(options[0]);
        // the value of the current element
        var valueToCompare = value;
        // count
        var matchesFound = 0;
        // loop each element and compare its value with the current value
        // and increase the count every time we find one
        $.each(elems, function () {
            thisVal = $(this).val();
            if (thisVal == valueToCompare) {
                matchesFound++;
            }
        });
        // count should be either 0 or 1 max
        return this.optional(element) || matchesFound <= 1;
    });
});