<?php
include_once "loginController.php";
include_once "dbController.php";
include_once "generalLibrary.php";

session_start();

$conn = connectToDB();

$email = mb_substr(mysqli_escape_string($conn, $_POST['email']), 0, $MAX_EMAIL_SIZE, "UTF-8");
$password = mb_substr(mysqli_escape_string($conn, $_POST['password']), 0, $MAX_PWD_SIZE, "UTF-8");

$retVal = validLogin($email, $password);

// user entered wrong password
if ($retVal == -2) {
    header("Location: http://www.squaducsd.com/login.php?wrong_password");
} // no account found in database
else if ($retVal == -1) {
    header("Location: http://www.squaducsd.com/login.php?nonexistent_account");
} else if ($retVal == -3) {
    header("Location: http://www.squaducsd.com/login.php?not_verified");
} else if ($retVal == 0) {
    login($email);
}