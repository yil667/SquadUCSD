<?php
include_once "registerController.php";
include_once "loginController.php";
include_once "generalLibrary.php";
include_once "dbController.php";

session_start();

$conn = connectToDB();

$first = mb_substr(mysqli_escape_string($conn, $_POST['first']), 0, $MAX_NAME_SIZE, "UTF-8");
$last = mb_substr(mysqli_escape_string($conn, $_POST['last']), 0, $MAX_NAME_SIZE, "UTF-8");

if (emptyNameFields($first, $last)) {
    header("Location: http://www.squaducsd.com/register.php?emptynamefields");
    exit();
}

$email = mb_substr(mysqli_escape_string($conn, $_POST['email']), 0, $MAX_EMAIL_SIZE, "UTF-8");
if (!validEmail($email)) {
    header("Location: http://www.squaducsd.com/register.php?invalidemail");
    exit();
}

$password = mysqli_escape_string($conn, $_POST['password']);
$password2 = mysqli_escape_string($conn, $_POST['password2']);
if(!matchingpwd($password, $password2))
{
    header("Location: http://www.squaducsd.com/register.php?nonmatchingpwd");
    exit();
}

if(!validPwdLength($password, $MIN_PWD_SIZE, $MAX_PWD_SIZE))
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
