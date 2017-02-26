<?php
include_once '../controller/startUserSession.php';

$_SESSION['profileid'] = $_SESSION['id'];

// load the user's data from action controller
include_once '../controller/viewProfileAction.php';

// now the user object contains all the relevant user info
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

            var name = <?php echo json_encode($user->getFname()); ?>;
            $('#name').html(name);

            var major = <?php echo json_encode($user->getMajor()); ?>;
            $('#major').html(major);

            var about = <?php echo json_encode($user->getAbout()); ?>;
            $('#about').html(about);

            var phone = <?php echo json_encode($user->getPhone()); ?>;
            $('#phone').html(phone);

            var email = <?php echo json_encode($user->getEmail()); ?>;
            $('#email').html(email);
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
                    <form class="form-horizontal" role="form" method="POST" action="../controller/editProfileAction.php">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fullname" id="name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ucsdemail" class="col-sm-3 col-form-label">UCSD Email</label>
                            <div class="col-sm-9">
<<<<<<< HEAD
                                 <label name="ucsdemail" id="ucsdemail">johnsmith@ucsd.edu</label>
=======
                                 <label name="email" id="email"></label>
>>>>>>> b78e6542f0891545d914860296b405e6fce44bbd
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-sm-3 col-form-label">Major</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="major" id="major">
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