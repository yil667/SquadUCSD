<?php

function validCurrPassword($conn, $id, $currPassword)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $pwd_hash = $row['pwd'];
    $valid = password_verify($currPassword, $pwd_hash);

    return $valid;
}

function updatePassword($conn, $id, $newPassword)
{
    $pwd_hash = password_hash($newPassword, PASSWORD_DEFAULT);

    $sql = "UPDATE student SET pwd='$pwd_hash' WHERE id='$id'";
    mysqli_query($conn, $sql);
}