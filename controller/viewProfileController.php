<?php

include_once "../Class/User.php";


// returns a user object containing the relevant information of the user
function getUserObject($id)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $user = new User($id, $row['email'], $row['major'], "", $row['phone'], $row['about'], "", "", "");

    return $user;
}