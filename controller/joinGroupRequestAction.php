<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "requestToJoinController.php";
include_once "viewProfileController.php";
include_once "generalLibrary.php";

session_start();

handleNotLoggedIn();

$conn = connectToDB();

$userid = getUserId();
$groupid = $_SESSION['groupid']; //?groupid=34
$group = getGroupObject($groupid);
$fromurl = $_SESSION['fromurl'];
$fromurl = clearFlags($fromurl);

$message = substr($_POST['messageboxreq'], 0, 210);

$inGroup = $group->hasUser($userid);

// if for some reason the user is already in the group
if ($inGroup) {
    // redirect directly with a flag
    header("Location: $fromurl" . "&exist");
} else {

    $hash = md5(rand(0, 10000));
    $user = getUserObject($userid);

    // add a request to the invite table
    addRequestToDB($conn, $userid, $groupid, $hash);

    // send the email to all the users in the group
    sendRequestEmail($conn, $user, $group, $message, $hash);

    // redirect back with a flag
    header("Location: $fromurl" . "&request");
}