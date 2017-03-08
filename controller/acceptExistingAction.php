<?php
include_once "dbController.php";
include_once "acceptExistingActionController.php";

$conn = connectToDB();
$MAX_GROUP_SIZE = 10;

$sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND id2='$id2' AND groupid='$groupid' AND hash='$hash'";
$result = mysqli_query($conn, $sql);

$valid = false;
// check if the request exists in the inviteTable
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // delete that row from the inviteTable
    deleteRowInInviteTable($id1, $id2, $groupid, $hash, $conn);

    // update the group row in the groupProfile table
    $result = updateGroupProfile($id2, $groupid, $MAX_GROUP_SIZE, $conn);

    // if updated group successfully
    if ($result) {
        // update the "group" field for both individuals in the students table
        updateUserProfiles($id2, $groupid, $conn);
        $valid = true;
    }
}
