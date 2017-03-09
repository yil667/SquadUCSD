<?php
// wrapper page for creating groups to avoid that layer violation relax

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$hash = $_GET['hash'];

include_once "$_SERVER[DOCUMENT_ROOT]/controller/createGroupAction.php";

if ($valid) {
    header("Location: http://www.squaducsd.com/viewgroup.php?groupid=$groupid&formed");
} else {
    // redirects to error page
    // for now it's going to redirect to the home page
    header("Location: http://www.squaducsd.com/error.php");
}

?>