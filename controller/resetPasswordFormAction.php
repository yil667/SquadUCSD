<?php

include_once 'dbController.php';

$email = $_SESSION['forgetEmail'];
$newPassword = $_POST['newpassword'];

$sql = "UPDATE student SET hash1='' AND pwd='$newPassword' WHERE email='$email'";
$conn = connectToDB();
mysqli_query($conn, $sql);

header("Location: ../pages/login.php?reset");

?>
<!-- stop PHP Code -->

