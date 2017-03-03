<?php
include_once '../controller/startUserSession.php';
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/login.css"/>
<head>
    <!-- this is the icon in the browser tab. change the image at some point -->
    <link rel="shortcut icon" href="http://i.imgur.com/Divi9yo.png" type="image/x-icon" />

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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            if (window.location.href.indexOf("?fail") > -1) {
                $("#email-error").html("The email you entered does not exist.");
            }

        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading" id="login-header">
                    <h3>Forgot Password
                        <h4 id="email-error"><h4>
                    </h3>
                </div>
                <div class="panel-body">

                    <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:10px;">
                        Enter your UCSD email address and a reset link will be sent to your email.
                    </div>

                    <form action="../controller/forgotPasswordFormAction.php" class="form-horizontal" role="form"
                          method="POST">
                        <label class="col-sm-4 control-label"></label> <!--Fix for register here -->

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="text" class="form-control" name="email" value=""
                                       placeholder="UCSD Email Address" id="email">
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