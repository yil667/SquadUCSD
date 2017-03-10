<?php

include_once "viewProfileController.php";

function getListOfUsers($conn, $query, $userObj)
{
    // initialize empty array for the result
    $result = Array();

    // search for classes
    $sql = "SELECT * FROM student WHERE class1='$query' OR class2='$query' OR class3='$query' OR class4='$query' " .
        "OR class5='$query' OR class6='$query'";

    $link = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($link)) {
        $id = $row['id'];
        $newUserObj = getUserObject($id);
        if ($userObj->getUserid() != $id && !in_array($newUserObj, $result)) {
            array_push($result, $newUserObj);
        }
    }

    // if no result is found, search for individuals
    if (sizeof($result) == 0) {
        // search for the substrings, where space is the delimiter
        $arr = explode(" ", $query);
        foreach ($arr as $str) {
            if ($str !== "") {
                $sql = "SELECT * FROM student WHERE fname='$query' OR lname='$query'";
                $link = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($link)) {
                    $id = $row['id'];
                    $newUserObj = getUserObject($id);
                    if ($userObj->getUserid() != $id && !in_array($newUserObj, $result)) {
                        array_push($result, $newUserObj);
                    }
                }
            }
        }
    }


    return $result;
}

function getListOfGroups($conn, $query, $userObj)
{
    $sql = "SELECT * FROM groupProfile WHERE class='$query'";

    $link = mysqli_query($conn, $sql);
    $userid = $userObj->getUserid();

    // initialize empty array for the result
    $result = Array();
    while ($row = mysqli_fetch_assoc($link)) {
        $groupid = $row['id'];
        $group = getGroupObject($groupid);
        if (!$group->hasUser($userid) && !in_array($group, $result))
            array_push($result, $group);
    }

    // if no result is found from searching through classes
    if (sizeof($result) == 0) {
        // search group names
        // search for the substrings, where space is the delimiter
        $arr = explode(" ", $query);
        foreach ($arr as $str) {
            if ($str !== "") {
                $sql = "SELECT * FROM groupProfile WHERE name='$query'";
                $link = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($link)) {
                    $groupid = $row['id'];
                    $group = getGroupObject($groupid);
                    if (!$group->hasUser($userid) && !in_array($group, $result))
                        array_push($result, $group);
                }
            }

        }
    }


    return $result;
}