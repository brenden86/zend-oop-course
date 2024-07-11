<?php
$headerTime = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ? strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) : time();
$expTime = '<some expiration timestamp>';

if ($headerTime > $expTime) {
    header('304 Not Modified', true, 304);
    exit;
}

// Set last modified header
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', time()));
