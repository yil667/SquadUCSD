<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "inviteToExistingController.php";
include_once "viewProfileController.php";

// absolute max possible size for all groups
// modifiable
$MAX_GROUP_SIZE = 10;

session_start();

handleNotLoggedIn();

$conn = connectToDB();

$userid = getUserId();
$receiverid = $_SESSION['profileid'];
$fromurl = $_SESSION['fromurl'];
$message = ($_POST['messageboxform']);

$groupid = $_SESSION['groupid'];
$group = getGroupObject($groupid);

// if the group already has max
if ($group->getMaxSize() == $group->getSize() && $group->getMaxSize() == $MAX_GROUP_SIZE) {
    // redirect directly with a flag
    header("Location: $fromurl" . "&exceedsizelimit");
}
// if the receiver is already in the group somehow
else if ($inGroup = $group->hasUser($receiverid)) {
    // redirect directly with a flag
    header("Location: $fromurl" . "&receiverexist");
}
else {
    // this is the custom message the user wants to send along with the invite request
    $hash = md5(rand(0, 10000));

    $user = getUserObject($userid);
    $receiver = getUserObject($receiverid);

    // add a request to the Invite HashCode Table
    addInviteRequestToDB($conn, $userid, $receiverid, $groupid, $hash);

    // send the email request to the receiver
    sendInviteEmail($user, $receiver, $group, $message, $hash);

    // redirect with a flag
    header("Location: $fromurl" . "&invite");

}


