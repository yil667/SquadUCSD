<?php
include_once '../controller/startUserSession.php';
?>


<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/index.css"/>
<head>
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
                welcome.innerHTML += ', ' + userFirstName + '!';
            }
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div class="jumbotron">
                <h1 id="welcome">Welcome</h1>

                <p>
                    This web app allows students to form study groups for the classes they are enrolled in. Groups are
                    formed based on schedule compatibility and individual personalities and preferences. Groups can set
                    a maximum size to allow however many people in. This can be changed any time.
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>

