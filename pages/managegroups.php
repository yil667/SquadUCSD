<?php
// if the user clicks on the view profile themselves
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

$url = json_encode($_SERVER['REQUEST_URI']);

// redirects the url to homepage if the user is not logged in
handleNotLoggedIn();

?>

<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/profile.css"/>
<head>
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

        });

    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3 id='name'>Manage Groups</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">CSE100</a>
                                    <a href="#" class="list-group-item">CSE110</a>
                                    <a href="#" class="list-group-item">ECON100A</a>
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