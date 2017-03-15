<?php

include_once "dbController.php";

function emptyNameFields($first, $last)
{
    return $first == "" || $last == "";
}

function validEmail($email)
{
    $pos = strpos($email, "@ucsd.edu");
    $expectedPos = strlen($email) - strlen("@ucsd.edu");
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== FALSE && $pos !== FALSE &&
        $pos == $expectedPos;
}

function existingEmail($email)
{
    $sql = "SELECT * FROM student WHERE email='$email'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    // user account exists in database
    if ($row = mysqli_fetch_assoc($result))
        return true;
    else
        return false;
}

function matchingpwd($password, $password2)
{
    return $password == $password2;
}

function validPwdLength($password, $MIN_PWD_SIZE, $MAX_PWD_SIZE)
{
    return strlen($password) >= $MIN_PWD_SIZE && strlen($password) <= $MAX_PWD_SIZE;
}


// pre-condition: email does not already exist in the database,
// and valid credentials
// no redirection is done in this function
// tentative parameter list (do we want to pass in the user info, or do we want to use $_POST[] ?)
function addUser($email, $password, $first, $last, $hash)
{
    // hash the password for encryption
    $pw_hash = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO student (fname, lname, email, pwd, hash) VALUES ('$first', '$last', '$email', '$pw_hash', '$hash')";
    $conn = connectToDB();
    mysqli_query($conn, $sql);
}

function generateVerificationEmail($first, $email, $hash)
{
    $message = "
Hi $first,

Thank you for registering!
Your account has been created, you can log in after you have activated your account. 

Please click the following link to activate your account:
http://www.squaducsd.com/activate.php?email=$email&hash=$hash


SquadUCSD";

    return $message;
}

function sendVerificationEmail($first, $email, $hash)
{
    $subject = "SquadUCSD | Register Verification"; // Give the email a subject
    $message = generateVerificationEmail($first, $email, $hash);
    $headers = "From: account" . "\r\n"; // Set from headers
    mail($email, $subject, $message, $headers);
}