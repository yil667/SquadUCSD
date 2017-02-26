
<!-- start PHP code -->
<?php

	$hash = $_GET['hash'];
	$email = $_GET['email'];
	$sql = "SELECT * FROM student WHERE email='$email' AND hash='$hash'";
	$conn = mysqli_connect("localhost", "root", "", "logintest");
	$result = mysqli_query($conn, $sql);

	// if the login info was valid
	if ($row = mysqli_fetch_assoc($result)){
		mysqli_query($conn, "UPDATE student SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
		header("Location: ../pages/login.php?verified");
	}
	else {
		// No match -> invalid url or account has already been activated.
	}

?>
<!-- stop PHP Code -->

 