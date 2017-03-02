<!-- remove '/' in </?php @BACKEND -->
<?php
include_once '../controller/startUserSession.php';

// no flag is found, redirect to manage group page
$url = $_SERVER['REQUEST_URI'];

if (strpos($url, "?") === false) {
    header("Location: ./managegroups.php");
}
// if the link contains the flag, but user is not logged in,
// then the user shouldn't be able to edit profile
else {
    if(!isLoggedIn()){
        $groupid = $_GET['groupid'];
        header("Location: ./viewgroup.php?groupid=$groupid");
    }
}

$_SESSION['groupid'] = $_GET['groupid'];
$_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
// load the group's data from action controller
include_once '../controller/viewGroupProfileAction.php';

if(!$inGroup){
        $groupid = $_GET['groupid'];
        header("Location: ./viewgroup.php?groupid=$groupid");
}
// now the group object contains all the relevant user info
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
            var users = <?php echo json_encode($group->getUsers()); ?>;
            for (i = 0; i < users.length; i++) {
                var link = "./viewprofile.php?userid=" + users[i]["userid"];
                $('#memberlist').append("<a href='" + link + "' class='list-group-item'>"
                    + users[i]["fname"] + "</a>");
            }
        
            // input fields
            var groupname = <?php echo json_encode($group->getName()); ?>;
            document.getElementById('groupname').value = groupname;

            var course = <?php echo json_encode($group->getClass()); ?>;
            document.getElementById('course').value = course;

            var size = <?php echo json_encode($group->getMaxSize()); ?>;
            document.getElementById('size').value = size;
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading">
                    <h3>
                        Edit Group
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="../controller/editGroupAction.php">

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
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="course" id="course">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-3 control-label">Group Size</label>
                            <div class="col-sm-9">
                                <!--replace min with num from backend @DOM @SCOTT -->
                                <input type="number" class="form-control bfh-number" min="2" max="15" name="size"
                                       id="size">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="button" onclick="location.href=window.location.href.replace('edit','view')" class="btn btn-primary">View Group Profile</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-danger" role='button' data-toggle='modal' data-target="#leaveModal">Leave Group</button>
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
                <button class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>