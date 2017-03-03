<?php
function removeFromString($str, $item)
{
    $parts = explode(',', $str);

    while (($i = array_search($item, $parts)) !== FALSE) {
        unset($parts[$i]);
    }

    return implode(',', $parts);
}

function getUserRow($conn, $id)
{
    $sql = "SELECT * FROM student WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getGroupRow($conn, $groupid)
{
    $sql = "SELECT * FROM groupProfile WHERE id ='$groupid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// remove users in student table who are in the group
function removeAllUsersInroup($conn, $groupid, $group)
{
    foreach ($group->getUsers() as $user) {
        removeGroupFromUser($conn, $user->getUserid(), $groupid);
    }
}

// remove the user from the groupProfile table
function removeUserFromGroup($conn, $id, $groupid, $currGroupSize)
{
    // get the group row in the groupProfile table
    $groupRow = getGroupRow($conn, $groupid);

    // get the list of users in a string form, delimited by commas
    $usersInGroupStr = $groupRow['users'];

    // remove the user from the string
    $newStr = removeFromString($usersInGroupStr, $id);

    // update the group row
    updateGroupRow($conn, $groupid, $newStr, $currGroupSize);
}

// remove the gorupid from the student table
function removeGroupFromUser($conn, $id, $groupid)
{
    // get the user row in the student table
    $userRow = getUserRow($conn, $id);

    // get the list of groups that the user is affiliated with
    $groupsInUserStr = $userRow['groups'];

    // remove the group from the string
    $newStr = removeFromString($groupsInUserStr, $groupid);

    // update the user row
    updateUserRow($conn, $id, $newStr);
}

function disbandGroup($conn, $groupid)
{
    $sql = "DELETE FROM groupProfile where id='$groupid'";
    mysqli_query($conn, $sql);
}

function updateGroupRow($conn, $groupid, $newStr, $currGroupSize)
{
    $newGroupSize = $currGroupSize - 1;
    $sql = "UPDATE groupProfile SET users='$newStr', size='$newGroupSize' WHERE id='$groupid'";
    mysqli_query($conn, $sql);
}

function updateUserRow($conn, $id, $newStr)
{
    $sql = "UPDATE student SET groups='$newStr' WHERE id='$id'";
    mysqli_query($conn, $sql);
}

