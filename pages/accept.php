<?php

$id1 = $_GET['id1'];
$id2 = $_GET['id2'];
$hash = $_GET['hash'];

include_once "../controller/createGroupAction.php";

echo $valid ? "nigga" : "please";