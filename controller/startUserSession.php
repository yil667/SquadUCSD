<?php

include_once 'loginController.php';
session_start();

$isLoggedIn = isLoggedIn() ? 1 : 0;
$firstName = $isLoggedIn ? getFirstName() : "";

// forcefully redirects the website to contain "www" so the session variable doesn't behave unexpectedly
if($_SERVER['HTTP_HOST'] != "localhost" && strpos($_SERVER['HTTP_HOST'], "www.") === false)
{
    $actual_link = "http://www.$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header("Location: $actual_link");
}


