<?php


function deleteRowInInviteTable($id1, $id2, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

function createGroup($id1, $id2, $conn)
{
    $userString = $id1 . "," . $id2;
    $sql = "INSERT INTO groupProfile (current_size, users)" .
        " VALUES (2, '$userString')";
    mysqli_query($conn, $sql);
}