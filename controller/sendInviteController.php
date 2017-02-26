<?php

// given connection and a userid, retrieves the row of user info
// from the database for given user
function getRow($conn, $id)
{
    $sql = "SELECT * FROM student WHERE id ='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

// generates a user's url for the profile's page
function getProfileUrl($id)
{
    return "http://squaducsd.com/pages/viewprofile.php?userid=$id";
}

function generateInviteUrl($senderid, $receiverid, $hash)
{
    return "http://www.squaducsd.com/controller/createGroupController.php?id1=$senderid&id2=$receiverid&hash=$hash";
}

function generateMessage($senderRow, $receiverRow, $userMessage, $hash)
{
    $senderfname = $senderRow['fname'];
    $senderlname = $senderRow['lname'];
    $receiverfname = $receiverRow['fname'];
    $senderid = $senderRow['id'];
    $senderEmail = $senderRow['email'];
    $receiverid = $receiverRow['id'];

    $senderProfile = getProfileUrl($senderRow['id']);
    $inviteUrl = generateInviteUrl($senderid, $receiverid, $hash);

    $message = "
Hi $receiverfname, 
	
$senderfname $senderlname invited you to form a study group. Here is the included message from $senderfname: 
	
------------------------
$userMessage
------------------------
    
Here is the profile page for $senderfname: 
$senderProfile
    
Here is $senderfname's email:
$senderEmail

If you would like to join $senderfname, please click on the link below: 
$inviteUrl ";

    return $message;
}

function generateSubject($senderRow, $receiverRow)
{
    return "$senderRow[fname] $senderRow[lname] invited you to a group!";
}

function addRequestToDB($conn, $userid, $receiverid, $hash)
{
    $sql = "INSERT INTO inviteTable (id1, id2, hash) VALUES ('$userid', '$receiverid', '$hash')";
    mysqli_query($conn, $sql);
}

function sendInvite($conn, $userid, $receiverid, $userMessage, $hash)
{
    // get the rows
    $senderRow = getRow($conn, $userid);
    $receiverRow = getRow($conn, $receiverid);

    $message = generateMessage($senderRow, $receiverRow, $userMessage, $hash);
    $headers = 'From: Admin' . "\r\n"; // Set from headers
    $subject = generateSubject($senderRow, $receiverRow); // Give the email a subject
    mail($receiverRow['email'], $subject, $message, $headers);
}