<?php
include_once "dbController.php";
include_once "generalLibrary.php";
include_once "registerController.php";
include_once "resetPasswordFormController.php";

session_start();
$conn = connectToDB();

$email = $_SESSION['forgetEmail'];

$fromurl = $_SESSION['fromurl'];
$fromurl = clearInvalidFlags($fromurl);
$newPassword = substr(mysqli_escape_string($conn, $_POST['newpassword']), 0, $MAX_PWD_SIZE);
$newPassword2 = substr(mysqli_escape_string($conn, $_POST['confirmpass']), 0, $MAX_PWD_SIZE);

if(!matchingpwd($newPassword, $newPassword2))
{
    header("Location: $fromurl" . "&nonmatchingpwd");
    exit();
}

if(!validPwdLength($newPassword, $MIN_PWD_SIZE, $MAX_PWD_SIZE))
{
    header("Location: $fromurl" . "&invalidpwd");
    exit();
}

$pwd_hash = password_hash($newPassword, PASSWORD_DEFAULT);

$sql = "UPDATE student SET forgotPwdHash='', pwd='$pwd_hash' WHERE email='$email'";
mysqli_query($conn, $sql);

header("Location: http://www.squaducsd.com/login.php?reset");

?>
<!-- stop PHP Code -->

