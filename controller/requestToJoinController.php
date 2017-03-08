<?php
// add a request to the invite table
function addRequestToDB($conn, $userid, $groupid, $hash)
{
    $sql = "INSERT INTO inviteTable (id1, groupid, hash) VALUES ('$userid', '$groupid', '$hash')";
    mysqli_query($conn, $sql);
}

function generateRequestSubject($fname, $lname)
{
    return "$fname $lname requested to join your group on SquadUCSD!";
}

function getRequesterProfileUrl($requesterId)
{
    return "http://www.squaducsd.com/viewprofile.php?userid=$requesterId";
}

function generateRequestUrl($requesterId, $groupId, $hash)
{
    return "http://www.squaducsd.com/request.php?id=$requesterId&groupid=$groupId&hash=$hash";

}

function generateRequestToJoinMessage($user, $group, $userMessage, $hash)
{
    $requestFname = $user->getFname();
    $requestLname = $user->getLname();
    $requesterId = $user->getUserid();
    $requesterEmail = $user->getEmail();
    $groupId = $group->getGroupid();
    $groupName = $group->getName();

    $requesterProfile = getRequesterProfileUrl($requesterId);
    $requestUrl = generateRequestUrl($requesterId, $groupId, $hash);

    $message = "
Hi members in $groupName, 
	
$requestFname $requestLname requested to join your group $groupName. Here is the included message from $requestFname: 
	
------------------------
$userMessage
------------------------
    
Here is the profile page for $requestFname: 
$requesterProfile
    
Here is $requestFname's email:
$requesterEmail

If you would like to join $requestFname, please click on the link below: 
$requestUrl


SquadUCSD";

    return $message;
}

function generateReceivers($group)
{
    $ret = "";

    // append all the emails, separated by commas
    foreach ($group->getUsers() as $user) {
        $ret = $ret . $user->getEmail() . ",";
    }

    // remove the last comma
    $ret = substr($ret, 0, strlen($ret) - 1);

    return $ret;
}

// send the email to all the users in the group
function sendRequestEmail($conn, $user, $group, $message, $hash)
{
    $message = generateRequestToJoinMessage($user, $group, $message, $hash);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateRequestSubject($user->getFname(), $user->getLname()); // Give the email a subject

    $receivers = generateReceivers($group);

    // send the email
    mail($receivers, $subject, $message, $headers);
}