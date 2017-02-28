<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "sendInviteController.php";

error_reporting(-1);
ini_set('display_errors', 'On');

session_start();

echo "<h1> refuckinglollax</h1>";
// In this action controller, we assume the scenario to be one user intends to invite another user to form a group.

// assume we get the user's and receiver's ID's
$userid = getUserId();
echo "<h1> $userid</h1>";

$receiverid = $_SESSION['profileid'];// decide on how we get this field later, maybe through _POST[]
echo "<h1> $receiverid</h1>";


//$from = $_GET['from'];


$conn = connectToDB();

// this is the custom message the user wants to send along with the invite request
$message = mysqli_real_escape_string($conn, $_POST['messageboxform']);
$hash = md5(rand(0, 10000));

// add a request to the Invite HashCode Table
addRequestToDB($conn, $userid, $receiverid, $hash);

// send the email request to the receiver
sendInvite($conn, $userid, $receiverid, $message, $hash);

//header("Location: ../pages/index.php");
