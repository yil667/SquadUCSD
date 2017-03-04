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
    return "http://www.squaducsd.com/pages/viewprofile.php?userid=$id";
}

function generateInviteUrl($senderid, $receiverid, $hash)
{
    return "http://www.squaducsd.com/pages/accept.php?id1=$senderid&id2=$receiverid&hash=$hash";
}

function generateInviteMessage($senderRow, $receiverRow, $groupName, $className, $userMessage, $hash)
{
    $senderfname = $senderRow['fname'];
    $senderlname = $senderRow['lname'];
    $receiverfname = $receiverRow['fname'];
    $senderid = $senderRow['id'];
    $senderEmail = $senderRow['email'];
    $receiverid = $receiverRow['id'];

    $senderProfile = getProfileUrl($senderid);
    $inviteUrl = generateInviteUrl($senderid, $receiverid, $hash);

    $message = "
Hi $receiverfname, 
	
$senderfname $senderlname invited you to form a study group named $groupName for $className. Here is the included message from $senderfname: 
	
------------------------
$userMessage
------------------------
    
Here is the profile page for $senderfname: 
$senderProfile
    
Here is $senderfname's email:
$senderEmail

If you would like to join $senderfname, please click on the link below: 
$inviteUrl


SquadUCSD";

    return $message;
}

function generateSendMessage($senderRow, $receiverRow, $userMessage)
{
    $senderfname = $senderRow['fname'];
    $senderlname = $senderRow['lname'];
    $receiverfname = $receiverRow['fname'];
    $senderid = $senderRow['id'];
    $senderEmail = $senderRow['email'];

    $senderProfile = getProfileUrl($senderid);

    $message = "
Hi $receiverfname, 
	
$senderfname $senderlname sent you a message on SquadUCSD. Here is the included message from $senderfname: 
	
------------------------
$userMessage
------------------------
    
Here is the profile page for $senderfname: 
$senderProfile
    
Here is $senderfname's email:
$senderEmail


SquadUCSD";

    return $message;
}

function generateInviteSubject($senderRow)
{
    return "$senderRow[fname] $senderRow[lname] invited you to form a group on SquadUCSD!";
}

function generateMessageSubject($senderRow)
{
    return "$senderRow[fname] $senderRow[lname] sent you a message on SquadUCSD!";
}

// insert info of two users as well as the hash into the invite table
function addInviteRequestToDB($conn, $userid, $receiverid, $groupName, $className, $hash)
{
    $sql = "INSERT INTO inviteTable (id1, id2, hash, groupName, className) VALUES ('$userid', '$receiverid', '$hash', '$groupName', '$className')";
    mysqli_query($conn, $sql);
}

function sendInviteEmail($conn, $userid, $receiverid, $groupName, $className, $userMessage, $hash)
{
    // get the rows
    $senderRow = getRow($conn, $userid);
    $receiverRow = getRow($conn, $receiverid);

    $message = generateInviteMessage($senderRow, $receiverRow, $groupName, $className, $userMessage, $hash);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateInviteSubject($senderRow); // Give the email a subject

    // send the email
    mail($receiverRow['email'], $subject, $message, $headers);
}

function sendEmail($conn, $userid, $receiverid, $userMessage)
{
    // get the rows
    $senderRow = getRow($conn, $userid);
    $receiverRow = getRow($conn, $receiverid);

    $message = generateSendMessage($senderRow, $receiverRow, $userMessage);
    $headers = 'From: message' . "\r\n";
    $subject = generateMessageSubject($senderRow); // Give the email a subject

    // send the email
    mail($receiverRow['email'], $subject, $message, $headers);
}