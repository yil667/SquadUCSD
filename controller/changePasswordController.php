<?php

function validCurrPassword($conn, $id, $currPassword)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['pwd'] == $currPassword;
}

function updatePassword($conn, $id, $newPassword)
{
    $sql = "UPDATE student SET pwd='$newPassword' WHERE id='$id'";
    mysqli_query($conn, $sql);
}