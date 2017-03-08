<?php
// wrapper page for creating groups to avoid that layer violation relax

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$groupid = $_GET['groupid'];
$hash = $_GET['hash'];

include_once "$_SERVER[DOCUMENT_ROOT]/controller/acceptExistingAction.php";

if ($valid) {
    header("Location: http://www.squaducsd.com/viewgroup.php?groupid=$groupid&accepted");
} else {
    // redirects to error page
    // for now it's going to redirect to the home page
    header("Location: http://www.squaducsd.com/error.php");
}

?>