<?php
include_once "$_SERVER[DOCUMENT_ROOT]/dbController.php";
include_once "$_SERVER[DOCUMENT_ROOT]/controller/loginController.php";
session_start();

$conn = connectToDB();
$isLoggedIn = isLoggedIn() ? 1 : 0;
$firstName = $isLoggedIn ? getFirstName() : "";
$avatar = $isLoggedIn ? getAvatar($conn, getUserId()) : "";

// forcefully redirects the website to contain "www" so the session variable doesn't behave unexpectedly
if ($_SERVER['HTTP_HOST'] != "localhost" && strpos($_SERVER['HTTP_HOST'], "www.") === false) {
    $actual_link = "http://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header("Location: $actual_link");
}


