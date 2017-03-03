<?php

include_once 'dbController.php';

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

// pre-condition: email does not already exist in the database,
// and valid credentials
// no redirection is done in this function
// tentative parameter list (do we want to pass in the user info, or do we want to use $_POST[] ?)
function addUser($email, $password, $first, $last, $hash)
{
    $sql = "INSERT INTO student (fname, lname, email, pwd, hash) VALUES ('$first', '$last', '$email', '$password', '$hash')";
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
http://www.squaducsd.com/pages/activate.php?email=$email&hash=$hash


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