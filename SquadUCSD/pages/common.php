<?php
include_once '../controller/startUserSession.php';
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/common.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- login status check -->
	<script>
		$(document).ready(function () {
			var isUserLoggedIn = <?php echo json_encode($isLoggedIn); ?>;
			var userFirstName = <?php echo  json_encode($firstName); ?>;
			var defaultContent = "<li><a href='./register.php'><span class='glyphicon glyphicon-user'></span> Register</a></li><li><a href='./login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
			var loggedInContent = "<li class='dropdown'><a class='dropdown-toggle' data-toggle='dropdown' href='#'>" + userFirstName +  "<span class='caret'></span></a><ul class='dropdown-menu'><li><a href='#'>Edit Schedule</a></li><li><a href='#'>Edit Profile</a></li><li><a href='#'>View Profile</a></li><li><a href='../controller/logoutAction.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li></ul></li>";

			if (isUserLoggedIn){
				$("#rightNav").html(loggedInContent);
				$(".dropdown-toggle").dropdown();
			}
			else{
				$("#rightNav").html(defaultContent);
			}
			
		});
		

	</script>
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
				<a class="navbar-brand" href="./index.php"><img src="http://puu.sh/u2lwH/a730d7b785.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="topNavbar">
				<ul class="nav navbar-nav navbar-left">
					<li><a href="./index.php">Home</a></li>
					<li><a href="#">Auto Match</a></li>
					<li><a href="#">Browse</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right" id="rightNav"></ul>
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
