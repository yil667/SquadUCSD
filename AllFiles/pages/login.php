<?php
session_start();

include 'dbHandler.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM student WHERE email='$email' AND pwd='$password'";
$result = mysqli_query($conn, $sql);

// wrong login credentials entered
if (!$row = mysqli_fetch_assoc($result)) {
    // 2/5/17: Need to rewrite this part
    echo "You fucked up!!";
    sleep(5);
    header("Location: login.html");
}
// login credentials are correct
else {
    // global variable keeps track of whether the user is logged in or not
   $_SESSION['fname'] = $row['fname'];
   $_SESSION['id'] = $row['id'];
    header("Location: ../index.php");
}

