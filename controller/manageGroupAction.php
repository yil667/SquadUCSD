<?php

include_once "loginController.php";
include_once "viewProfileController.php";

handleNotLoggedIn();

$id = getUserId(); // fetches the user's id
$user = getUserObject($id);

?>
