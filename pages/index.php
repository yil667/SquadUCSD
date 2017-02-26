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
            if (isUserLoggedIn){
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
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3 id="welcome">Welcome</h3>
                </div>

                <div class="panel-body">
                    <p class="col-sm-12">

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

