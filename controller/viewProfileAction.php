<?php

include_once "loginController.php";
include_once "viewProfileController.php";




$id = $_SESSION['profileid']; // fetches the user's id

$user = getUserObject($id);

?>
