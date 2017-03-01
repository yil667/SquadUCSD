<?php

include_once "loginController.php";
include_once "viewProfileController.php";

$groupid = $_SESSION['groupid']; //?groupid=34

$group = getGroupObject($group);

$inGroup = false;
// check if user is logged in, and if so, whether the user is in the group
if (isLoggedIn())
{
    $userid = getUserId(); // fetches the user's id
    $inGroup = $group->hasUser($userid);
}

?>
