<?php
// we need to adjust the url accordingly (append user id)
include_once "$_SERVER[DOCUMENT_ROOT]/controller/startUserSession.php";

$url = json_encode($_SERVER['REQUEST_URI']);

// redirects the url to homepage if not groupid found
if (strrpos($url, "?groupid") == "") {
    // redirects to home page if the user is not logged in
    header("Location: http://www.squaducsd.com/index.php");
}

// otherwise we load the id into the session variable and
// call the action controller
else {
    $_SESSION['groupid'] = $_GET['groupid'];

    // this action controller will fetch the user data into the $user variable
    include_once "$_SERVER[DOCUMENT_ROOT]/controller/viewGroupProfileAction.php";

    // if link is invalid
    if ($group === false) {
        header("Location: http://www.squaducsd.com/error.php");
    }
    $_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

}

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

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="js/message-validation.js"></script>
    <script src="js/request-validation.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            var users = <?php echo json_encode($group->getUsers()); ?>;
            for (i = 0; i < users.length; i++) {
                var link = "./viewprofile.php?userid=" + users[i]["userid"];
                $('#memberlist').append("<a href='" + link + "' class='list-group-item'>"
                    + users[i]["fname"] + " " + users[i]["lname"] + "</a>");
            }

            // input fields
            var groupname = <?php echo json_encode($group->getName()); ?>;
            $('#groupname').html(groupname);

            var course = <?php echo json_encode($group->getClass()); ?>;
            if (course !== "") {
                $('#course').append("<a class='list-group-item' href='browse.php?query=" + course + "&type=users' >"
                    + course + "</a>");
            }

            var size = <?php echo json_encode($group->getMaxSize()); ?>;
            $('#size').html(size);

            var about = <?php echo json_encode($group->getAbout()); ?>;
            $('#about').html(about);

            var avatar = <?php echo json_encode($group->getAvatar()); ?>;
            $('#avatar').attr("src", avatar);

            var inGroup = <?php echo json_encode($inGroup); ?>;
            var isUserLoggedIn = <?php echo json_encode(isLoggedIn()); ?>;
            var fullGroup = <?php echo json_encode($fullGroup); ?>;

            var content;

            if (!isUserLoggedIn) {
                content = "";
                $("#buttons").html(content);
            }
            else if (inGroup) {
                content = "<button type='button' onclick=" + "location.href=window.location.href.replace('view','edit').split('&')[0]" + " class='btn btn-primary hidden-xs'>Edit Group</button> " + "<button type='button' class='btn btn-primary hidden-xs' data-toggle='modal' data-target='#messagegroupModal'>Message</button>" +
                "<button type='button' onclick=" + "location.href=window.location.href.replace('view','edit').split('&')[0]" + " class='btn btn-primary visible-xs btn-block btn-lg'>Edit Group</button> " + "<button type='button' class='btn btn-primary visible-xs btn-lg btn-block' data-toggle='modal' data-target='#messagegroupModal'>Message</button>";
            }
            else {
                if (fullGroup)
                    content = "<button type='button' class='btn btn-primary hidden-xs' role='button' data-toggle='modal' data-target='#requestModal' disabled>Request to Join Group (Full)</button>" +
                        "<button type='button' class='btn btn-primary visible-xs btn-lg btn-block' role='button' data-toggle='modal' data-target='#requestModal' disabled>Request to Join Group (Full)</button>";
                else
                    content = "<button type='button' class='btn btn-primary hidden-xs' role='button' data-toggle='modal' data-target='#requestModal'>Request to Join Group</button>" +
                        "<button type='button' class='btn btn-primary visible-xs btn-lg btn-block' role='button' data-toggle='modal' data-target='#requestModal'>Request to Join Group</button>";
            }
            $("#buttons").html(content);

            if (window.location.href.indexOf("&request") > -1) {
                $("#update-info").html("Request sent.");
            }

            else if (window.location.href.indexOf("&exist") > -1) {
                $("#update-info").html("You are already in the group.");
            }

            else if (window.location.href.indexOf("&accepted") > -1) {
                $("#update-info").html("New member added!");
            }

            else if (window.location.href.indexOf("&message") > -1) {
                $("#update-info").html("Message sent.");
            }

            else if (window.location.href.indexOf("&formed") > -1) {
                $("#update-info").html("Group created successfully!");
            }


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
                    <h3>View Group
                        <h4 id="update-info"><h4>
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">

                        <div class="form-group">
                            <label for="groupname" class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <p class="form-control-static" type="text" name="groupname" id="groupname"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="avatar" class="col-md-3 control-label">Group Avatar</label>
                            <div class="col-md-9">
                                <img src="#" style="width:128px;height:128px;" id="avatar">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="members" class="col-md-3 control-label">Members</label>
                            <div class="col-md-9">
                                <div class="list-group" id="memberlist" name="memberlist">
                                    <!-- contents here are inserted dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="class" class="col-md-3 control-label">Class</label>
                            <div class="col-md-9">
                                <p class="form-control-static" type="text" name="course" id="course"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-md-3 control-label">Group Size</label>
                            <div class="col-md-9">
                                <p class="form-control-static" type="number" name="size" id="size"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-3 control-label">About Us</label>
                            <div class="col-md-9">
                                <p class="form-control-static" name="about" id="about"></p>
                            </div>
                        </div>

                        <div class="button" id="buttons" name="buttons">
                            <!-- contents here is displayed conditionally -->
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="requestLabel">Request to Join Group</h3>
            </div>
            <div class="modal-body">
                <form action="controller/joinGroupRequestAction.php" role="form" method="POST" id="requestForm">
                    <div class="form-group">
                        <label name="message" id="message" for="messageboxreq">Message</label>
                        <textarea class="form-control" name="messageboxreq" id="messageboxreq" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-primary">Send Request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messagegroupModal" tabindex="-1" role="dialog" aria-labelledby="messagegroupLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="messagegroupLabel">Message Group Members</h3>
            </div>
            <div class="modal-body">
                <form action="./controller/messageGroupAction.php" role="form" method="POST" id="messageForm">
                    <div class="form-group">
                        <label name="message" id="message" for="messageboxreq">Message</label>
                        <textarea class="form-control" name="sendmessageform" id="sendmessageform" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>