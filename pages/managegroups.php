<?php
// if the user clicks on the view profile themselves
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

handleNotLoggedIn();

include_once '../controller/manageGroupAction.php';

?>

<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/profile.css"/>
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
    <script type="text/javascript">

        $(document).ready(function () {
            $('#common').load('./common.php');

            var groups = <?php echo json_encode($user->getGroups()); ?>;
            for (i = 0; i < groups.length; i++) {
                var link = "./editgroup.php?groupid=" + groups[i]["groupid"];
                $('#classlist').append("<a href='" + link + "' class='list-group-item'>"
                    + groups[i]["name"] + "</a>");
            }

            if (window.location.href.indexOf("?formed") > -1) {
                $("#update-info").html("Group created successfully!");
            }
            else if (window.location.href.indexOf("?leave") > -1) {
                $("#update-info").html("You left the group.");
            }
            else if (window.location.href.indexOf("?disbanded") > -1) {
                $("#update-info").html("Group disbanded.");
            }
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3 id='name'>Manage Groups
                        <h4 id="update-info"><h4>
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="list-group" id="classlist">
                                    <!-- contents here are displayed dynamically -->
                                </div>
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