<?php
include_once 'dbController.php';
include_once 'createGroupController.php';

// extract values from the url
$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$hash = $_GET['hash'];
echo "<h1>$id1 $id2 $hash</h1>";

$sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND id2='$id2' AND hash='$hash'";
$conn = connectToDB();
$result = mysqli_query($conn, $sql);

// check if the invite exists in the inviteTable
if ($row = mysqli_fetch_assoc($result)) {
    echo "<h2>we're in the matrix</h2>";
    // delete that row from the inviteTable
    deleteRowInInviteTable($id1, $id2, $hash, $conn);

    // create a new group and put these 2 people in that group
    createGroup($id1, $id2, $conn);

    // update the "group" field for both individuals in the students table
}

// the invite doesn't exist
else{
    // redirect somewhere else
}

