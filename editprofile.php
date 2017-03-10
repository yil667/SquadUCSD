<?php
include_once "$_SERVER[DOCUMENT_ROOT]/controller/startUserSession.php";

handleNotLoggedIn();

$_SESSION['profileid'] = $_SESSION['id'];

// load the user's data from action controller
include_once "$_SERVER[DOCUMENT_ROOT]/controller/viewProfileAction.php";

// now the user object contains all the relevant user info
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/common.css"/>
<link rel="stylesheet" type="text/css" href="css/profile.css"/>
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

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- UI for class drop down -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/class-list.js"></script>
    <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/profile-validation.js"></script>
    <script src="js/changepassword-validation.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            // input fields
            var major = <?php echo json_encode($user->getMajor()); ?>;
            document.getElementById('major').value = major;

            var about = <?php echo json_encode($user->getAbout()); ?>;
            document.getElementById('about').value = about;

            var phone = <?php echo json_encode($user->getPhone()); ?>;
            document.getElementById('phone').value = phone;

            var class1 = <?php echo json_encode($user->getClass1()->getClassName()); ?>;
            document.getElementById('class1').value = class1;
            var class2 = <?php echo json_encode($user->getClass2()->getClassName()); ?>;
            document.getElementById('class2').value = class2;
            var class3 = <?php echo json_encode($user->getClass3()->getClassName()); ?>;
            document.getElementById('class3').value = class3;
            var class4 = <?php echo json_encode($user->getClass4()->getClassName()); ?>;
            document.getElementById('class4').value = class4;
            var class5 = <?php echo json_encode($user->getClass5()->getClassName()); ?>;
            document.getElementById('class5').value = class5;
            var class6 = <?php echo json_encode($user->getClass6()->getClassName()); ?>;
            document.getElementById('class6').value = class6;

            if (window.location.href.indexOf("?saved") > -1) {
                $("#update-info").html("Profile updated.");
            }

            if (window.location.href.indexOf("?success") > -1) {
                $("#update-info").html("Password changed successfully.");
            }

            if (window.location.href.indexOf("?fail") > -1) {
            	$("#update-info").attr("id","error-display");
                $("#error-display").html("Password change failed: Incorrect current password entered.");
            }

            var name = <?php echo json_encode($user->getFname() . " " . $user->getLname()); ?>;
            $('#name').html(name);

            var email = <?php echo json_encode($user->getEmail()); ?>;
            $('#email').html(email);

        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-md-8 col-md-offset-2">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3>Edit Profile
                        <h4 id="update-info"><h4>
                    </h3>
                </div>
                <div class="panel-body">
                	 <form class="form-horizontal" id="changeAvatarForm" role="form" method="POST"
                          action="controller/changeAvatarAction.php">
	                	 <div class="form-group">
                            <label for="avatar" class="col-md-3 control-label">Avatar</label>
                            <div class="col-md-9">
                                <img src="img/default.jpg" style="width:128px;height:128px;" id="avatar">
                            </div>
                        </div>
                        <div class="form-group">
                        	<label for="choose" class="col-md-3 control-label"></label>
                        	<div class="col-md-9">
                        	    <label type="button" class="btn btn-success" id="choose" name="choose">
								    <input type="file" id="filename" style="display:none" accept="image/gif, image/jpeg, image/png">
								    Choose File
							   </label>
                               <button type="submit" class="btn btn-primary">Upload</button>
							</div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="editProfileForm" role="form" method="POST"
                          action="controller/editProfileAction.php">
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Full Name</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="name" id="name"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ucsdemail" class="col-md-3 control-label">UCSD Email</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="email" id="email"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-9">
                                <input type="tel" class="form-control" name="phone" id="phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-md-3 control-label">Major</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="major" id="major">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-md-3 control-label">Classes</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="class1" id="class1">
                                <input type="text" class="form-control" name="class2" id="class2">
                                <input type="text" class="form-control" name="class3" id="class3">
                                <input type="text" class="form-control" name="class4" id="class4">
                                <input type="text" class="form-control" name="class5" id="class5">
                                <input type="text" class="form-control" name="class6" id="class6">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-3 control-label">About Me</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center col-md-12">
                                <button type="submit" class="btn btn-primary hidden-xs">Save Changes</button>
                                <button type='submit' class='btn btn-primary btn-block btn-lg visible-xs'>Save Changes</button>
                            </div>
                        </div>
                    </form>

                    <form class="form-horizontal" id="changePasswordForm" role="form" method="POST"
                          action="controller/changePasswordAction.php">

                        <div class="form-group">
                            <label for="currpassword" class="col-md-3 control-label">Enter Current Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="currpassword" id="currpassword">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Enter New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password2" class="col-md-3 control-label">Confirm New Password</label>
                            <div class="col-md-9">
                                <input type="password" class="form-control" name="password2" id="password2">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center col-md-12">
                                <button type="submit" class="btn btn-primary hidden-xs">Change Password</button>
                                <button type='submit' class='btn btn-primary btn-block btn-lg visible-xs'>Change Password</button>
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