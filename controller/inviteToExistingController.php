<?php

// add a request to the Invite HashCode Table
function addInviteRequestToDB($conn, $userid, $receiverid, $groupid, $hash)
{
    $sql = "INSERT INTO inviteTable (id1, id2, groupid, hash) VALUES ('$userid', '$receiverid', '$groupid', '$hash')";
    mysqli_query($conn, $sql);
}

// send the email request to the receiver
function sendInviteEmail($user, $receiver, $group, $message, $hash)
{
    $message = generateInviteMessage($user, $receiver, $group, $message, $hash);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateInviteSubject($user); // Give the email a subject


    $receiverEmail = $receiver->getEmail();
    // send the email
    mail($receiverEmail, $subject, $message, $headers);
}

function generateInviteSubject($user)
{
    $fname = $user->getFname();
    $lname = $user->getLname();

    return "$fname $lname invited you to join a group on SquadUCSD!";
}

function getGroupProfileUrl($groupid)
{
    return "http://www.squaducsd.com/pages/viewgroup.php?groupid=$groupid";
}

function generateInviteUrl($senderid, $receiverid, $groupid, $hash)
{
    return "http://www.squaducsd.com/pages/invitetoexiting.php?id1=$senderid&id2=$receiverid&groupid=$groupid&hash=$hash";
}

function generateInviteMessage($user, $receiver, $group, $message, $hash)
{
    $senderfname = $user->getFname();
    $senderlname = $user->getLname();
    $receiverfname = $receiver->getFname();
    $senderid = $user->getUserid();
    $senderEmail = $user->getEmail();
    $receiverid = $receiver->getUserid();
    $groupid = $group->getGroupid();
    $groupName = $group->getName();

    $groupProfile = getGroupProfileUrl($groupid);
    $inviteUrl = generateInviteUrl($senderid, $receiverid, $groupid, $hash);

    $message = "
Hi $receiverfname, 
	
$senderfname $senderlname invited you to his/her study group $groupName. Here is the included message from $senderfname: 
	
------------------------
$message
------------------------
    
Here is the group profile page for $groupName: 
$groupProfile
    
Here is $senderfname's email:
$senderEmail

If you would like to join $groupProfile, please click on the link below: 
$inviteUrl

SquadUCSD";

    return $message;
}