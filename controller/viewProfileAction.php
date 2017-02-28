<?php

include_once "loginController.php";
include_once "viewProfileController.php";

$id = getProfileId(); // fetches the user's id

$user = getUserObject($id);

?>
