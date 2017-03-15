<?php

include_once "$_SERVER[DOCUMENT_ROOT]/controller/startUserSession.php";

$_SESSION['hash'] = $_GET['hash'];
$_SESSION['forgetEmail'] = $_GET['email'];
$_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

include_once "$_SERVER[DOCUMENT_ROOT]/controller/resetPasswordLinkAction.php";


// the script return a $valid variable for checking whether the activation
// link the user clicked on is good or not
//
// if it's invalid, say something like "invalid link", and maybe redirects
// to home page or something
//
// otherwise display the reset password form

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
    <script src="js/register-validation.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');
        });
    </script>
    <script src="js/resetpassword-validation.js"></script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading" id="login-header"><h3>Reset Password</h3></div>
                <div class="panel-body">

                    <div class="col-md-6 col-md-offset-3" style="margin-bottom:10px;">
                        Enter and confirm your new password.
                    </div>

                    <form action="controller/resetPasswordFormAction.php" class="form-horizontal" role="form"
                          name="resetForm" id="resetForm" method="POST">
                        <label class="col-md-4 control-label"></label> <!--Fix for register here -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="password" class="form-control" name="newpassword" value=""
                                       placeholder="New Password" id="newpassword">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <input type="password" class="form-control" name="confirmpass" value=""
                                       placeholder="Confirm New Password" id="confirmpass">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center" style="margin-top:10px;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <br>
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