<?php

include_once 'dbController.php';

$email = $_SESSION['forgetEmail'];
$hash = $_SESSION['hash'];

$sql = "SELECT * FROM student WHERE email='$email' AND forgotPwdHash='$hash'";
$conn = connectToDB();
$result = mysqli_query($conn, $sql);

// if the email and hash are correct
if (!$row = mysqli_fetch_assoc($result)) {
    // No match -> Invalid or expired reset password link.
    header("Location: http://www.squaducsd.com/login.php?invalidreset");
}
?>
<!-- stop PHP Code -->

