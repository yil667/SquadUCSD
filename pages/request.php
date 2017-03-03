<?php
// wrapper page for requesting to join groups to avoid that layer violation relax
// to be finished

$id1 = $_GET['id'];
$groupid = $_GET['groupid'];
$hash = $_GET['hash'];

include_once "../controller/requestAction.php";

//if ($valid) {
//    header("Location: ./viewgroup.php?groupid=$groupid&accepted");
//} else {
//    // redirects to error page
//    header("Location: ./error.php");
//}

?>