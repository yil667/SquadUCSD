<?php

include_once "loginController.php";
include_once "viewProfileController.php";

echo '<pre>';
print_r($_POST); // for viewing it as an array
var_dump($_POST); // for viewing all info of the array
echo '</pre>';
die();

$id = $_GET['userid']; // fetches the user's id

$user = getUserObject($id);

?>
