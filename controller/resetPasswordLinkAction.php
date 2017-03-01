<?php

include_once 'dbController.php';

$email = $_SESSION['forgetEmail'];
$hash = $_SESSION['hash'];

echo "email is $email\n";
echo "hash is $hash\n";


//$sql = "SELECT * FROM student WHERE email='$email' AND hash1='$hash'";
//$conn = connectToDB();
//$result = mysqli_query($conn, $sql);
//
//// if the email and hash are correct
//if ($row = mysqli_fetch_assoc($result)) {
//    header("Location: ../pages/resetpassword.php");
//}
//else {
//    // No match -> invalid url or account has already been activated.
//    header("Location: ../pages/resetpassword.php?fail");
//}
?>
<!-- stop PHP Code -->

