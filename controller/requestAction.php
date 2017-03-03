<?php
include_once 'dbController.php';
include_once 'requestActionController.php';

// extract values from the url

$sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND groupid='$groupid' AND hash='$hash'";
$conn = connectToDB();
$result = mysqli_query($conn, $sql);

$valid = false;
// check if the request exists in the inviteTable
if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    $valid = true;

    // delete that row from the inviteTable
    deleteRowInInviteTable($id1, $groupid, $hash, $conn);

    // update the group row in the groupProfile table
    updateGroupProfile($id1, $groupid, $conn);

    // update the "group" field for both individuals in the students table
    updateUserProfiles($id1, $groupid, $conn);
}
