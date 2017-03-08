<?php
include_once '../controller/startUserSession.php';

handleNotLoggedIn();

$_SESSION['profileid'] = $_SESSION['id'];

// load the user's data from action controller
//include_once '../controller/viewProfileAction.php';

// now the user object contains all the relevant user info
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../css/browse.css"/>
<link rel="stylesheet" type="text/css" href="../css/common.css"/>
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
    <!-- jQuery form validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- UI for class drop down -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!--jqueryplugin for pagination-->
    <script src="../js/jquery.twbsPagination.min.js" type="text/javascript"></script>
    <!--jquery object-->
    <script src="../js/jquery.query-object.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#common').load('./common.php');

            $('#pagination-demo').twbsPagination({
                totalPages: 35,
                visiblePages: 7,
                onPageClick: function (event, page) {
                    $('#page-content').text('Page ' + page);
                }
            });
        });
    </script>
</head>
<body>

<div id="common"></div>
<div class="container-fluid">
    <div class="col-lg-2 col-lg-offset-2 col-md-3 col-md-offset-1">
        <div class="panel panel-custom">
            <div class="panel-body main-panel">
                <form class="form" role="search" id="searchForm" name="searchForm" method="POST"
                      action="../controller/searchAction.php">

                    <div class="form-group" id="courseFormGroup" name="courseFormGroup">
                        <label for="course" class="control-label">Course</label>
                        <input type="text" class="form-control" name="course" id="course">
                    </div>

                    <div class="form-group" id="typeFormGroup" name="typeFormGroup">
                        <label for="searchtype" class="control-label">Type</label>
                        <select id="searchtype" name="searchtype">
                            <option value="users">Users</option>
                            <option value="groups">Groups</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary" role="button">Search
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-7">
        <div class="panel panel-custom main-panel">
            <div class="panel-heading" name="mainHeading" id="mainHeading">
                <h3>Search Results</h3>
            </div>
            <div class="panel-body panel-custom main-body">
                <div class="col-md-6">
                    <div class="panel panel-custom col-md-12 result-panel">
                        <div class="panel-heading"><h4>Name</h4></div>
                        <div class="panel-body">
                            <form class="form-horizontal">
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

                                <div class="text-center buttons col-md-12" id="button">
                                    <button type="button" class="btn btn-primary" role="button">View Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-custom col-md-12 result-panel">
                        <div class="panel-heading"><h4>Name</h4></div>
                        <div class="panel-body">
                            <form class="form-horizontal">
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

                                <div class="text-center buttons col-md-12" id="button">
                                    <button type="button" class="btn btn-primary" role="button">View Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="text-center row">
                    <ul id="pagination-demo" class="pagination-sm pagination"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>