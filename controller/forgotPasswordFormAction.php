<?php
include_once 'loginController.php';
include_once 'forgotPasswordController.php';

session_start();

$email = $_POST['email'];

$conn = connectToDB();
$result = handleForgotPasswordEmail($conn, $email);

// email exists
if ($result)
    header("Location: http://www.squaducsd.com/login.php?sent");
else
    header("Location: http://www.squaducsd.com/forgotpassword.php?fail");