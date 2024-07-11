<?php
// The subject string
$subject = 'this is a test string containing some text';

// The pattern string with delimiters
$pattern = '/te[sx]t/';

// Check for a match
echo preg_match($pattern, $subject) ? 'Found a match' : 'Not found';