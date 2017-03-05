<?php
// delete that row from the inviteTable
function deleteRowInInviteTable($id1, $id2, $groupid, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND groupid='$groupid' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

// update the group row in the groupProfile table
function updateGroupProfile($id2, $groupid, $MAX_GROUP_SIZE, $conn)
{
    // check to see if the group exists first
    $sql = "SELECT * FROM groupProfile WHERE id='$groupid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return false;

    $row = mysqli_fetch_assoc($result);
    if ($row['size'] >= $MAX_GROUP_SIZE)
        return false;

    if ($row['size'] == $row['maxSize'])
        $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id2'), size=size+1, maxSize=maxSize+1 WHERE id='$groupid';";
    else
        $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id2'), size=size+1 WHERE id='$groupid';";

    mysqli_query($conn, $sql);
    return true;
}

// update the "group" field for both individuals in the students table
function updateUserProfiles($id2, $groupid, $conn)
{
    $sql = "UPDATE student SET groups=CONCAT(groups, ',$groupid') where id='$id2'";
    mysqli_query($conn, $sql);
}