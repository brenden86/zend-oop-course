<?php
// Simulate a POST request
$_POST = ['firstname'  => 'Mark',
          // try switching these 2 assignments an re-run
          'lastname'   => 'Watney',
          'occupation' => 'martian',
          //'lastname'   => '<bad>Watney</bad>',
          //'occupation' => 'earthling',
          'education'  => 'Zend PHP II'];

// Build white lists
$occ = ['martian', 'developer'];
$ed  = ['Zend PHP I', 'Zend PHP II', 'Zend PHP III'];

// Validators
$alpha = function ($input) { return ctype_alpha($input); };
$list  = function ($input, $array) { return in_array($input, $array); };
$run   = ['firstname' => ['validator' => $alpha], 
          'lastname' => ['validator' => $alpha],
          'occupation' => ['validator' => $list, 'data' => $occ], 
          'education' => ['validator' => $list, 'data' => $ed]];

$expected = count($_POST);  // total fields
$valid    = 0;
foreach ($run as $field => $callback) {
    if (isset($callback['data'])) {
        $valid += $callback['validator']($_POST[$field], $callback['data']);
    } else {
        $valid += $callback['validator']($_POST[$field]);
    }
}

if($valid == $expected) {

    // Input good, use it
    echo 'Good to go!' . PHP_EOL;
    $goodtogo = [$_POST['firstname'],
                 $_POST['lastname'],
                 $_POST['occupation'],
                 $_POST['education']];
    foreach ($goodtogo as $item) echo htmlspecialchars($item) . PHP_EOL;
} else {
    echo 'Input invalid';
}
