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
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="jumbotron">
                <h1>About</h1>
                <h2>Team</h2>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Project Manager</h4>
                        <p class="list-group-item-text">Tommy Chen</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Business Analyst</h4>
                        <p class="list-group-item-text">Wenyi Chen</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Senior System Analyst</h4>
                        <p class="list-group-item-text">Bradley Jason Anderson</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Software Architect</h4>
                        <p class="list-group-item-text">Annie Pui Man Wai</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Software Development Lead</h4>
                        <p class="list-group-item-text">Yi-Chun Lee</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Software Development Lead</h4>
                        <p class="list-group-item-text">Scott Yenhsun Chen</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Algorithm Specialist</h4>
                        <p class="list-group-item-text">Chenzhong Tao</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Algorithm Specialist</h4>
                        <p class="list-group-item-text">Jimmy Tani</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Database Specialist</h4>
                        <p class="list-group-item-text">Quinn Wong</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">Quality Assurance Lead</h4>
                        <p class="list-group-item-text">Jiaxin Yang</p>
                    </li>
                    <li class="list-group-item">
                        <h4 class="list-group-item-heading">User Interface Specialist</h4>
                        <p class="list-group-item-text">Zifan Yang</p>
                    </li>
                </ul>
                <h2>Contact Us</h2>
                <p>
                    Having trouble with the web application? Want to learn more about SquadUCSD?
                    Contact us at <a href="mailto:contact@squaducsd.com">contact@squaducsd.com</a> and we’ll get back to
                    you as soon as possible.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

