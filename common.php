<?php
include_once './controller/startUserSession.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/common.css"/>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/5.0.0/normalize.css"/>

    <!-- login status check -->
    <script>
        $(document).ready(function () {
            var isUserLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
            var userFirstName = <?php echo json_encode($firstName); ?>;
            var defaultContent = "<li><a href='register.php'><span class='glyphicon glyphicon-user'></span> Register</a></li><li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
            var browseNav =
                "<li><a href='./browse.php'>Browse</a></li>";
            var loggedInContent =
                "<li class='dropdown'>" +
                "<a class='dropdown-toggle' data-toggle='dropdown' href='#'>" + userFirstName + " <span class='caret'></span></a><ul class='dropdown-menu'>" +
                "<li><a href='editprofile.php'>Edit Profile</a></li>" +
                "<li><a href='viewprofile.php'>View Profile</a></li>" +
                "<li><a href='managegroups.php'>Manage Groups</a></li>" +
                "<li><a href='controller/logoutAction.php'>" +
                "<span class='glyphicon glyphicon-log-out'>" + "</span> Logout</a></li></ul></li>";
            if (isUserLoggedIn) {
                $('#navList li:nth-child(1)').after(browseNav);
                $("#rightNav").html(loggedInContent);
                $(".dropdown-toggle").dropdown();
            }
            else {
                $("#rightNav").html(defaultContent);
            }
        });
    </script>
</head>
<body>
<nav class="navbar navbar-black">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">squaducsd</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left" id = "navList">
                <li><a href="index.php">Home</a></li>
                <li><a href='./about.php'>About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" id="rightNav"></ul>
        </div>
    </div>
</nav>

</body>
</html>
