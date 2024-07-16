<?php
include __DIR__ . '/../../vendor/autoload.php';

use ZendOopCourse\Labs\Interfaces\Administrator;

$admin = new Administrator('jsmith', 'password1', 'Joe', 'Smith');

$admin->installSoftware('debug', 'var_dump');
$admin->installSoftware('to_json', 'json_encode');
$admin->installSoftware('parse_json', 'json_decode');


echo '--- Info for user \'' . $admin->username . '\' ---' . PHP_EOL;
print_r($admin->getUserInfo());
echo PHP_EOL;

$admin->setPassword('myn3wp@ssw0rd');
echo 'Password for user \'' . $admin->username . '\' has been changed.' . PHP_EOL;