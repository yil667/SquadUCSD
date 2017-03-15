<?php

include_once "loginController.php";
include_once "dbController.php";
include_once "generalLibrary.php";

handleNotLoggedIn(); // redirects to home page if the user is not logged in

$conn = connectToDB();
$searchString = substr(mysqli_escape_string($conn, $_POST['query']), 0, $MAX_QUERY_SIZE); // this is what the user inputted
$type = $_POST['searchtype']; // can be "groups" or "users"
header("Location: http://www.squaducsd.com/browse.php?query=$searchString&type=$type");


