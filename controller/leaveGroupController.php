<?php
function removeFromString($str, $item)
{
    $parts = explode(',', $str);

    while (($i = array_search($item, $parts)) !== false) {
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
    $sql = "SELECT * FROM groupprofile WHERE id ='$groupid'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function disbandGroup($conn, $groupid)
{
    $sql = "DELETE FROM groupprofile where id='$groupid'";
    mysqli_query($conn, $sql);
}

// remove the user from the groupprofile table
function removeUserFromGroup($conn, $id, $groupid)
{
    // get the group row in the groupprofile table
    $groupRow = getGroupRow($conn, $groupid);

    // get the list of users in a string form, delimited by commas
    $usersInGroupStr = $groupRow['users'];

    // remove the user from the string
    $newStr = removeFromString($usersInGroupStr, $id);

    // update the group row
    updateGroupRow($conn, $groupid, $newStr);
}

function updateGroupRow($conn, $groupid, $newStr)
{
    $sql = "UPDATE groupprofile SET users='$newStr' WHERE id='$groupid'";
    mysqli_query($conn, $sql);
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

function updateUserRow($conn, $id, $newStr)
{
    $sql = "UPDATE student SET groups='$newStr' WHERE id='$id'";
    mysqli_query($conn, $sql);
}