<?php
include_once "dbController.php";
include_once "loginController.php";
include_once "generalLibrary.php";
include_once "viewProfileController.php";

session_start();

handleNotLoggedIn();

$id = getUserId();
$user = getUserObject($id);

// establish connection to the database
$conn = connectToDB();

// add escape character to prevent sql injection
$phone = mb_substr(mysqli_real_escape_string($conn, $_POST['phone']), 0, $MAX_PHONE_SIZE, "UTF-8");

// if the phone number doesn't contain all digits, set it to default empty string
if (!ctype_digit($phone))
    $phone = $user->getPhone();

$major = mb_substr(mysqli_real_escape_string($conn, $_POST['major']), 0, $MAX_MAJOR_NAME, "UTF-8");


$about = substr(mysqli_real_escape_string($conn, $_POST['about']), 0, $MAX_ABOUT_SIZE);

$class1 = substr(mysqli_real_escape_string($conn, $_POST['class1']), 0, $MAX_CLASS_NAME);
$class2 = substr(mysqli_real_escape_string($conn, $_POST['class2']), 0, $MAX_CLASS_NAME);
$class3 = substr(mysqli_real_escape_string($conn, $_POST['class3']), 0, $MAX_CLASS_NAME);
$class4 = substr(mysqli_real_escape_string($conn, $_POST['class4']), 0, $MAX_CLASS_NAME);
$class5 = substr(mysqli_real_escape_string($conn, $_POST['class5']), 0, $MAX_CLASS_NAME);
$class6 = substr(mysqli_real_escape_string($conn, $_POST['class6']), 0, $MAX_CLASS_NAME);


$sql = "UPDATE student SET phone='$phone', major='$major', about='$about', " .
    "class1='$class1', class2='$class2', class3='$class3', class4='$class4', " .
    "class5='$class5', class6='$class6' WHERE id='$id'";


mysqli_query($conn, $sql);

header("Location: http://www.squaducsd.com/editprofile.php?saved");
