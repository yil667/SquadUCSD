<?php

include_once "loginController.php";
include_once "dbController.php";

handleNotLoggedIn(); // redirects to home page if the user is not logged in

$conn = connectToDB();
$searchString = mysqli_escape_string($conn, $_POST['course']); // this is what the user inputted
$type = $_POST['searchtype']; // can be "groups" or "users"
header("Location: http://www.squaducsd.com/browse.php?class=$searchString&type=$type");


