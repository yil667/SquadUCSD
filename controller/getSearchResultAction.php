<?php

include_once "loginController.php";
include_once "viewProfileController.php";
include_once "getSearchResultController.php";
include_once "generalLibrary.php";

handleNotLoggedIn();

$conn = connectToDB();

$id = getUserId();// fetches the id from the url
$user = getUserObject($id);
$type = $_SESSION['type'];
$query = mb_substr(mysqli_escape_string($conn, strtoupper(urldecode($_SESSION['query']))), 0, $MAX_QUERY_SIZE, "UTF-8");

if($type == "users")
    $result = getListOfUsers($conn, $query, $user);
else
    $result = getListOfGroups($conn, $query, $user);


?>
