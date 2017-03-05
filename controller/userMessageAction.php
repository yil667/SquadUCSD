<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "sendInviteAndMessageController.php";
include_once "generalLibrary.php";

session_start();

handleNotLoggedIn();

// In this action controller, we assume the scenario to be one user intends to invite another user to form a group.

// assume we get the user's and receiver's ID's
$userid = getUserId();
$receiverid = $_SESSION['profileid'];
$fromurl = $_SESSION['fromurl'];
$fromurl = clearFlags($fromurl);

$conn = connectToDB();

// this is the custom message the user wants to send along with the invite request
$message = ($_POST['sendmessageform']);

// send the email request to the receiver
sendEmail($conn, $userid, $receiverid, $message);

//header("Location: ../pages/index.php");
header("Location: $fromurl");
