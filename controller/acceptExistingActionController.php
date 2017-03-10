<?php
include_once "viewProfileController.php";

// delete that row from the inviteTable
function deleteRowInInviteTable($id1, $id2, $groupid, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND groupid='$groupid' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

// update the group row in the groupProfile table
function updateGroupProfile($id2, $groupid, $MAX_GROUP_SIZE, $conn)
{
    // check to see if the group exists first
    $sql = "SELECT * FROM groupProfile WHERE id='$groupid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0)
        return false;

    $row = mysqli_fetch_assoc($result);
    if ($row['size'] >= $MAX_GROUP_SIZE)
        return false;

    if ($row['size'] == $row['maxSize'])
        $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id2'), size=size+1, maxSize=maxSize+1 WHERE id='$groupid';";
    else
        $sql = "UPDATE groupProfile SET users=CONCAT(users, ',$id2'), size=size+1 WHERE id='$groupid';";

    mysqli_query($conn, $sql);
    return true;
}

// update the "group" field for both individuals in the students table
function updateUserProfiles($id2, $groupid, $conn)
{
    $sql = "UPDATE student SET groups=CONCAT(groups, ',$groupid') where id='$id2'";
    mysqli_query($conn, $sql);
}

// send the email request to the receiver
function sendEmail($id2, $groupid)
{
    $receiver = getUserObject($id2);
    $group = getGroupObject($groupid);

    $message = generateMessageBody($receiver, $group);
    $headers = 'From: message' . "\r\n"; // Set from headers (perhaps change this in the future?)
    $subject = generateMessageSubject($receiver, $group); // Give the email a subject

    $receiverEmail = generateReceivers($group, $receiver->getUserid());

    // send the email
    mail($receiverEmail, $subject, $message, $headers);
}

function generateMessageSubject($receiver, $group)
{
    $fname = $receiver->getFname();
    $lname = $receiver->getLname();
    $groupName = $group->getName();

    return "$fname $lname has accepted to join your group $groupName on SquadUCSD!";
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

function getUserProfileUrl($userid)
{
    return "http://www.squaducsd.com/viewprofile.php?userid=$userid";
}

function generateMessageBody($user, $group)
{
    $receiverfname = $user->getFname();
    $receiverlname = $user->getLname();
    $receiverEmail = $user->getEmail();
    $userid = $user->getUserid();
    $groupid = $group->getGroupid();
    $groupName = $group->getName();

    $groupProfile = getGroupProfileUrl($groupid);
    $receiverProfile = getUserProfileUrl($userid);

    $message = "
    
Dear member in $groupName, 
	
$receiverfname $receiverlname has accepted to join your group $groupName. 

Here is the profile for $receiverfname: 
$receiverProfile	
	
Here is $receiverfname's email:
$receiverEmail

Here is the updated group profile page for $groupName: 
$groupProfile
    

SquadUCSD";

    return $message;
}

