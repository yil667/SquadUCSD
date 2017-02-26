<?php

session_start();

// In this action controller, we assume the scenario to be one user intends to invite another user to form a group.

// assume we get the user's and receiver's ID's
$userid = 6;
$receiverid = 1; // decide on how we get this field later, maybe through _POST[]

$conn = connectToDB();

// this is the custom message the user wants to send along with the invite request
$message = mysqli_real_escape_string($conn, $_POST['message']);
$hash = md5(rand(0, 1000));

// add a request to the Invite HashCode Table
addRequestToDB($conn, $userid, $receiverid, $hash);

// send the email request to the receiver
sendInvite($conn, $userid, $receiverid, $message, $hash);

echo "<h1> REFUCKINGLAX </h1>";
