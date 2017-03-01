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
    <link rel="stylesheet" type="text/css" href="../css/search_result_entry.css"/>
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
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
                    <div class="panel-heading"><h4>Name</h4></div>
                    <div class="panel-body">
                        <div class="basicinfo">
                            <label for="classes">Matched Classes:</label>
                            <p name="classes" id="classes">CSE11, CSE12, CSE13</p>
                       </div>
                        <div class="button">
                            <button type="button" class="btn btn-primary" role="button" data-toggle="modal" data-target="#messageModal">Message</button>
                            <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target="#inviteModal">Invite to Existing Group</button>
                            <button type="button" class="btn btn-success" role="button" data-toggle="modal" data-target="#formModal">Invite to Form New Group</button>
                        </div>
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
                    <h3 id="messageLabel">Message $User$</h3>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="messagebox">Message</label>
                            <textarea class="form-control" name=messagebox id="messagebox" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-primary">Send</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="inviteModal" tabindex="-1" role="dialog" aria-labelledby="inviteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="messageLabel">Invite $User$ to Existing Group</h3>
                </div>
                <div class="modal-body">

                    <form>
                        <div class="form-group">
                            <label name="message" id="message" for="groupselect">Select Group</label>
                            <select id="groupselect" name="groupselect">
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="messageboxinvite">Message</label>
                            <textarea class="form-control" name="messageboxinvite" id="messageboxinvite" rows="3"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-primary">Send Invite</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="messageLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="messageLabel">Invite $User$ to Form Group</h3>
                </div>
                <div class="modal-body">
                    <label for="messageboxform">Message</label>
                    <textarea class="form-control" name="messageboxform" id="messageboxform" rows="3"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                    <button class="btn btn-primary">Send Invite</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>