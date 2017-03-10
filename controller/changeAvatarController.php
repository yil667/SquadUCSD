<?php
function updateUserProfile($conn, $userid, $file_name)
{
    $avatarLink = "./img/" . $file_name;
    $sql = "UPDATE student SET avatar='$avatarLink' WHERE id='$userid'";
    mysqli_query($conn, $sql);
}

function updateGroupProfile($conn, $groupid, $file_name)
{
    $avatarLink = "./img/" . $file_name;
    $sql = "UPDATE grouProfile SET avatar='$avatarLink' WHERE id='$groupid'";
    mysqli_query($conn, $sql);
}