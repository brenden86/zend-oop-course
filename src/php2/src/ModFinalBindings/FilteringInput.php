<?php
// Simulate a POST request
$_POST = [
    'firstname'  => '<script></script>Mark',
    'lastname'   => 'Watney   ',
    'occupation' => '  martian  ',
    'education'  => '<bogus>Zend PHP II</bogus>'
];

// Define Filters
$trim = function ($input) { return trim($input); };
$tags = function ($input) { return strip_tags($input); };

// assign filters
$filters = [
    'firstname'  => [$trim, $tags],
    'lastname'   => [$trim, $tags],
    'occupation' => [$trim, $tags],
    'education'  => [$trim, $tags]
];
    
// insert validation code here
$valid = TRUE;
if ($valid) {
    // Input is valid: now perform filtering
    $goodtogo = [];
    foreach ($filters as $field => $run) {
        $item = $_POST[$field];
        foreach ($run as $callback)    
            $item = $callback($item);
        $goodtogo[$field] = $item;
    }
    print_r($goodtogo);
} else {
    echo 'Input invalid';
}
