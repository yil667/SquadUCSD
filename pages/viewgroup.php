<?php
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

$url = json_encode($_SERVER['REQUEST_URI']);

// redirects the url to homepage if not groupid found
if (strrpos($url, "?") == "") {
    // redirects to home page if the user is not logged in
    header("Location: ../pages/index.php");
}

// otherwise we load the id into the session variable and
// call the action controller
else {
    $_SESSION['groupid'] = $_GET['groupid'];

    // this action controller will fetch the user data into the $user variable
    include_once "../controller/viewGroupProfileAction.php";

    $_SESSION['fromurl'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

}

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
            $('#groupname').html(groupname);

            var course = <?php echo json_encode($group->getClass()); ?>;
            $('#course').html(course);

            var size = <?php echo json_encode($group->getSize()); ?>;
            $('#size').html(size);

            var inGroup = <?php echo json_encode($inGroup); ?>;
            var isUserLoggedIn = <?php echo json_encode(isLoggedIn()); ?>;
            var content;
           

            if (!isUserLoggedIn) {
                content = "";
                $("#buttons").html(content);
            }
            else if(inGroup){
                content="<button type='button' onclick='location.href=window.location.href.replace('view','edit')' class='btn btn-primary'>Edit Group</button>";
            }
            else {
                content = "<button type='button' class='btn btn-primary' role='button' data-toggle='modaldata-target='#requestModal'>Request to Join Group</button>";
            }
             $("#buttons").html(content);
        

        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3>View Group</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">

                        <div class="form-group">
                            <label for="groupname" class="col-sm-3 control-label">Name</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" type="text" name="groupname" id="groupname"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="members" class="col-sm-3 control-label">Members</label>
                            <div class="col-sm-9">
                                <div class="list-group" id="memberlist" name="memberlist">
                                    <!-- contents here are inserted dynamically -->
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="class" class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" type="text" name="course" id="course"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-3 control-label">Group Size</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" type="number" name="size" id="size"></p>
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
                <form>
                    <div class="form-group">
                        <label name="message" id="message" for="messageboxreq">Message</label>
                        <textarea class="form-control" name="messageboxreq" id="messageboxreq" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                <button class="btn btn-primary">Send Request</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>