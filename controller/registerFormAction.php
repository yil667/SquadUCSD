<?php
include_once "registerController.php";
include_once "loginController.php";
include_once "generalLibrary.php";
include_once "dbController.php";

session_start();

$conn = connectToDB();

$first = substr(mysqli_escape_string($conn, $_POST['first']), 0, $MAX_NAME_SIZE);
$last = substr(mysqli_escape_string($conn, $_POST['last']), 0, $MAX_NAME_SIZE);

if(emptyNameFields($first, $last)){
    header("Location: http://www.squaducsd.com/register.php?emptynamefields");
}

$email = substr(mysqli_escape_string($conn, $_POST['email']), 0, $MAX_EMAIL_SIZE);
if(!validEmail($email)){
    header("Location: http://www.squaducsd.com/register.php?invalidemail");
}

$password = substr(mysqli_escape_string($conn, $_POST['password']), 0, $MAX_PWD_SIZE);
$hash = md5(rand(0, 1000));
$duplicateEmail = existingEmail($email);

// see if account has already been created
if ($duplicateEmail) {
    // notify the front end that
    // the user email already exists in the database
    // with the flag in the url
    header("Location: http://www.squaducsd.com/register.php?existingemail");
} // Create the new user in the database

else {
    // add the user into the database
    addUser($email, $password, $first, $last, $hash);

    // send the verification email
    sendverificationEmail($first, $email, $hash);

    // redirect to the homepage
    header("Location: http://www.squaducsd.com/login.php?verify");
}