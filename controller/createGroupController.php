<?php

function getRow($id1, $id2, $hash, $conn)
{
    $sql = "SELECT * FROM inviteTable WHERE id1='$id1' AND id2='$id2' AND hash='$hash'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function deleteRowInInviteTable($id1, $id2, $hash, $conn)
{
    $sql = "DELETE FROM inviteTable where id1='$id1' AND id2='$id2' AND hash='$hash'";
    mysqli_query($conn, $sql);
}

function createGroup($id1, $id2, $groupName, $className, $conn)
{
    $userString = "," . $id1 . "," . $id2;
    $sql = "INSERT INTO groupProfile (users, class, name) VALUES ('$userString', '$className', '$groupName')";
    mysqli_query($conn, $sql);

    return $conn->insert_id;
}

// Update the list of group id's for each individual
function updateUserProfiles($id1, $id2, $groupid, $conn)
{
    // update group for user 1
    updateIndividualGroupInfo($id1, $groupid, $conn);
    // update group for user 2
    updateIndividualGroupInfo($id2, $groupid, $conn);
}

function updateIndividualGroupInfo($id, $groupid, $conn)
{
    $row = getUserRow($conn, $id);
    $newGroupString = $row['groups'] . "," . $groupid;
    $sql = "UPDATE student SET groups='$newGroupString' where id='$id'";
    mysqli_query($conn, $sql);
}

function getUserRow($conn, $id)
{
    $sql = "SELECT * FROM student WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function sendConfirmationEmail($conn, $id1, $id2, $groupName, $groupid, $className)
{
    // get the rows
    $senderRow = getUserRow($conn, $id1);
    $receiverRow = getUserRow($conn, $id2);

    $message = generateSendMessage($senderRow, $receiverRow, $groupName, $groupid, $className);
    $headers = 'From: message' . "\r\n";
    $subject = generateMessageSubject($receiverRow, $groupName); // Give the email a subject

    // send the email
    mail($senderRow['email'], $subject, $message, $headers);
}

function generateMessageSubject($receiverRow, $groupName)
{
    $receiverFname = $receiverRow['fname'];
    $receiverLname = $receiverRow['lname'];

    return "$receiverFname $receiverLname has accepted your invite to form group $groupName on SquadUCSD!";
}

function generateSendMessage($senderRow, $receiverRow, $groupName, $groupid, $className)
{
    $senderFname = $senderRow['fname'];
    $receiverFname = $receiverRow['fname'];
    $receiverLname = $receiverRow['lname'];

    $message = "
Hi $senderFname,

$receiverFname $receiverLname has accepted your invitation to form the group $groupName for $className. Here is the group profile page for $groupName:
http://www.squaducsd.com/viewgroup.php?groupid=$groupid 

SquadUCSD";

    return $message;
}