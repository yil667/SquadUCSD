<?php

include_once 'dbController.php';



// pre-condition: email does not already exist in the database,
// and valid credentials
// no redirection is done in this function
// tentative parameter list (do we want to pass in the user info, or do we want to use $_POST[] ?)
function addUser($email, $password, $first, $last)
{
    $sql = "INSERT INTO student (fname, lname, email, pwd) VALUES ('$first', '$last', '$email', '$password')";
    $conn = connectToDB();
    mysqli_query($conn, $sql);
}



//$first = $_POST['first'];
//$last = $_POST['last'];
//$email = $_POST['email'];
//$password = $_POST['password'];
//$password2 = $_POST['password2'];

//$sql = "INSERT INTO student (fname, lname, email, pwd) VALUES ('$first', '$last', '$email', '$password')";
//$result = mysqli_query($conn, $sql);

//header("Location: ../pages/login.php");