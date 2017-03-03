<?php
// delete that row from the inviteTable
function deleteRowInInviteTable($id1, $groupid, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND groupid='$groupid' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

// update the group row in the groupProfile table
function updateGroupProfile($id1, $groupid, $conn)
{
    // check to see if the group exists first
    $sql = "SELECT * FROM groupProfile WHERE id='$groupid'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0)
        return false;

    $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id1'), size=size+1 WHERE id='$groupid';";
    mysqli_query($conn, $sql);
    return true;
}

// update the "group" field for both individuals in the students table
function updateUserProfiles($id1, $groupid, $conn)
{
    $sql = "UPDATE student SET groups=CONCAT(groups, ',$groupid') where id='$id1'";
    mysqli_query($conn, $sql);
}