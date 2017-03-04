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

// add escape character to prevent sql injection
$groupname = mysqli_real_escape_string($conn, $_POST['groupname']);
$course = mysqli_real_escape_string($conn, $_POST['course']);
$size = mysqli_real_escape_string($conn, $_POST['size']);

// if the inputted size is less than the current group size
if($size < $group->getSize())
    header("Location: ../pages/editgroup.php?groupid=$groupid&invalidsize");

// if somehow the user editing is not in the group, redirect to view profile page
if (!$inGroup)
    header("Location: ../pages/viewgroup.php?groupid=$groupid");
else {
    // we assume data validation has already taken place in the front end
    $sql = "UPDATE groupProfile SET name='$groupname', maxSize='$size', class='$course' " .
        "WHERE id='$groupid'";

    mysqli_query($conn, $sql);

    header("Location: ../pages/editgroup.php?groupid=$groupid&saved");

}


