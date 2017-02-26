<?php
include_once 'dbController.php';

session_start();

// establish connection to the database
$conn = connectToDB();

// add escape character to prevent sql injection
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$major = mysqli_real_escape_string($conn, $_POST['major']);
$about = mysqli_real_escape_string($conn, $_POST['about']);
$id = $_SESSION['id'];

// we assume data validation has already taken place in the front end
$sql = "UPDATE student SET phone='$phone', major='$major', about='$about' WHERE id='$id'";


$result = mysqli_query($conn, $sql);


if($result)
{
    header("Location: ../pages/editprofile.php?success");
}
else
{
    header("Location: ../pages/editprofile.php?fail");
}
