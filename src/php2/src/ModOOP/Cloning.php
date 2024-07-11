<?php
// you wish to generate a 30/60/90 day aging report
// first you create three date instances:
echo "\n----------------------------\n";
echo "Before\n";
echo "----------------------------\n";
$date = new DateTime(); // today's date
for ($x = 30; $x < 100; $x += 30) {
    $day[$x] = $date;
    $day[$x]->add(new DateInterval('P' . $x . 'D'));
    echo '<br>' . $day[$x]->format('Y-m-d') . PHP_EOL;
}
// oops! the 30/60/90 days are calculated incorrectly
// this is because objects are passed by reference

// here is the same thing except it uses cloning:
echo "\n----------------------------\n";
echo "After\n";
echo "----------------------------\n";
$date = new DateTime(); // today's date
for ($x = 30; $x < 100; $x += 30) {
    $day[$x] = clone $date;
    $day[$x]->add(new DateInterval('P' . $x . 'D'));
    echo '<br>' . $day[$x]->format('Y-m-d') . PHP_EOL;
}

