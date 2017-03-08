<?php
include_once '../controller/startUserSession.php';
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<head>
    <!-- this is the icon in the browser tab. change the image at some point -->
    <link rel="shortcut icon" href="http://i.imgur.com/Divi9yo.png" type="image/x-icon"/>

    <title>SquadUCSD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            var welcomeMsg = document.getElementById('welcome');
            var isUserLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
            var userFirstName = <?php echo json_encode($firstName); ?>;
            if (isUserLoggedIn) {
                welcome.innerHTML = 'Welcome, ' + userFirstName + '!';
            }
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h1 id="welcome">Welcome!</h1>

                <p>
                    SquadUCSD is a web application that helps simplify the process of finding study or project
                    groups for University of California, San Diego students. Simply create an account with your
                    UCSD email address and fill out a profile page to utilize our browse function. Browse allows
                    students to view existing groups or individuals looking for a group. Just want to find a
                    partner for a homework assignment or need a group of 10 for a project? Don’t worry, this web
                    application allows students to customize the size of their groups, allowing other students to
                    see if existing groups want more members.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

