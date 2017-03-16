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
$currPassword = mb_substr(mysqli_escape_string($conn, $_POST['currpassword']), 0, $MAX_PWD_SIZE, "UTF-8");

if (!validCurrPassword($conn, $id, $currPassword)) {
    header("Location: http://www.squaducsd.com/editprofile.php?incorrectcurrentpwd");
    exit();
}

$newPassword = mysqli_escape_string($conn, $_POST['password']);
$newPassword2 = mysqli_escape_string($conn, $_POST['password2']);

if (!matchingpwd($newPassword, $newPassword2)) {
    header("Location: http://www.squaducsd.com/editprofile.php?nonmatchingpwd");
    exit();
}


if (!validPwdLength($newPassword, $MIN_PWD_SIZE, $MAX_PWD_SIZE)) {
    header("Location: http://www.squaducsd.com/editprofile.php?invalidpwd");;
    exit();
}

// passed all checks; ready to update the password
updatePassword($conn, $id, $newPassword);
header("Location: http://www.squaducsd.com/editprofile.php?success");