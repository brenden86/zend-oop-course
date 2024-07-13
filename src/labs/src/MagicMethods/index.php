<?php
include __DIR__ . '/../../vendor/autoload.php';

use ZendOopCourse\Labs\MagicMethods\SuperUser;

// __construct();
$me = new SuperUser('brendenk', 'abc123', 'Brenden', 'Koenigsman');
// __toString()
echo 'New SuperUser: ' . $me;
echo PHP_EOL;

// __call(): trying to access admin method from a parent class
$me->setUsername('b_koenigsman');

// __destruct(): used for logging new or modified users in user_activity.log