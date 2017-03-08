<?php
include_once 'dbController.php';
include_once 'loginController.php';

session_start();

handleNotLoggedIn();

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


$id = getUserId();

// we assume data validation has already taken place in the front end
$sql = "UPDATE student SET phone='$phone', major='$major', about='$about', " .
    "class1='$class1', class2='$class2', class3='$class3', class4='$class4', " .
    "class5='$class5', class6='$class6' WHERE id='$id'";


mysqli_query($conn, $sql);

header("Location: ../editprofile.php?saved");
