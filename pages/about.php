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
                <div class="media-list">
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Project Manager</h4>
                                <p class="list-group-item-text">Tommy Chen</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="img-responsive img-thumbnail img-rounded" alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Business Analyst</h4>
                                <p class="list-group-item-text">Wenyi Chen</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Senior System Analyst</h4>
                                <p class="list-group-item-text">Bradley Jason Anderson</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Software Architect</h4>
                                <p class="list-group-item-text">Annie Pui Man Wai</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Software Development Lead</h4>
                                <p class="list-group-item-text">Yi-Chun Lee</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Software Development Lead</h4>
                                <p class="list-group-item-text">Scott Yenhsun Chen</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Algorithm Specialist</h4>
                                <p class="list-group-item-text">Chenzhong Tao</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Algorithm Specialist</h4>
                                <p class="list-group-item-text">Jimmy Tani</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Database Specialist</h4>
                                <p class="list-group-item-text">Quinn Wong</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">Quality Assurance Lead</h4>
                                <p class="list-group-item-text">Jiaxin Yang</p>
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img src="" class="media-object img-responsive img-thumbnail img-rounded"
                                 alt="Responsive image">
                        </div>
                        <div class="media-body">
                            <div class="list-group-item">
                                <h4 class="media-heading">User Interface Specialist</h4>
                                <p class="list-group-item-text">Zifan Yang</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>Contact Us</h2>
                <p>
                    Having trouble with the web application? Want to learn more about SquadUCSD?
                    Contact us at <a href="mailto:contact@squaducsd.com">contact@squaducsd.com</a> and we’ll get
                    back to
                    you as soon as possible.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

