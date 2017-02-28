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

    if ($row['groups']) {
        $groupIDs = explode($row['groups'], ",");

        // iterate through the groups that the user is affiliated with
        foreach ($groupIDs as $groupId) {
            if ($groupId != "") {
                $sql = "SELECT * FROM groupProfile WHERE id='$groupId'";
                $result = mysqli_query($conn, $sql);
                $groupRow = mysqli_fetch_assoc($result);
                array_push($groups, new Group(
                    $groupRow['id'], $groupRow['name'], $groupRow['size'],
                    $groupRow['maxSize'], $groupRow['class']));
            }
        }
    }

    $user->setGroups($groups);

    // get the classses
    $user->setClass1(new Course($row['class1'], $row['searchGroup1']));
    $user->setClass2(new Course($row['class2'], $row['searchGroup2']));
    $user->setClass3(new Course($row['class3'], $row['searchGroup3']));
    $user->setClass4(new Course($row['class4'], $row['searchGroup4']));
    $user->setClass5(new Course($row['class5'], $row['searchGroup5']));
    $user->setClass6(new Course($row['class6'], $row['searchGroup6']));

    return $user;
}

function getGroupObject($id)
{
    // first retrieve the row from the database
    $sql = "SELECT * FROM groupProfile WHERE id='$id'";
    $conn = connectToDB();
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    // declare return object
    $group = new Group($id, $row['name'], $row['class'], $row['size']);

    // we now need to get the users' info
    $users = Array();

    if ($row['users']) {
        $userIDs = explode($row['users'], ",");

        // iterate through the groups that the user is affiliated with
        foreach ($userIDs as $userId) {
            if ($userId != "") {
                $sql = "SELECT * FROM student WHERE id='$userId'";
                $result = mysqli_query($conn, $sql);
                $userRow = mysqli_fetch_assoc($result);
                array_push($users, new User($userRow['id'], $userRow['fname'] . " " . $userRow['lname'],
                    "", "", "", "", ""));

            }
        }
    }

    $group->setUsers($users);

    return $group;
}
