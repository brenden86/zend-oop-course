<?php
include __DIR__ . '/../../vendor/autoload.php';

use ZendOopCourse\Labs\Traits\Account;

$admin = new Account('brenden', 'myPassword');
$guest = new Account('guest', 'anotherPassword');

$admin->changeAccountPassword($guest, 'newPassword');
echo $guest->getPassword();

