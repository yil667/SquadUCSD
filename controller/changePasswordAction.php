<?php
include_once "dbController.php";
include_once "loginController.php";
include_once "changePasswordController.php";
include_once "generalLibrary.php";
include_once "registerController.php";

session_start();

handleNotLoggedIn();
// establish connection to the database
$conn = connectToDB();

$id = getUserId();
$currPassword = substr(mysqli_escape_string($conn, $_POST['currpassword']), 0, $MAX_PWD_SIZE);
$newPassword = substr(mysqli_escape_string($conn, $_POST['password']), 0, $MAX_PWD_SIZE);

if (validCurrPassword($conn, $id, $currPassword)) {
    updatePassword($conn, $id, $newPassword);
    header("Location: http://www.squaducsd.com/editprofile.php?success");
} else {
    header("Location: http://www.squaducsd.com/editprofile.php?fail");
}