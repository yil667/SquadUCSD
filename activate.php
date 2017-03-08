<?php
// wrapper page for verifying the account to avoid that layer violation relax

$hash = $_GET['hash'];
$email = $_GET['email'];

include_once "$_SERVER[DOCUMENT_ROOT]/controller/verifyAction.php";