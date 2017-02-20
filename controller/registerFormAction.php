<?php
include_once 'registerController.php';
include_once 'loginController.php';

session_start();

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];

$duplicateEmail = existingEmail($email);

// see if account has already been created
if ($duplicateEmail) {
    // notify the front end that
    // the user email already exists in the database
    // with the flag in the url
    header("Location: ../pages/register.php?fail");
}

// Create the new user in the database
else {
    // add the user into the database
    addUser($email, $password, $first, $last);

    // redirect to the homepage
    header("Location: ../pages/login.php?verify");
}