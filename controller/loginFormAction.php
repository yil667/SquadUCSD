<?php
include_once 'loginController.php';

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$retVal = validLogin($email, $password);

// user entered wrong password
if ($retVal == -2) {
    header("Location: ./login.php?wrong_password");
} // no account found in database
else if ($retVal == -1) {
    header("Location: ./login.php?nonexistent_account");
} else if ($retVal == -3) {
    header("Location: ./login.php?not_verified");
} else if ($retVal == 0) {
    login($email, $password);
}