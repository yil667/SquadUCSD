<?php

include_once 'loginController.php';
session_start();

$isLoggedIn = isLoggedIn() ? 1 : 0;
$firstName = $isLoggedIn ? getFirstName() : "";


