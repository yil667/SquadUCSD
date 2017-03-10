<?php
session_start();
include_once "dbController.php";

$email = $_SESSION['forgetEmail'];
$newPassword = $_POST['newpassword'];

$pwd_hash = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE student SET forgotPwdHash='', pwd='$pwd_hash' WHERE email='$email'";
$conn = connectToDB();
mysqli_query($conn, $sql);

header("Location: http://www.squaducsd.com/login.php?reset");

?>
<!-- stop PHP Code -->

