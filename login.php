<?php
include_once "$_SERVER[DOCUMENT_ROOT]/controller/startUserSession.php";
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<link rel="stylesheet" type="text/css" href="css/login.css"/>
<head>
    <!-- this is the icon in the browser tab. change the image at some point -->
    <link rel="shortcut icon" href="http://i.imgur.com/Divi9yo.png" type="image/x-icon"/>

    <title>SquadUCSD</title>
    <meta charset="utf-8">
    <meta name="description" content="UCSD study group searching site">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Zifan Yang">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/login-validation.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');
            var isUserLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
            if (isUserLoggedIn) {
                document.location.href = 'index.php';
            }

            if (window.location.href.indexOf("?verify") > -1 || window.location.href.indexOf("?not_verified") > -1) {
                $("#update-info").html("Please complete your email verification!");
            }
            else if (window.location.href.indexOf("?nonexistent_account") > -1) {
                $("#update-info").html("The account you entered does not exist!");
            }
            else if (window.location.href.indexOf("?wrong_password") > -1) {
                $("#update-info").html("Invalid login info! Please make sure you entered the correct password.");
            }

            else if (window.location.href.indexOf("?verified") > -1) {
                $("#update-info").html("Email verification successful!");
            }

            else if (window.location.href.indexOf("?activate_invalid") > -1) {
                $("#update-info").html("Invalid activation link or account already activated.");
            }

            else if (window.location.href.indexOf("?reset") > -1) {
                $("#update-info").html("Password reset successful.");
            }

            else if (window.location.href.indexOf("?sent") > -1) {
                $("#update-info").html("A link to reset your password has been sent to your email.");
            }

            else if (window.location.href.indexOf("?invalidreset") > -1) {
                $("#update-info").html("Invalid or expired reset password link.");
            }
        });
    </script>
    <script src="js/group-validation.js"></script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading" id="login-header">
                    <h3>Login
                        <h4 id="update-info"><h4>
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="col-md-6 col-md-offset-3" style="margin-bottom:10px;">
                        First time using SquadUCSD? <br>
                        <a href="register.php">
                            Register here!
                        </a>
                    </div>

                    <form id="loginForm" action="controller/loginFormAction.php" class="form-horizontal" role="form" method="POST">
                        <label class="col-md-4 control-label"></label> <!--Fix for register here -->
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="text" class="form-control" name="email" id="email" value=""
                                       placeholder="UCSD Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center" style="margin-top:10px;">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a class="btn btn-link" href="forgotpassword.php">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>