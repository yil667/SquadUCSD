<!-- remove '/' in </?php @BACKEND -->
<?php
include_once "$_SERVER[DOCUMENT_ROOT]/controller/startUserSession.php";

$url = $_SERVER['REQUEST_URI'];

// no flag is found, redirect to manage group page
if (strpos($url, "?groupid") === false) {
    header("Location: http://www.squaducsd.com/managegroups.php");
}
// if the link contains the flag, but user is not logged in,
// then the user shouldn't be able to edit profile
else {
    if (!isLoggedIn()) {
        $groupid = $_GET['groupid'];
        header("Location: http://www.squaducsd.com/viewgroup.php?groupid=$groupid");
    }
}

$_SESSION['groupid'] = $_GET['groupid'];
$_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// load the group's data from action controller
include_once "$_SERVER[DOCUMENT_ROOT]/controller/viewGroupProfileAction.php";

if ($group === FALSE)
    header("Location: http://www.squaducsd.com/error.php");

// if the user is actually not in the group, redirects to view profile instead
else if (!$inGroup) {
    $groupid = $_GET['groupid'];
    header("Location: http://www.squaducsd.com/viewgroup.php?groupid=$groupid");
}
// now the $group object contains all the relevant user info
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
    <script src="js/message-validation.js"></script>
    <script src="js/group-validation.js"></script>
    <script type="text/javascript">
        var minSize = <?php echo json_encode($group->getSize()); ?>;//this returns a string which causes problem for jquery validation
        minSize = parseInt(minSize, 10);//string to int

        $(document).ready(function () {
            $('#common').load('./common.php');
            $(".upload-btn").prop('disabled', true);
            var users = <?php echo json_encode($group->getUsers()); ?>;

            for (i = 0; i < users.length; i++) {
                var link = "./viewprofile.php?userid=" + users[i]["userid"];
                $('#memberlist').append("<a href='" + link + "' class='list-group-item'>"
                    + users[i]["fname"] + " " + users[i]["lname"] + "</a>");
            }

            // input fields
            var groupname = <?php echo json_encode($group->getName()); ?>;
            document.getElementById('groupname').value = groupname;

            var course = <?php echo json_encode($group->getClass()); ?>;
            document.getElementById('course').value = course;

            var size = <?php echo json_encode($group->getMaxSize()); ?>;
            document.getElementById('size').value = size;

            var about = <?php echo json_encode($group->getAbout()); ?>;
            document.getElementById('about').value = about;

            var avatar = <?php echo json_encode($group->getAvatar()); ?>;
            $('#avatar').attr("src", avatar);

            if (window.location.href.indexOf("&saved") > -1) {
                $("#update-info").html("Group profile updated.");
            }

            else if (window.location.href.indexOf("&invalidsize") > -1) {
                $('#update-info').attr('id', 'error-display');
                $("#error-display").html("New group size cannot be below number of members currently in group.");
            }

            else if (window.location.href.indexOf("&message") > -1) {
                $("#update-info").html("Message sent.");
            }

            else if (window.location.href.indexOf("&avatarupdated") > -1) {
                $("#update-info").html("Avatar updated successfully.");
            }

            else if (window.location.href.indexOf("&invalidimage") > -1) {
                $("#update-info").attr("id", "error-display");
                $("#error-display").html("Invalid image type.");

            }

            else if (window.location.href.indexOf("&invalidsize") > -1) {
                $("#update-info").attr("id", "error-display");
                $("#error-display").html("File size exceeds 200 KB.");
            }

            else if (window.location.href.indexOf("&avatarfail") > -1) {
                $("#update-info").attr("id", "error-display");
                $("#error-display").html("Unexpected error during avatar update.");
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
                    <h3>Edit Group
                        <h4 id="update-info"></h4>
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" id="changeAvatarForm" role="form" method="POST"
                          enctype="multipart/form-data"
                          action="controller/changeGroupAvatarAction.php">
                        <div class="form-group">
                            <label for="avatar" class="col-md-3 control-label">Group Avatar</label>
                            <div class="col-md-9">
                                <img src="#" style="width:128px;height:128px;" id="avatar">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <h5 id="upload-info">Maximum size: 200KB.</h5>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-9 col-md-offset-3">
                                <label type="button" class="btn btn-success btn-block btn-lg visible-xs" id="choose"
                                       name="choose">
                                    <input type="file" id="filename2" name="filename2" style="display:none"
                                           accept="image/gif, image/jpeg, image/png" onchange="preview(this);">
                                    Choose File
                                </label>
                                <label type="button" class="btn btn-success hidden-xs" id="choose" name="choose">
                                    <input type="file" id="filename" name="filename" style="display:none"
                                           accept="image/gif, image/jpeg, image/png" onchange="preview(this);">
                                    Choose File
                                </label>

                                <input type="submit" class="btn btn-primary btn-block btn-lg visible-xs upload-btn"
                                       value="Upload">
                                <input type="submit" class="btn btn-primary hidden-xs upload-btn" value="Upload">
                            </div>
                        </div>
                    </form>


                    <form class="form-horizontal" role="form" id="editGroupForm" name="editGroupForm" method="POST"
                          action="controller/editGroupAction.php">

                        <div class="form-group">
                            <label for="groupname" class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="groupname" id="groupname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="members" class="col-md-3 control-label">Members</label>
                            <div class="col-md-9">
                                <div class="list-group" name="memberlist" id="memberlist">
                                    <!-- contents here are displayed dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="course" class="col-md-3 control-label">Class</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="course" id="course">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-md-3 control-label">Maximum Size</label>
                            <div class="col-md-9">
                                <!--replace min with num from backend @DOM @SCOTT -->
                                <input type="number" class="form-control bfh-number" name="size"
                                       id="size">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-md-3 control-label">About Us</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="about" id="about" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center col-md-12">
                                <button type="button"
                                        onclick="location.href=window.location.href.replace('edit','view').split('&')[0]"
                                        class="btn btn-primary hidden-xs">View Group Profile
                                </button>
                                <button type="button"
                                        onclick="location.href=window.location.href.replace('edit','view').split('&')[0]"
                                        class="btn btn-primary visible-xs btn-lg btn-block">View Group Profile
                                </button>
                                <button type="button" class="btn btn-primary hidden-xs" data-toggle='modal'
                                    data-target="#messagegroupModal">Message</button>
                                <button type="button" class="btn btn-primary visible-xs btn-lg btn-block" data-toggle='modal'
                                        data-target="#messagegroupModal">Message</button>
                                <button type="submit" class="btn btn-primary hidden-xs">Save Changes</button>
                                <button type="submit" class="btn btn-primary visible-xs btn-lg btn-block">Save Changes</button>
                                <button type="button" class="btn btn-danger hidden-xs" data-toggle='modal'
                                        data-target="#leaveModal">Leave Group
                                </button>
                                <button type="button" class="btn btn-danger visible-xs btn-lg btn-block" data-toggle='modal'
                                        data-target="#leaveModal">Leave Group
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="leaveModal" tabindex="-1" role="dialog" aria-labelledby="leaveLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="leaveLabel">Leave Group?</h3>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button type="button" onclick="location.href='controller/leaveGroupAction.php'"
                        class="btn btn-primary">Confirm
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="messagegroupModal" tabindex="-1" role="dialog" aria-labelledby="messagegroupLabel" aria-hidden="true">
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

<script type="text/javascript">
    function preview(input) {
        var validSize = true;
        $("#upload-info").css("color","inherit");
        $(".upload-btn").prop('disabled', true);
        if (input.files && input.files[0] && typeof FileReader !== "undefined") {
            var size = input.files[0].size;
           if (size > 200000) {
                validSize = false;
                $("#upload-info").html("The file you selected exceeded 200KB!")
                $("#upload-info").css("color","#ff6666");
            }
            if (size == 0) {
                validSize = false;
                $("#upload-info").html("The file you selected is empty!")
                $("#upload-info").css("color","#ff6666");
            }
        }
        if (input.files && input.files[0] && validSize) {
            $(".upload-btn").prop('disabled', false);
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#avatar')
                    .attr('src', e.target.result)
                    .width(128)
                    .height(128);
            };
            $("#upload-info").html("Click upload to change your avatar.")
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
</body>
</html>