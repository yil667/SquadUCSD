<!-- remove '/' in </?php @BACKEND -->
<?php
include_once '../controller/startUserSession.php';

$url = $_SERVER['REQUEST_URI'];

// no flag is found, redirect to manage group page
if (strpos($url, "?groupid") === false) {
    header("Location: ./managegroups.php");
}
// if the link contains the flag, but user is not logged in,
// then the user shouldn't be able to edit profile
else {
    if (!isLoggedIn()) {
        $groupid = $_GET['groupid'];
        header("Location: ./viewgroup.php?groupid=$groupid");
    }
}

$_SESSION['groupid'] = $_GET['groupid'];
$_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// load the group's data from action controller
include_once '../controller/viewGroupProfileAction.php';

if($group === FALSE)
    header("Location: ./error.php");

// if the user is actually not in the group, redirects to view profile instead
else if (!$inGroup) {
    $groupid = $_GET['groupid'];
    header("Location: ./viewgroup.php?groupid=$groupid");
}
// now the $group object contains all the relevant user info
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
<link rel="stylesheet" type="text/css" href="../css/profile.css"/>
<head>
    <!-- this is the icon in the browser tab. change the image at some point -->
    <link rel="shortcut icon" href="http://i.imgur.com/Divi9yo.png" type="image/x-icon" />

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
    <script src="../js/class-list.js"></script>
     <!-- jQuery form validation -->
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script type="text/javascript">
        var minSize = <?php echo json_encode($group->getSize()); ?>;//this returns a string which causes problem for jquery validation
        minSize = parseInt(minSize, 10);//string to int

        $(document).ready(function () {
            $('#common').load('./common.php');
            var users = <?php echo json_encode($group->getUsers()); ?>;

            for (i = 0; i < users.length; i++) {
                var link = "./viewprofile.php?userid=" + users[i]["userid"];
                $('#memberlist').append("<a href='" + link + "' class='list-group-item'>"
                    + users[i]["fname"] + " " + users[i]["lname"]  + "</a>");
            }

            // input fields
            var groupname = <?php echo json_encode($group->getName()); ?>;
            document.getElementById('groupname').value = groupname;

            var course = <?php echo json_encode($group->getClass()); ?>;
            document.getElementById('course').value = course;

            var size = <?php echo json_encode($group->getMaxSize()); ?>;
            document.getElementById('size').value = size;

            if (window.location.href.indexOf("&saved") > -1) {
                $("#update-info").html("Group profile updated.");
            }

            if (window.location.href.indexOf("&invalidsize") > -1) {
                $('#update-info').attr('id', 'error-display');
                $("#error-display").html("New group size cannot be below number of members currently in group.");
            }

        });
    </script>
    <script src="../js/group-validation.js"></script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3>Edit Group
                        <h4 id="update-info"><h4>
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" id="editGroupForm" name="editGroupForm" method="POST"
                          action="../controller/editGroupAction.php">

                        <div class="form-group">
                            <label for="groupname" class="col-sm-3 control-label">Group Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="groupname" id="groupname">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="members" class="col-sm-3 control-label">Members</label>
                            <div class="col-sm-9">
                                <div class="list-group" name="memberlist" id="memberlist">
                                    <!-- contents here are displayed dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="course" class="col-sm-3 control-label">Class</label>
                             <div class="col-sm-9 ui-widget">
                                <input type="text" class="form-control" name="course" id="course">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-3 control-label">Group Size</label>
                            <div class="col-sm-9">
                                <!--replace min with num from backend @DOM @SCOTT -->
                                <input type="number" class="form-control bfh-number" name="size"
                                       id="size">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="button"
                                        onclick="location.href=window.location.href.replace('edit','view')"
                                        class="btn btn-primary">View Group Profile
                                </button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-danger" data-toggle='modal'
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
                <button type="button" onclick="location.href='../controller/leaveGroupAction.php'"
                        class="btn btn-primary">Confirm
                </button>
            </div>
        </div>
    </div>
</div>

</body>
</html>