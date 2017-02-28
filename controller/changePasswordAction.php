<?php
include_once 'dbController.php';
include_once 'loginController.php';
include_once 'changePasswordController.php';

session_start();

// establish connection to the database
$conn = connectToDB();

$id = getUserId();
$currPassword = $_POST['currpassword'];
$newPassword = $_POST['password'];

if(validCurrPassword($conn, $id, $currPassword))
{
    updatePassword($conn, $id, $newPassword);
    header("Location: ../pages/editprofile.php?success");
}
else
{
    header("Location: ../pages/editprofile.php?fail");
}