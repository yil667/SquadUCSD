<?php

include_once 'dbController.php';

$sql = "SELECT * FROM student WHERE email='$email' AND hash='$hash' AND active='0'";
$conn = connectToDB();
$result = mysqli_query($conn, $sql);


// if the login info was valid
if ($row = mysqli_fetch_assoc($result)) {
    mysqli_query($conn, "UPDATE student SET active='1' WHERE email='" . $email . "' AND hash='" . $hash . "' AND active='0'") or die(mysql_error());
    header("Location: ../login.php?verified");
} else {
    // No match -> invalid url or account has already been activated.
    header("Location: ../login.php?activate_invalid");
}

?>
<!-- stop PHP Code -->

