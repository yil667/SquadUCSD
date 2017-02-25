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
        });
    </script>
</head>
<body>
<div id="common"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-custom">
                <div class="panel-heading"><h3>John's Profile</h3></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST">

                        <div class="form-group">
                            <label for="ucsdemail" class="col-sm-3 col-form-label">UCSD Email</label>
                            <div class="col-sm-9">
                                <label name="ucsdemail" id="ucsdemail">johnsmith@ucsd.edu</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-9">
                                <label name="phone" id="phone">1-(012)-345-6789</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="major" class="col-sm-3 col-form-label">Major</label>
                            <div class="col-sm-9">
                                 <label name="major" id="major">Computer Science</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="about" class="col-sm-3 col-form-label">About Me</label>
                            <div class="col-sm-9">
                                <label name="about" id="about"></label>
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