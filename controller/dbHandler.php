<?php

// attempt to connect to the database
$conn = mysqli_connect("localhost", "root", "", "logintest");

if(!$conn)
{
    // remove "mysqli_connect_error()" after testing phase
    die("Connection failed: " . mysqli_connect_error());
}