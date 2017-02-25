<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title> > Sign up</title>
    <link href="css/style.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <!-- start header div --> 
    <div id="header">
        <h3>SUCSD > Sign up</h3>
    </div>
    <!-- end header div -->   
     
    <!-- start wrap div -->   
    <div id="wrap">
        <!-- start PHP code -->
        <?php
		
			$hash = $_GET['hash'];
			$email = $_GET['email'];
			$sql = "SELECT * FROM student WHERE email='$email' AND hash='$hash'";
			$conn = mysqli_connect("localhost", "root", "8CMr1YZUXb", "logintest");
			$result = mysqli_query($conn, $sql);

			// if the login info was valid
			if ($row = mysqli_fetch_assoc($result)){
				mysqli_query($conn, "UPDATE student SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
				echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
			}
			else {
				// No match -> invalid url or account has already been activated.
				echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
			}

        ?>
        <!-- stop PHP Code -->
 
         
    </div>
    <!-- end wrap div --> 
</body>
</html>