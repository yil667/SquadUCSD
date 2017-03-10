<?php

include_once "viewProfileController.php";

// delete that row from the inviteTable
function deleteRowInInviteTable($id1, $groupid, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND groupid='$groupid' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

// update the group row in the groupProfile table
function updateGroupProfile($id1, $groupid, $conn)
{
    // check to see if the group exists first
    $sql = "SELECT * FROM groupProfile WHERE id='$groupid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return false;

    $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id1'), size=size+1 WHERE id='$groupid';";
    mysqli_query($conn, $sql);
    return true;
}

// update the "group" field for both individuals in the students table
function updateUserProfiles($id1, $groupid, $conn)
{
    $sql = "UPDATE student SET groups=CONCAT(groups, ',$groupid') where id='$id1'";
    mysqli_query($conn, $sql);
}

function sendEmailToRequester($requester, $group)
{
    $message = generateRequesterMessageBody($requester, $group);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateRequesterMessageSubject($group); // Give the email a subject

    $receiverEmail = $requester->getEmail();

    // send the email
    mail($receiverEmail, $subject, $message, $headers);
}

function generateRequesterMessageSubject($group)
{
    $groupName = $group->getName();

    return "Your request to join group $groupName has been accepted on SquadUCSD!";
}

function getGroupProfileUrl($groupid)
{
    return "http://www.squaducsd.com/viewgroup.php?groupid=$groupid";
}

function generateRequesterMessageBody($requester, $group)
{
    $requesterfname = $requester->getFname();
    $userid = $requester->getUserid();
    $groupid = $group->getGroupid();
    $groupName = $group->getName();

    $groupProfile = getGroupProfileUrl($groupid);

    $message = "
    
Hi $requesterfname, 
	
Your request to join group $groupName has been accepted.

Here is the updated group profile page for $groupName: 
$groupProfile
    

SquadUCSD";

    return $message;
}

function sendEmailToGroup($requester, $group)
{
    $message = generateGroupMessageBody($requester, $group);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateGroupMessageSubject($requester, $group); // Give the email a subject

    $receiverEmail = generateReceivers($group, $requester->getUserid());

    // send the email
    mail($receiverEmail, $subject, $message, $headers);
}

function generateGroupMessageSubject($requester, $group)
{
    $fname = $requester->getFname();
    $lname = $requester->getLname();
    $groupName = $group->getName();

    return "$fname $lname has joined your group $groupName on SquadUCSD!";
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

function getUserProfileUrl($userid)
{
    return "http://www.squaducsd.com/viewprofile.php?userid=$userid";
}

function generateGroupMessageBody($requester, $group)
{
    $requesterfname = $requester->getFname();
    $requesterlname= $requester->getLname();
    $requesterEmail = $requester->getEmail();
    $userid = $requester->getUserid();
    $groupid = $group->getGroupid();
    $groupName = $group->getName();

    $groupProfile = getGroupProfileUrl($groupid);
    $requesterProfile = getUserProfileUrl($userid);

    $message = "
    
Dear member in $groupName, 
	
$requesterfname $requesterlname has joined your group $groupName. 

Here is the profile for $requesterfname: 
$requesterProfile	
	
Here is $requesterfname's email:
$requesterEmail

Here is the updated group profile page for $groupName: 
$groupProfile
    

SquadUCSD";

    return $message;
}



