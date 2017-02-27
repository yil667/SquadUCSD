

<?php
include_once '../controller/startUserSession.php';

handleNotLoggedIn();

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
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="../js/class-list.js"></script>
     <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="../js/profile-validation.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            var name = <?php echo json_encode($user->getFname() . " " .$user->getLname()); ?>;
            $('#name').html(name);

            var email = <?php echo json_encode($user->getEmail()); ?>;
            $('#email').html(email);

            // input fields
            var major = <?php echo json_encode($user->getMajor()); ?>;
            document.getElementById('major').value = major;

            var about = <?php echo json_encode($user->getAbout()); ?>;
            document.getElementById('about').value = about;

            var phone = <?php echo json_encode($user->getPhone()); ?>;
            document.getElementById('phone').value = phone;

        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3>Edit Profile</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="../controller/editProfileAction.php">
                        <div class="form-group">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <label class="form-control-static" name="Full Name" id="name"></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ucsdemail" class="col-sm-3 col-form-label">UCSD Email</label>
                            <div class="col-sm-9">
                                 <label class="form-control-static" name="email" id="email"></label>
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
                            <label for="major" class="col-sm-3 col-form-label">Classes</label>
                            <div class="col-sm-9 ui-widget">
                                <input type="text" class="form-control" id="class1">
                                <input type="text" class="form-control" id="class2">
                                <input type="text" class="form-control" id="class3">
                                <input type="text" class="form-control" id="class4">
                                <input type="text" class="form-control" id="class5">
                                <input type="text" class="form-control" id="class6">

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

                    <form class="form-horizontal" id="changePasswordForm" role="form" method="POST" action="../controller/changePasswordAction.php">

                    <div class="form-group">
                        <label for="currpassword" class="col-sm-3 col-form-label">Enter Current Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="currpassword" id="currpassword">
                        </div>
                    </div>

               
                    <div class="form-group">
                        <label for="password" class="col-sm-3 col-form-label">Enter New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password2" class="col-sm-3 col-form-label">Confirm New Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password2" id="password2">
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                             <br>
                            <a class="btn btn-link" href="forgotpassword.php">Forgot password?</a>
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