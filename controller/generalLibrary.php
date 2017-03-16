<?php

// absolute max possible size for all groups
// modifiable
$MAX_GROUP_SIZE = 15;

$MIN_PWD_SIZE = 6;

$MAX_PWD_SIZE = 12;

$MAX_EMAIL_SIZE = 50;

$MAX_MESSAGE_SIZE = 500;

$MAX_NAME_SIZE = 40;

$MAX_CLASS_NAME = 40;

$MAX_GROUP_NAME = 40;

$MAX_MAJOR_NAME = 40;

$MAX_PHONE_SIZE = 15;

$MAX_ABOUT_SIZE = 1000;

$MAX_QUERY_SIZE = 100;

// this function clears all the flags in an url, after and including &
function clearFlags($url)
{
    $pos = strpos($url, "&");

    // no flag in found
    if($pos === false)
        return $url;

    return substr($url, 0, $pos);

}