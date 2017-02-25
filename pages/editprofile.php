<?php
include_once '../controller/startUserSession.php';
?>

<!DOCTYPE html>
<html>
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
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3>Edit Profile</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fullname" id="name" value="John Smith">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ucsdemail" class="col-sm-3 col-form-label">UCSD Email</label>
                            <div class="col-sm-9">
                                 <label name="ucsdemail" id="ucsdemail"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 col-form-label">Preferred Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email"
                                       value="foo@example.com">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="phone" id="phone" value="1-(123)-456-7890">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-sm-3 col-form-label">Major</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="major" id="major" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-sm-3 col-form-label">About Me</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer"></div>
</body>
</html>