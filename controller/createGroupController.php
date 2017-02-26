<?php


function deleteRowInInviteTable($id1, $id2, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND hash='$hash'";
    mysqli_query($conn, $sql);
}