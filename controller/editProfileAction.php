<?php
include_once 'dbController.php';

session_start();

// establish connection to the database
$conn = connectToDB();

// add escape character to prevent sql injection
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$major = mysqli_real_escape_string($conn, $_POST['major']);
$about = mysqli_real_escape_string($conn, $_POST['about']);
$class1 = mysqli_real_escape_string($conn, $_POST['class1']);
$class2 = mysqli_real_escape_string($conn, $_POST['class2']);
$class3 = mysqli_real_escape_string($conn, $_POST['class3']);
$class4 = mysqli_real_escape_string($conn, $_POST['class4']);
$class5 = mysqli_real_escape_string($conn, $_POST['class5']);
$class6 = mysqli_real_escape_string($conn, $_POST['class6']);


$id = $_SESSION['id'];

// we assume data validation has already taken place in the front end
$sql = "UPDATE student SET phone='$phone', major='$major', about='$about', " .
    "class1='$class1', class2='$class2', class3='$class3', class4='$class4', " .
    "class5='$class5', class6='$class6' WHERE id='$id'";


$result = mysqli_query($conn, $sql);


if ($result) {
    header("Location: ../pages/editprofile.php?success");
}
else {
    header("Location: ../pages/editprofile.php?fail");
}
