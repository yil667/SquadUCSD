<?php

include_once "dbController.php";
include_once "sendInviteController.php";

session_start();

echo "<h1> refuckinglollax</h1>";
// In this action controller, we assume the scenario to be one user intends to invite another user to form a group.

// assume we get the user's and receiver's ID's
$userid = getUserId();
$receiverid = getProfileId();// decide on how we get this field later, maybe through _POST[]

echo "<h1> $userid</h1>";
echo "<h1> $receiverid</h1>";


//$from = $_GET['from'];


$conn = connectToDB();

// this is the custom message the user wants to send along with the invite request
$message = mysqli_real_escape_string($conn, $_POST['formMessage']);
$hash = md5(rand(0, 10000));

// add a request to the Invite HashCode Table
addRequestToDB($conn, $userid, $receiverid, $hash);

// send the email request to the receiver
sendInvite($conn, $userid, $receiverid, $message, $hash);

header("Location: ../pages/index.php");
