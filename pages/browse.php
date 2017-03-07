<?php
include_once '../controller/startUserSession.php';

handleNotLoggedIn();

$_SESSION['profileid'] = $_SESSION['id'];

// load the user's data from action controller
//include_once '../controller/viewProfileAction.php';

// now the user object contains all the relevant user info
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/browse.css"/>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- UI for class drop down -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');
        });
    </script>
</head>
<body>

<div id="common"></div>
<div class="container-fluid">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-custom">
            <div class="panel-body">
                <form class="form-inline" role="form" id="searchForm" name="searchForm" method="POST"
                      action="../controller/searchAction.php">


                    <div class="col-md-offset-1 col-md-5">
                        <div class="form-group" id="courseFormGroup" name="courseFormGroup">
                            <label for="course" class="control-label">Course</label>
                            <input type="text" class="form-control" name="course" id="course">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group" id="typeFormGroup" name="typeFormGroup">
                            <label for="searchtype" class="control-label">Type</label>
                            <select id="searchtype" name="searchtype">
                                <option value="users">Users</option>
                                <option value="groups">Groups</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary col-md-1" role="button">Search
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-custom">
            <div class="row">
                <div class="panel panel-custom col-md-10 col-md-offset-1">
                    <div class="panel-heading"><h4>Name</h4></div>
                    <div class="panel-body">
                        <label for="classes control-label">Matched Classes:</label>
                        <div class="list-group" name="classes" id="classes">
                            <a class="col-md-3 list-group-item">CSE11</a>
                            <a class="col-md-3 list-group-item">CSE11</a>
                            <a class="col-md-3 list-group-item">CSE11</a>
                        </div>

                        <div class="text-center buttons col-md-12" id="button">
                            <button type="button" class="btn btn-primary" role="button">View Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>