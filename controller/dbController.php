<?php

// need to add some sort of error checking later
function connectToDB()
{
    // attempt to connect to the database
    return mysqli_connect("localhost", "root", "", "logintest");
}



//if(!$conn)
//{
//    // remove "mysqli_connect_error()" after testing phase
//    die("Connection failed: " . mysqli_connect_error());
//}