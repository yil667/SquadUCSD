<?php
//if the user clicks on the view profile themselves
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

$url = json_encode($_SERVER['REQUEST_URI']);

// redirects the url to have suffix "user=id"
if (strrpos($url, "?") == "") {

    if (!isLoggedIn())
        handleNotLoggedIn();
    else {
        $profileid = getUserId();
        $redirectUrl = "Location: ./viewprofile.php?userid=$profileid";
        header($redirectUrl);
    }
}

// otherwise we load the id into the session variable and
// call the action controller
else {

    $_SESSION['profileid'] = $_GET['userid'];

    // this action controller will fetch the user data into the $user variable
    include_once "../controller/viewProfileAction.php";

    $_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}


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

            var isUserLoggedIn = <?php echo json_encode($isLoggedIn); ?>;

            var isOwnPage = <?php echo json_encode($_GET['userid'] == getUserId()); ?>;

            var name = <?php echo json_encode($user->getFname() . "'s Profile"); ?>;
            $('#name').html(name);

            var nameMessage = <?php echo json_encode("Message " . $user->getFname()); ?>;
            $('#nameMessage').html(nameMessage);

            var nameInvite = <?php echo json_encode("Invite " . $user->getFname() . " to Existing Group"); ?>;
            $('#nameInvite').html(nameInvite);

            var nameForm = <?php echo json_encode("Invite " . $user->getFname() . " to Form Group"); ?>;
            $('#nameForm').html(nameForm);

            var major = <?php echo json_encode($user->getMajor()); ?>;
            $('#major').html(major);

            var about = <?php echo json_encode($user->getAbout()); ?>;
            $('#about').html(about);

            var phone = <?php echo json_encode($user->getPhone()); ?>;
            $('#phone').html(phone);

            var email = <?php echo json_encode($user->getEmail()); ?>;
            $('#email').html(email);

            var loggedInContent =
                "<button type='button' class='btn btn-primary' role='button' data-toggle='modal' data-target='#messageModal'>Message" +
                "</button>" +
                "<button type='button' class='btn btn-success' role='button' data-toggle='modal' data-target='#inviteModal'>Invite to Existing Group" +
                "</button>" +
                "<button type='button' class='btn btn-success' role='button' data-toggle='modal' data-target='#formModal'>Invite to Form New Group" +
                "</button>";
            var defaultContent = "";
            var selfProfile = "";

            if (isUserLoggedIn  && !isOwnPage) {
                $("#buttons").html(loggedInContent);
            }
            else {
                $("#buttons").html(defaultContent);
            }
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3 id='name'></h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">UCSD Email</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" name="email" id="email"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-sm-3 control-label">Phone Number</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" name="phone" id="phone"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="major" class="col-sm-3 control-label">Major</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" name="major" id="major"></p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="about" class="col-sm-3 control-label">About Me</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" name="about" id="about"></p>
                            </div>
                        </div>

                        <div class="button" id="buttons" name="buttons">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="nameMessage"></h3>
            </div>
            <div class="modal-body">
                <form action="../controller/userMessageAction.php" role="form" method="POST" id="messageform">
                    <div class="form-group">
                        <label name="message" id="message" for="sendmessageform">Message</label>
                        <textarea class="form-control" name="sendmessageform" id="sendmessageform" rows="3"></textarea>
                    </div>


                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button id="send-btn" type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="inviteLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="nameInvite"></h3>
            </div>
            <div class="modal-body">

                <form action="../controller/userSendInviteAction.php" role="form" method="POST" id="messageform">
                    <div class="form-group">
                        <label name="message" id="message" for="groupselect">Select Group</label>
                        <select id="groupselect" name="groupselect">
                            <option></option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label name="message" id="message" for="messageboxinvite">Message</label>
                        <textarea class="form-control" name="messageboxinvite" id="messageboxinvite"
                                  rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button id="send-btn" type="submit" class="btn btn-primary">Send Invite</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="messageLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="nameForm"></h3>
            </div>
            <div class="modal-body">
                <form action="../controller/userSendInviteAction.php" role="form" method="POST" id="messageform">
                    <div class="form-group">
                        <label name="message" id="message" for="messageboxform">Message</label>
                        <textarea class="form-control" name="messageboxform" id="messageboxform"
                                  rows="3"></textarea>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button id="send-btn" type="submit" class="btn btn-primary">Send Invite</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


</body>


</html>