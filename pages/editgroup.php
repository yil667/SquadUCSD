
<!-- remove '/' in </?php @BACKEND -->
</?php
include_once '../controller/startUserSession.php';

$_SESSION['profileid'] = $_SESSION['id'];

// load the group's data from action controller
include_once '../controller/viewGroupAction.php';

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

    <!-- TO: Dom / Scott, Remove this comment when working on backend
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            var name = </ /** Also Remove these comments '/' **/ ?php echo json_encode($user->getFname()); ?>;
            $('#name').html(name);


            var email = </?php echo json_encode($user->getEmail()); ?>;
            $('#email').html(email);


            // input fields
            var major = </?php echo json_encode($user->getMajor()); ?>;
            document.getElementById('major').value = major;

            var about = </?php echo json_encode($user->getAbout()); ?>;
            document.getElementById('about').value = about;

            var phone = </?php echo json_encode($user->getPhone()); ?>;
            document.getElementById('phone').value = phone;

        });
    </script>
    -->
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3>Edit Group</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="../controller/editGroupAction.php">

                        <div class="form-group">
                            <label for="members" class="col-sm-3 col-form-label">Members</label>
                            <div class="col-sm-9">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">First item</a>
                                    <a href="#" class="list-group-item">Second item</a>
                                    <a href="#" class="list-group-item">Third item</a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="class" class="col-sm-3 col-form-label">Class</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="class" id="class">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="size" class="col-sm-3 col-form-label">Group Size</label>
                            <div class="col-sm-9">
                                <!--replace min with num from backend @DOM @SCOTT -->
                                <input type="number" class="form-control bfh-number" min="2" max="15" name="size" id="size">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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