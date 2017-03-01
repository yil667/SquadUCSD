<?php
function handleForgotPasswordEmail($conn, $email)
{
    $sql = "SELECT * FROM student WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result))
    {
        $fname = $row['fname'];
        $hash = md5(rand(0, 1000)); // generate a random hash
        $email = $row['email'];
        $sql = "UPDATE student SET hash1='$hash' WHERE email='$email'";
        mysqli_query($conn, $sql);

        sendForgotPasswordEmail($fname, $email, $hash);
        return true;
    }
    else
    {
        // the user does not exist in the database
        return false;
    }
}

function sendForgotPasswordEmail($fname, $email, $hash)
{
    $subject = "SquadUCSD | Forgot Password";
    $message = generateForgotPasswordEmail($fname, $email, $hash);
    $headers = "From: account" . "\r\n"; // Set from headers
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    mail($email, $subject, $message, $headers);
}

function generateForgotPasswordUrl($email, $hash)
{
    return "http://www.squaducsd.com/pages/resetpassword.php?email=$email&hash=$hash";
}

function generateForgotPasswordEmail($fname, $email, $hash)
{
    $url = generateForgotPasswordUrl($email, $hash);
    $message = "<html><body><p>
Hi $fname,

We received a request to reset your SquadUCSD password.

" .

"<a href= '$url'> Please click here to reset your password </a>"
.
"

SquadUCSD</p></body></html>";

    return $message;
}

