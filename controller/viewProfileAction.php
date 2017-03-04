<?php

include_once "loginController.php";
include_once "viewProfileController.php";


$id = $_SESSION['profileid']; // fetches the id from the url

$displayButtons = isLoggedIn() && ($id != getUserId());

$user = getUserObject($id);

?>
