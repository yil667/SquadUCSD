<?php

include_once "loginController.php";
include_once "viewProfileController.php";

$id = $_GET['userid']; // fetches the user's id

$user = getUserObject($id);

?>
