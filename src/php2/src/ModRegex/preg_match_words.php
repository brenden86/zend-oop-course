<?php
$test = 'To this,ha ha,I say tally ho. Ta ta. Ha hah';
// does not work: 
// $words = explode(' ', $test);

preg_match_all('/\b ha\b/', $test, $words);
var_dump($words);



