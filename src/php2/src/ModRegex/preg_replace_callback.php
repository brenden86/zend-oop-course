<?php

function returnBasename($matches) {
    if (is_array($matches)) {
        $result = basename($matches[0]);
    } else {
        $result = NULL;
    }
    return $result;
}

// here is the error message with directory info
$test = '/var/www/CodeArchive/application/files/php/basics/array_example.php on line 4';

// Create regex
$pattern = '|(/\w+)+\w+\.php|';

// Print results w/ only the filename
echo preg_replace_callback($pattern, 'returnBasename', $test);
