<?php

function deleteRowInInviteTable($id1, $id2, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

function createGroup($id1, $id2, $conn)
{
    $userString = $id1 . "," . $id2;
    $sql = "INSERT INTO groupProfile (users)" .
        " VALUES('$userString')";
    mysqli_query($conn, $sql);

    return $conn->insert_id;
}

// Update the list of group id's for each individual
function updateUserProfiles($id1, $id2, $groupid, $conn)
{
    // update group for user 1
    updateIndividualGroupInfo($id1, $groupid, $conn);
    // update group for user 2
    updateIndividualGroupInfo($id2, $groupid, $conn);
}

function updateIndividualGroupInfo($id, $groupid, $conn)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $newGroupString = $row['groups'] . "," . $groupid;
    $sql = "UPDATE student SET groups='$newGroupString' where id='$id'";
    mysqli_query($conn, $sql);
}