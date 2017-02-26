<?php
include_once 'dbController.php';

session_start();

$phone = $_POST['phone'];
$major = $_POST['major'];
$about = $_POST['about'];
$id = $_SESSION['id'];

// we assume data validation has already taken place in the front end
$sql = "UPDATE student SET phone='$phone', major='$major', about='$about' WHERE id='$id'";

$conn = connectToDB();
$result = mysqli_query($conn, $sql);


if($result )
{
    header("Location: ../pages/editprofile.php?success");
}
else
{
    header("Location: ../pages/editprofile.php?fail");
}
