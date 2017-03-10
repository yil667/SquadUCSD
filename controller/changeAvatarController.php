<?php
function updateUserProfile($conn, $userid, $file_name)
{
    $avatarLink = "./img/" . $file_name;
    $sql = "UPDATE student SET avatar='$avatarLink' WHERE id='$userid'";
    mysqli_query($conn, $sql);
}