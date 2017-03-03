<?php
include_once 'dbController.php';
include_once 'requestActionController.php';

$conn = connectToDB();

echo "hello";
//$sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id1'), size=size+1 WHERE id='';";
//mysqli_query($conn, $sql);


//$sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND groupid='$groupid' AND hash='$hash'";
//$result = mysqli_query($conn, $sql);
//
//$valid = false;
//// check if the request exists in the inviteTable
//if(mysqli_num_rows($result) > 0)
//{
//    $row = mysqli_fetch_assoc($result);
//    $valid = true;
//
//    // delete that row from the inviteTable
//    deleteRowInInviteTable($id1, $groupid, $hash, $conn);
//
//    // update the group row in the groupProfile table
//    $result1 = updateGroupProfile($id1, $groupid, $conn);
//
//    // update the "group" field for both individuals in the students table
//    updateUserProfiles($id1, $groupid, $conn);
//}
