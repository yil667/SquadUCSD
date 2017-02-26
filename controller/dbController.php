<?php

// need to add some sort of error checking later
function connectToDB()
{
    // attempt to connect to the database
    // The password for remote server is "8CMr1YZUXb". Right now it's
    // kept as an empty string for you darn WAMP users -- Scott
    return mysqli_connect("localhost", "root", "", "logintest");
}



//if(!$conn)
//{
//    // remove "mysqli_connect_error()" after testing phase
//    die("Connection failed: " . mysqli_connect_error());
//}