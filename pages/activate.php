<?php
// wrapper page for verifying the account to avoid that layer violation relax

$hash = $_GET['hash'];
$email = $_GET['email'];

include_once "../controller/verifyAction.php";