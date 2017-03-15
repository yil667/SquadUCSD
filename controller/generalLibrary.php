<?php

// absolute max possible size for all groups
// modifiable
$MAX_GROUP_SIZE = 15;

$MAX_PWD_SIZE = 15;

// front end checks for 200 characters max, but some unicode takes 3 bytes per character
// e.g., korean characters
$MAX_MESSAGE_SIZE = 205 * 3;

$MAX_CLASS_NAME = 45 * 3;

$MAX_GROUP_NAME = 45 * 3;

$MAX_ABOUT_SIZE = 1005 * 3;


// this function clears all the flags in an url, after and including &
function clearFlags($url)
{
    $pos = strpos($url, "&");

    // no flag in found
    if($pos === false)
        return $url;

    return substr($url, 0, $pos);

}