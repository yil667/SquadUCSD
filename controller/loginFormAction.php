<?php
include_once 'loginController.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$retVal = validLogin($email, $password);

// user entered wrong password
if ($retVal == -2) {
    header("Location: ../pages/login.php?wrong_password");
}

// no account found in database
else if ($retVal == -1) {
    header("Location: ../pages/login.php?nonexistent_account");
}

else {
    login($email, $password);
}