<?php

function clearInvalidFlags($url)
{
    $pos = strpos($url, "&nonmatchingpwd");

    // if flag is found
    if ($pos !== false) {
        // clear invalid flag
        return substr($url, 0, $pos);
    }

    $pos = strpos($url, "&invalidpwd");

    if ($pos !== false) {
        // clear invalid flag
        return substr($url, 0, $pos);
    }

    // no flag found
    return $url;
}