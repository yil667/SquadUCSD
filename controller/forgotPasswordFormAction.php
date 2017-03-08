<?php
include_once 'loginController.php';
include_once 'forgotPasswordController.php';

session_start();

$email = $_POST['email'];

$conn = connectToDB();
$result = handleForgotPasswordEmail($conn, $email);

// email exists
if ($result)
    header("Location: ./login.php?sent");
else
    header("Location: ./forgotpassword.php?fail");