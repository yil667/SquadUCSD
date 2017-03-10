<?php

include_once "dbController.php";
include_once "loginController.php";

session_start();


$target_dir = "$_SERVER[DOCUMENT_ROOT]/img/";

$userid = getUserId();

echo "relax nig";



if (isset($_POST["filename"]))
    echo "relax it's set";
else
    echo "relax it didn't";

if (isset($_POST["changeAvatarForm"]))
    echo "relax it's set2";
else
    echo "relax it didn't2";

//$suffix = pathinfo($_FILES["filename"]["name"])["extension"];
//
//echo "The file name is " . $_FILES["filename"]["name"];
//echo "-------";
//echo "extension gets you " . $suffix;


//$target_str =  $target_dir . "user_" . $userid . $suffix;
//
//
//
//echo $suffix;
//
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
//$uploadOk = 1;
//$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
//// Check if image file is a actual image or fake image
//if(isset($_POST["submit"])) {
//    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//    if($check !== false) {
//        echo "File is an image - " . $check["mime"] . ".";
//        $uploadOk = 1;
//    } else {
//        echo "File is not an image.";
//        $uploadOk = 0;
//    }
//}