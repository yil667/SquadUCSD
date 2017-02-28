<?php

include_once "../Class/User.php";
include_once "../Class/Group.php";
include_once "../Class/Course.php";


// returns a user object containing the relevant information of the user
function getUserObject($id)
{
    // first retrieve the row from the database
    $sql = "SELECT * FROM student WHERE id='$id'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    // declare return object
    $user = new User($id, $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['major'], $row['about']);

    // we now need to get the groups info
    // declare an empty array
    $groups = Array();

    // iterate through the groups that the user is affiliated with
    foreach ($row['groups'] as $groupId) {
        $sql = "SELECT * FROM groupProfile WHERE id='$groupId'";
        $result = mysqli_query($conn, $sql);
        $groupRow = mysqli_fetch_assoc($result);
        array_push($groups, new Group($groupRow['id'], $groupRow['name'], "", "", ""));
    }

    $user->setGroups($groups);

    // get the classses
    $classes = array(
        new Course($row['class1'], $row['searchGroup1']),
        new Course($row['class2'], $row['searchGroup2']),
        new Course($row['class3'], $row['searchGroup3']),
        new Course($row['class4'], $row['searchGroup4']),
        new Course($row['class5'], $row['searchGroup5']),
        new Course($row['class6'], $row['searchGroup6']),
    );

    $user->setClasses($classes);

    return $user;
}