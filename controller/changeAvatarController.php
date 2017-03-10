<?php
function updateUserProfile($conn, $userid, $file_name)
{
    $sql = "UPDATE student SET avatar='$file_name' WHERE id='$userid'";
    mysqli_query($conn, $sql);
}