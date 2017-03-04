<?php
//if the user clicks on the view profile themselves
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

$url = json_encode($_SERVER['REQUEST_URI']);

// redirects the url to have suffix "user=id"
if (strrpos($url, "?") === false) {

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

    // if link is invalid
    if ($user === FALSE) {
        header("Location: ./error.php");
    }

    $_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}


?>

<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/profile.css"/>
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

            var displayButtons = <?php echo json_encode($displayButtons); ?>;

            var mygroups = <?php echo json_encode($self->getGroups()); ?>;
            for (i = 0; i < mygroups.length; i++) {
                // var is full
                // var is
                var mygrouplink = "./viewgroup.php?groupid=" + mygroups[i]["groupid"];
                $('#groupselect').append("<option href='" + mygrouplink + "'>"
                    + mygroups[i]["name"] + "</option>");
            }

            var groups = <?php echo json_encode($user->getGroups()); ?>;
            for (i = 0; i < groups.length; i++) {
                var link = "./viewgroup.php?groupid=" + groups[i]["groupid"];
                $('#grouplist').append("<a href='" + link + "' class='list-group-item'>"
                    + groups[i]["name"] + "</a>");
            }

            var class_1 = <?php echo json_encode($user->getClass1()->getClassName()); ?>;
            if (class_1 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_1 + "</p>");
            }

            var class_2 = <?php echo json_encode($user->getClass2()->getClassName()); ?>;
            if (class_2 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_2 + "</p>");
            }

            var class_3 = <?php echo json_encode($user->getClass3()->getClassName()); ?>;
            if (class_3 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_3 + "</p>");
            }

            var class_4 = <?php echo json_encode($user->getClass4()->getClassName()); ?>;
            if (class_4 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_4 + "</p>");
            }

            var class_5 = <?php echo json_encode($user->getClass5()->getClassName()); ?>;
            if (class_5 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_5 + "</p>");
            }

            var class_6 = <?php echo json_encode($user->getClass6()->getClassName()); ?>;
            if (class_6 !== "") {
                $('#courselist').append("<p class='list-group-item'>"
                    + class_6 + "</p>");
            }

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

            // dynamic element has no spacing. separate them and add spaces in between
            var messageButton = "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#messageModal'>Message</button>";
            var inviteButton = "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#inviteModal'>Invite to Existing Group</button>"
            var inviteFormButton = "<button type='button' class='btn btn-success' data-toggle='modal' data-target='#formModal'>Invite to Form New Group</button>";

            var defaultContent = "";


            if (displayButtons) {
                $("#buttons").append(messageButton);
                $("#buttons").append(" "); // add spacing
                $("#buttons").append(inviteButton);
                $("#buttons").append(" "); // add spacing
                $("#buttons").append(inviteFormButton);
            }
            else {
                $("#buttons").html(defaultContent);
            }

            if (window.location.href.indexOf("&invite") > -1) {
                $("#update-info").html("Invitation sent.");
            }

        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3 id='name'></h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">UCSD Email</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="email" id="email"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-3 control-label">Phone Number</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="phone" id="phone"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-md-3 control-label">Major</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="major" id="major"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="courses" class="col-md-3 control-label">Classes</label>
                            <div class="col-md-9">
                                <div class="list-group" id="courselist" name="courselist">
                                    <!-- contents here are inserted dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-3 control-label">About Me</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="about" id="about"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="groups" class="col-md-3 control-label">Groups</label>
                            <div class="col-md-9">
                                <div class="list-group" id="grouplist" name="grouplist">
                                    <!-- contents here are inserted dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center" id="buttons">
                            </div>
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
                        <label name="selectlabel" id="selectlabel" for="groupselect">Select Group</label>
                        <select id="groupselect" name="groupselect">
                            <!-- groups inserted dynamically -->
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
                        <label name="grouplabel" id="grouplabel" for="groupname">Group Name</label>
                        <input class="form-control" name="groupname" id="groupname">
                    </div>

                    <div class="form-group">
                        <label name="classlabel" id="classlabel" for="classname">Class</label>
                        <input class="form-control" name="classname" id="classname">
                    </div>

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