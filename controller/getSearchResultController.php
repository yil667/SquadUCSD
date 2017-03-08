<?php

include_once "viewProfileController.php";

function getListOfUsers($conn, $class, $user)
{
    $sql = "SELECT * FROM student WHERE class1='$class' OR class2='$class' OR class3='$class' OR class4='$class' " .
    "OR class5='$class' OR class6='$class'";

    $link = mysqli_query($conn, $sql);

    // initialize empty array for the result
    $result = Array();
    while($row = mysqli_fetch_assoc($link))
    {
        $id = $row['id'];
        if($user->getUserid() != $id)
        {
            $user = getUserObject($id);
            array_push($result, $user);
        }
    }

    return $result;
}

function getListOfGroups($conn, $class, $user)
{

}