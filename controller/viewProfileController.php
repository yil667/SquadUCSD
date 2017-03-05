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
    if (mysqli_num_rows($result) == 0)
        return false;

    $row = mysqli_fetch_assoc($result);

    // declare return object
    $user = new User($id, $row['fname'], $row['lname'], $row['email'], $row['phone'], $row['major'], $row['about']);
//    echo ($row['fname']);
    // we now need to get the groups info
    // declare an empty array
    $groups = Array();
    if ($row['groups'] != "") {
        $groupIDs = explode(",", $row['groups']);

        // iterate through the groups that the user is affiliated with
        foreach ($groupIDs as $groupId) {
            if ($groupId != "") {
                $sql = "SELECT * FROM groupProfile WHERE id='$groupId'";
                $result = mysqli_query($conn, $sql);
                $groupRow = mysqli_fetch_assoc($result);

                $group = new Group(
                    $groupRow['id'], $groupRow['name'], $groupRow['size'],
                    $groupRow['maxSize'], $groupRow['class'], $groupRow['users']);
                $group->isFull = $group->isFull();
                $group->isMax = $group->isMax();

                array_push($groups, $group);
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
    if (mysqli_num_rows($result) == 0)
        return false;

    $row = mysqli_fetch_assoc($result);

    // declare return object
    $group = new Group($id, $row['name'], $row['size'], $row['maxSize'], $row['class'], "");
    $group->isFull = $group->isFull();
    $group->isMax = $group->isMax();
    // we now need to get the users' info
    $users = Array();

    if ($row['users']) {
        $userIDs = explode(",", $row['users']);

        // iterate through the groups that the user is affiliated with
        foreach ($userIDs as $userId) {
            if ($userId != "") {
                $sql = "SELECT * FROM student WHERE id='$userId'";
                $result = mysqli_query($conn, $sql);
                $userRow = mysqli_fetch_assoc($result);
                array_push($users, new User($userRow['id'], $userRow['fname'], $userRow['lname'],
                    $userRow['email'], "", "", ""));

            }
        }
    }

    $group->setUsers($users);

    return $group;
}

// this returns a boolean array, e.g., [true, false, true],
// indicating the whether the owner of the profile page is in the groups of the logged
// in user
function getInGroupInfo($groups, $id)
{
    // initialize empty array
    $inGroup = Array();

    // loop through each group in the $groups array
    foreach ($groups as $group)
    {
        // separate the comma delimited string of $group->getUsers()
        $user_arr = explode(",", $group->getUsers());
        $found = false;
        foreach ($user_arr as $userid)
        {
            // linear search and find the user
            if ($userid != "" && $userid == $id)
            {
                $found = true;
                break;
            }
        }
        array_push($inGroup, $found);
    }

    return $inGroup;
}