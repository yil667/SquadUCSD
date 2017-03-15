<?php

include_once "dbController.php";
include_once "loginController.php";
include_once "viewProfileController.php";
include_once "generalLibrary.php";

session_start();

handleNotLoggedIn();

// establish connection to the database
$conn = connectToDB();

$groupid = $_SESSION['groupid'];
$id = getUserId();
$group = getGroupObject($groupid);

$inGroup = $group->hasUser($id);

// add escape character to prevent sql injection
$groupname = substr(mysqli_real_escape_string($conn, $_POST['groupname']), 0, $MAX_GROUP_NAME);
if ($groupname == "")
    $groupname = $group->getName();

$course = substr(mysqli_real_escape_string($conn, $_POST['course']), 0, $MAX_CLASS_NAME);
$size = mysqli_real_escape_string($conn, $_POST['size']);

// if the input is empty or does not contain only numbers,
// then set the size to the current max size
if ($size == "" || !ctype_digit($size) || $size > $MAX_GROUP_SIZE)
    $size = $group->getMaxSize();

$about = substr(mysqli_real_escape_string($conn, $_POST['about']), 0, $MAX_ABOUT_SIZE);

// if the inputted size is less than the current group size
if ($size < $group->getSize())
    header("Location: http://www.squaducsd.com/editgroup.php?groupid=$groupid&invalidsize");

// if somehow the user editing is not in the group, redirect to view profile page
if (!$inGroup)
    header("Location: http://www.squaducsd.com/viewgroup.php?groupid=$groupid");
else {
    $sql = "UPDATE groupProfile SET name='$groupname', maxSize='$size', class='$course', about='$about' " .
        "WHERE id='$groupid'";

    mysqli_query($conn, $sql);

    header("Location: http://www.squaducsd.com/editgroup.php?groupid=$groupid&saved");

}


