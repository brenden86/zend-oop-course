<?php
include __DIR__ . '/../../vendor/autoload.php';
use ZendOopCourse\Labs\AbstractClasses\BaseUser;
use ZendOopCourse\Labs\AbstractClasses\SuperUser;
use ZendOopCourse\Labs\AbstractClasses\Administrator;

$base = new BaseUser('brenden', 'abc123');
$super = new SuperUser('hsimpson', 'donuts123', 'Homer', 'Simpson');
$admin = new Administrator('jsmith', 'password1', 'Joe', 'Smith');

$admin->installSoftware('debug', 'var_dump');
$admin->installSoftware('to_json', 'json_encode');
$admin->installSoftware('parse_json', 'json_decode');


echo '--- Info for user \'' . $base->username . '\' ---' . PHP_EOL;
print_r($base->getUserInfo());
echo PHP_EOL;


echo '--- Info for user \'' . $super->username . '\' ---' . PHP_EOL;
print_r($super->getUserInfo());
echo PHP_EOL;


echo '--- Info for user \'' . $admin->username . '\' ---' . PHP_EOL;
print_r($admin->getUserInfo());
echo PHP_EOL;

