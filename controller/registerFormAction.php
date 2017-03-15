<?php
include_once "registerController.php";
include_once "loginController.php";
include_once "generalLibrary.php";
include_once "dbController.php";

session_start();

$conn = connectToDB();

$first = substr(mysqli_escape_string($conn, $_POST['first']), 0, $MAX_NAME_SIZE);
$last = substr(mysqli_escape_string($conn, $_POST['last']), 0, $MAX_NAME_SIZE);

if (emptyNameFields($first, $last)) {
    header("Location: http://www.squaducsd.com/register.php?emptynamefields");
    exit();
}

$email = substr(mysqli_escape_string($conn, $_POST['email']), 0, $MAX_EMAIL_SIZE);
if (!validEmail($email)) {
    header("Location: http://www.squaducsd.com/register.php?invalidemail");
    exit();
}

$password = substr(mysqli_escape_string($conn, $_POST['password']), 0, $MAX_PWD_SIZE);
$password2 = substr(mysqli_escape_string($conn, $_POST['password2']), 0, $MAX_PWD_SIZE);
if(!matchingpwd($password, $password2))
{
    header("Location: http://www.squaducsd.com/register.php?nonmatchingpwd");
    exit();
}

echo strlen($password);

if(validPwdLength($password, $MIN_PWD_SIZE, $MAX_PWD_SIZE))
{
    header("Location: http://www.squaducsd.com/register.php?invalidpwd");
    exit();
}

$hash = md5(rand(0, 1000));
$duplicateEmail = existingEmail($email);

// see if account has already been created
if ($duplicateEmail) {
    header("Location: http://www.squaducsd.com/register.php?existingemail");
    exit();
}

// add the user into the database
addUser($email, $password, $first, $last, $hash);

// send the verification email
sendverificationEmail($first, $email, $hash);

// redirect to the homepage
header("Location: http://www.squaducsd.com/login.php?verify");
