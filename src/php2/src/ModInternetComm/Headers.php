<?php
// Setting header examples
$current = time();

// The date/time after which the response is considered stale.
header('Expires: ' . gmdate('D, d M Y H:i:s', $current + 50000 ));

// Specifies directives that client should cash this response.
header('Pragma: cache');

// Freshness information; max-age = Maximum age in seconds object should be considered fresh.
header('Cache-Control: must-revalidate, max-age=0');
