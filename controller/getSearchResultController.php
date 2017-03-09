<?php

include_once "viewProfileController.php";

function getListOfUsers($conn, $class, $userObj)
{
    $sql = "SELECT * FROM student WHERE class1='$class' OR class2='$class' OR class3='$class' OR class4='$class' " .
        "OR class5='$class' OR class6='$class'";

    $link = mysqli_query($conn, $sql);

    // initialize empty array for the result
    $result = Array();
    while ($row = mysqli_fetch_assoc($link)) {
        $id = $row['id'];
        if ($userObj->getUserid() != $id) {
            $newUserObj = getUserObject($id);
            array_push($result, $newUserObj);
        }
    }

    return $result;
}

function getListOfGroups($conn, $class, $userObj)
{
    $sql = "SELECT * FROM groupProfile WHERE class='$class'";

    $link = mysqli_query($conn, $sql);
    $userid = $userObj->getUserid();

    // initialize empty array for the result
    $result = Array();
    while ($row = mysqli_fetch_assoc($link)) {
        $groupid = $row['id'];
        $group = getGroupObject($groupid);
        if(!$group->hasUser($userid))
            array_push($result, $group);
    }

    return $result;
}