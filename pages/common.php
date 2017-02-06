<?php
session_start();
?>

<!DOCTYPE html>
<html>





<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/common.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
<nav class="navbar navbar-black">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">SquadUCSD</a>
        </div>
        <div class="collapse navbar-collapse" id="topNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="./index.php">Home</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Find Group<span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Auto-match</a></li>
                        <li><a href="#">Search</a></li>
                        <li><a href="#">Update Profile</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                // This if statement checks that we're logged in. This is just a sanity check!
                if (isset($_SESSION['fname'])) {
                    echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
                } else {
                    echo "<li><a href='./register.html'><span class='glyphicon glyphicon-user'></span> Register</a></li>";
                    echo "<li><a href='./login.html'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";

                }

                ?>
            </ul>
        </div>
    </div>
</nav>

<footer class="footer">
    <div>
        <a href="#" class="col-sm-1">
            Contact
        </a>
    </div>
</footer>

</body>
</html>
