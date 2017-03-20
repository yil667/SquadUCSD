<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "sendInviteAndMessageController.php";
include_once "generalLibrary.php";

session_start();

handleNotLoggedIn();

// In this action controller, we assume the scenario to be one user intends to invite another user
// to form a group.

// assume we get the user's and receiver's ID's
$userid = getUserId();
$receiverid = $_SESSION['profileid'];
$fromurl = $_SESSION['fromurl'];
$fromurl = clearFlags($fromurl);

$conn = connectToDB();

$groupName = mb_substr(mysqli_escape_string($conn, $_POST['groupname']), 0, $MAX_GROUP_NAME, "UTF-8");

if ($groupName == "") {
    // redirect with a flag
    header("Location: $fromurl" . "&emptygroupname");
    exit();
}

$className = mb_substr(mysqli_escape_string($conn, $_POST['classname']), 0, $MAX_CLASS_NAME, "UTF-8");

// this is the custom message the user wants to send along with the invite request
$message = mb_substr($_POST['messageboxform'], 0, $MAX_MESSAGE_SIZE, "UTF-8");
$hash = md5(rand(0, 10000));

// add a request to the Invite HashCode Table
addInviteRequestToDB($conn, $userid, $receiverid, $groupName, $className, $hash);

// send the email request to the receiver
sendInviteEmail($conn, $userid, $receiverid, $groupName, $className, $message, $hash);

// redirect with a flag
header("Location: $fromurl" . "&create");

