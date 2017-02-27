<?php

include_once "../Class/User.php";


// returns a user object containing the relevant information of the user
function getUserObject($id)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    $user = new User($id, $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['major'], $row['about']);

    // we now need to get the groups info

    // declare an empty array
    $groups = Array();

    // iterate through the groups that the user is affiliated with
    foreach ($row['groups'] as $groupId) {
        $sql = "SELECT * FROM groupProfile WHERE id='$groupId'";
        $result = mysqli_query($conn, $sql);
        $groupRow = mysqli_fetch_assoc($result);
        array_push($groups, $groupRow['id'] . "," . $groupRow['name']);
    }

    $user->setGroups($groups);

    return $user;
}