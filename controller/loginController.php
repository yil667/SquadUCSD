<?php

include_once "dbController.php";


// return 0 if it's correct login info
// return -1 if account doesn't exist
// return -2 if account exists, but password is incorrect.
// return -3 if account exists, but not verified
function validLogin($email, $password)
{

    $sql = "SELECT * FROM student WHERE email='$email'";

    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    // if the email is found in the database
    if ($row = mysqli_fetch_assoc($result)) {
        if($row['active'] == 0)
            return -3;

        $pw_hash = $row['pwd'];
        $valid = password_verify($password, $pw_hash);

        if ($valid)
            return 0;
        else
            return -2;
    } // otherwise account doesn't exist
    else {
        return -1;
    }
}

// pre-condition: correct login credentials
function login($email)
{
    $sql = "SELECT * FROM student WHERE email='$email'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    // set the user's info into the associative array
    $row = mysqli_fetch_assoc($result);
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['id'] = $row['id'];

    // redirect to the homepage
    header("Location: http://www.squaducsd.com/index.php");
}

// pre-condition: user is already logged in
function getFirstName()
{
    return $_SESSION['fname'];
}

// pre-condition: user is already logged in
function getProfileId()
{
    return $_SESSION['profileid'];
}

function getUserId()
{
    return $_SESSION['id'];
}

// returns true is user is logged in
function isLoggedIn()
{
    return isset($_SESSION['fname']);
}

function handleNotLoggedIn()
{
    if (!isLoggedIn())
        // redirect to the homepage
        header("Location: http://www.squaducsd.com/index.php");
}
