<?php

include_once "loginController.php";
include_once "viewProfileController.php";


$id = $_SESSION['profileid']; // fetches the id from the url

$displayButtons = isLoggedIn() && ($id != getUserId());

$user = getUserObject($id);
$myGroup = 0;
$inGroup = 0;
if(isLoggedIn()) {
    $myGroup = getUserObject(getUserId())->getGroups();

    // this returns a boolean array, e.g., [true, false, true],
    // indicating the whether the owner of the profile page is in the groups of the logged
    // in user
    $inGroup = getInGroupInfo($self->getGroups(), $id);
}
?>
