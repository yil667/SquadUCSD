<?php

include_once "viewProfileController.php";

// send the email request to the receiver
function sendEmail($user, $group, $message)
{
    $message = generateMessageBody($user, $group, $message);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateMessageSubject($user); // Give the email a subject

    $receiverEmail = generateReceivers($group, $user->getUserid());

    // send the email
    mail($receiverEmail, $subject, $message, $headers);
}

function generateMessageSubject($user)
{
    $fname = $user->getFname();
    $lname = $user->getLname();

    return "$fname $lname sent you a group message on SquadUCSD!";
}

function getGroupProfileUrl($groupid)
{
    return "http://www.squaducsd.com/viewgroup.php?groupid=$groupid";
}

function generateReceivers($group, $userid)
{
    $ret = "";

    // append all the emails, separated by commas
    foreach ($group->getUsers() as $user) {
        if ($user->getUserid() != $userid)
            $ret = $ret . $user->getEmail() . ",";
    }

    // remove the last comma
    $ret = substr($ret, 0, strlen($ret) - 1);

    return $ret;
}

function generateMessageBody($user, $group, $message)
{
    $senderfname = $user->getFname();
    $senderlname = $user->getLname();
    $senderEmail = $user->getEmail();
    $groupid = $group->getGroupid();
    $groupName = $group->getName();

    $groupProfile = getGroupProfileUrl($groupid);

    $message = "
    
Dear member in $groupName, 
	
$senderfname $senderlname sent you a group message. Here is the included message from $senderfname: 
	
------------------------
$message
------------------------
    
Here is the group profile page for $groupName: 
$groupProfile
    
Here is $senderfname's email:
$senderEmail

SquadUCSD";

    return $message;
}