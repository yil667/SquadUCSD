<?php

include_once "dbController.php";
include_once "loginController.php";
include_once "viewProfileController.php";

session_start();

handleNotLoggedIn();

// establish connection to the database
$conn = connectToDB();

$groupid = $_SESSION['groupid'];
$id = getUserId();
$group = getGroupObject($groupid);

$inGroup = $group->hasUser($id);

// if somehow the user editing is not in the group, redirect to view profile page
if (!$inGroup)
    header("Location: ../pages/viewgroup.php?groupid=$groupid");
else {
    // remove the groupid from the student table
    removeGroupFromUser($conn, $id, $groupid);

    $currGroupSize = $group->getSize();
    // if the group only has 2 people left
    if ($currGroupSize <= 2) {
        // disband the group
        disbandGroup($conn, $groupid);
    } else {
        // otherwise, remove the user from the groupprofile table
        removeUserFromGroup($conn, $id, $groupid, $currGroupSize);
    }
}