<?php
include_once "dbController.php";
include_once "requestActionController.php";
include_once "viewProfileController.php";

$conn = connectToDB();

$sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND groupid='$groupid' AND hash='$hash'";
$result = mysqli_query($conn, $sql);

$valid = false;
// check if the request exists in the inviteTable
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // delete that row from the inviteTable
    deleteRowInInviteTable($id1, $groupid, $hash, $conn);

    // update the group row in the groupProfile table
    $result = updateGroupProfile($id1, $groupid, $conn);

    // if updated group successfully
    if ($result) {
        // update the "group" field for both individual in the students table
        updateUserProfiles($id1, $groupid, $conn);

        $requester = getUserObject($id1);
        $group = getGroupObject($groupid);

        // send confirmation email to the requester
        sendEmailToRequester($requester, $group);

        // send confirmation email to the rest of the group, excluding the accepter
        sendEmailToGroup($requester, $group);

        $valid = true;
    }
}
