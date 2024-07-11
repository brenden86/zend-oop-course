<?php
// confirms that a new password is secure
$password[] = 'bad';
$password[] = 'Eenu5kajbeeS4yoo';

$pattern = '/.+(?=.{8,})(?=.+[0-9])(?=.+[a-z])(?=.+[A-Z]).+/';
foreach ($password as $item) {
    echo $item . ':';
    echo (preg_match($pattern, $item)) ? 'STRONG' : 'WEAK';
    echo PHP_EOL;
}
