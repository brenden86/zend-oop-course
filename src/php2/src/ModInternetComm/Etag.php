<?php
// Browser caching example, assumes authenticated user and active session

// If we have the key, and therefore an Etag, and it is less the the stored expiration time
if (isset($_SERVER['HTTP_IF_NONE_MATCH'])
    && $_SERVER['HTTP_IF_NONE_MATCH'] < $_SESSION['expires'])
{
    // Then we don't need to do anything except send a 'Not modified' header and exit
    header('Not Modified', true, 304);
    exit();
}

// No etag header, so create one for this page
$current = time(); // Current time
$oneWeek = $current - 6.048e+2; // 1 week earlier in seconds
$duration = 2.628e+6; // 1 month in seconds

$etag = $current-$oneWeek; //
$_SESSION['etag'] = $etag;
$expires = $current + $duration;
$_SESSION['expires'] = $expires;

header('Expires: '.gmdate("D, d M Y H:i:s", $expires) . " GMT");
header('Last-Modified: '.gmdate("D, d M Y H:i:s", $current) . " GMT");
header("ETag: $etag");
header("Pragma: cache");
header("Cache-Control: public, must-revalidate, max-age=0");