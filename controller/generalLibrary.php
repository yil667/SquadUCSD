<?php

// this function clears all the flags in an url, after and including the question mark (?)
function clearFlags($url)
{
    $pos = strpos($url, "?");

    // no flag in found
    if($pos === false)
        return $url;

    return substr($url, 0, $pos + 1);

}