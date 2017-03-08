<?php

include_once "loginController.php";
include_once "viewProfileController.php";
include_once "getSearchResultController.php";

handleNotLoggedIn();

$conn = connectToDB();

$id = getUserId();// fetches the id from the url
$user = getUserObject($id);
$type = $_SESSION['type'];
$class = mysqli_escape_string($conn, $_SESSION['class']);

if($type == "users")
    $result = getListOfUsers($conn, $class, $user);
else
    $result = getListOfGroups($conn, $class, $user);


?>
