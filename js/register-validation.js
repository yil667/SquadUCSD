$().ready(function() {
  $("#registrationForm").validate({
    // Specify validation rules
    rules: {
      first: "required",
      last: "required",
      email: {
          required:  {
              depends:function(){
                  $(this).val($.trim($(this).val()));
                  return true;
              }
          },
          customemail: true
      },
      password: {
        required: true,
        minlength: 6,
        maxlength: 12
      },
      password2: {
        required: true,
        equalTo: "#password"
      }
    },
    // Specify validation error messages
    messages: {
      first: "Please enter your firstname",
      last: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 6-12 characters long"
      },
      password2: {
        required: "Please re-enter your password",
        equalTo: "Passwords do not match"
      },
      email: "Please enter a valid UCSD email address"
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });

    $.validator.addMethod("customemail",
        function(value, element) {
            return /^([a-zA-Z0-9_.\-+])+\@(([a-zA-Z0-9-])+\.)*ucsd\.edu+$/.test(value);
        }
    );
});