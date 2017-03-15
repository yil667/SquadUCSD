<?php
include_once "loginController.php";
include_once "forgotPasswordController.php";
include_once "generalLibrary.php";

session_start();
$conn = connectToDB();

$email = substr(mysqli_escape_string($conn, $_POST['email']), 0, $MAX_EMAIL_SIZE);

$result = handleForgotPasswordEmail($conn, $email);

// email exists
if ($result)
    header("Location: http://www.squaducsd.com/login.php?sent");
else
    header("Location: http://www.squaducsd.com/forgotpassword.php?fail");