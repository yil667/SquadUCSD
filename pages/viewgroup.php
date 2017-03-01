
<!-- remove '/' in </?php @BACKEND -->
</?php
// if the user clicks on the view profile themselves
// we need to adjust the url accordingly (append user id)
include_once '../controller/startUserSession.php';

$url = $_SERVER['REQUEST_URI'];

// redirects the url to have suffix "user=id"

// otherwise we load the id into the session variable and
// call the action controller

    // getting url info for the action controller
    // this is the part after the "?"
    $url = json_encode($_SERVER['QUERY_STRING']);

    // this one somehow has a quotation mark at the end
    $groupid = substr($url, strpos($url, "=") + 1);
    $groupid = substr($groupid, 0, strlen($groupid) - 1);

    $_SESSION['groupid'] = $groupid;

//include_once '../controller/viewGroupProfileAction.php';
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

//            var major = <?php //echo json_encode($user->getMajor()); ?>//;
//            $('#major').html(major);
//
//            var about = <?php //echo json_encode($user->getAbout()); ?>//;
//            $('#about').html(about);
//
//            var phone = <?php //echo json_encode($user->getPhone()); ?>//;
//            $('#phone').html(phone);
//
//            var email = <?php //echo json_encode($user->getEmail()); ?>//;
//            $('#email').html(email);
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
                                    <a href="#" class="list-group-item">First item</a>
                                    <a href="#" class="list-group-item">Second item</a>
                                    <a href="#" class="list-group-item">Third item</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="class" class="col-sm-3 control-label">Class</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" type="text" name="class" id="class"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-3 control-label">Group Size</label>
                            <div class="col-sm-9">
                                <p class="form-control-static" type="number" name="size" id="size"></p>
                            </div>
                        </div>

                        <div class="button">
                                <!-- use js to choose Leave Group / Request Invite -->
                                <button type="button" class="btn btn-primary" role="button" data-toggle="modal" data-target="#leaveModal">Leave Group</button>
                                <button type="button" class="btn btn-primary" role="button" data-toggle="modal" data-target="#requestModal">Request to Join Group</button>
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

<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="requestLabel">Request Invite to Group</h3>
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