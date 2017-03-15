<?php
include_once "dbController.php";
include_once "generalLibrary.php";

session_start();
$conn = connectToDB();

$email = $_SESSION['forgetEmail'];


$newPassword = substr(mysqli_escape_string($conn, $_POST['newpassword']), 0, $MAX_PWD_SIZE);

$pwd_hash = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE student SET forgotPwdHash='', pwd='$pwd_hash' WHERE email='$email'";
mysqli_query($conn, $sql);

header("Location: http://www.squaducsd.com/login.php?reset");

?>
<!-- stop PHP Code -->

