<?php
session_start();

include 'dbHandler.php';

$first = $_POST['first'];
$last = $_POST['last'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$sql = "INSERT INTO student (fname, lname, email, pwd) VALUES ('$first', '$last', '$email', '$password')";
$result = mysqli_query($conn, $sql);

header("Location: ../index.php");