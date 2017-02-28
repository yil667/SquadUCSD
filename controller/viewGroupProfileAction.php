<?php

include_once "loginController.php";
include_once "viewProfileController.php";

$userid = getUserId(); // fetches the user's id
$groupid = $_GET['groupid'];
$group = getGroupObject($groupid);

?>
