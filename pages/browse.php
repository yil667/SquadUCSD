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
<link rel="stylesheet" type="text/css" href="../css/search_result_entry.css"/>
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
    <!-- UI for class drop down -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/class-list.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
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
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h4>Name</h4></div>
                <div class="panel-body">
                    <div class="basicinfo">
                        <div class="list-inline">
                            <label for="classes">Matched Classes:</label>
                            <p class="list-group-item" name="classes" id="classes">CSE11</p>
                        </div>
                    </div>


                    <div class="text-center buttons" id="button">
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