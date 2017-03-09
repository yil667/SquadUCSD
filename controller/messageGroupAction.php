<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "messageGroupController.php";
include_once "generalLibrary.php";
include_once "viewProfileController.php";

session_start();

handleNotLoggedIn();

// assume we get the user's and receiver's ID's
$userid = getUserId();
$groupid = $_SESSION['groupid'];

$user = getUserObject($userid);
$group = getGroupObject($groupid);

$fromurl = $_SESSION['fromurl'];
$fromurl = clearFlags($fromurl);

$conn = connectToDB();

// this is the custom message the user wants to send along with the invite request
$message = $_POST['sendmessageform'];

// send the email request to the receiver
sendEmail($user, $group, $message);

header("Location: $fromurl" . "&message");
