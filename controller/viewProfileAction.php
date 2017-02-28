<?php

include_once "loginController.php";
include_once "viewProfileController.php";

error_reporting(-1);
ini_set('display_errors', 'On');

$id = $_GET['userid']; // fetches the user's id

$user = getUserObject($id);

?>
