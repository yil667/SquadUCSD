<?php

include_once "dbController.php";
include_once "loginController.php";
include_once "changeAvatarController.php";

session_start();

$userid = getUserId();
$target_dir = "$_SERVER[DOCUMENT_ROOT]/img/";
$suffix = pathinfo($_FILES["filename"]["name"])["extension"];
$target_str = $target_dir .  "user_" . $userid . "." . $suffix;

// this line checks for a valid image
$validImage = getimagesize($_FILES["filename"]["tmp_name"]);

// check for the file size
$validSize = $_FILES["filename"]["size"] < 250000;

echo "dumping nigga";
var_dump($_FILES);

if (!$validImage)
    header("Location: http://www.squaducsd.com/editprofile.php?invalidimage");
else if (!$validSize)
    header("Location: http://www.squaducsd.com/editprofile.php?invalidsize");
else {
    // put the file in the disk

    echo $target_str;
    echo $_FILES["filename"]["tmp_name"];

    if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_str))
        echo "relax";
    else
        echo "fuxk off";

    // update the database
//    updateUserProfile();

//    header("Location: http://www.squaducsd.com/editprofile.php?badimage");
}
// redirect with flag