<?php
include __DIR__ . '/../../vendor/autoload.php';
use ZendOopCourse\Labs\Inheritance\BaseUser;
use ZendOopCourse\Labs\Inheritance\SuperUser;
use ZendOopCourse\Labs\Inheritance\Administrator;


$base = new BaseUser('homer123', 'd0nuts', 'Homer', 'Simpson');
$super = new SuperUser('ssuper', 'abc123', 'Sammy', 'Super');
$admin = new Administrator('brendenk', 'i<3php', 'Brenden', 'Koenigsman');

echo 'Base user full name: ' . $base->getFullName();
echo PHP_EOL;

$base->setFirstName('Marge');

echo 'Base user NEW name: ' . $base->getFullName();
echo PHP_EOL;

$super->installSoftware('strtolower', 'strtolower');
$super->installSoftware('get_date', function () { return date('Y-m-d'); } );
$super->installSoftware('verify_password', new class () {
	public function __invoke(string $password, string $hash)
	{
		return password_verify($password, $hash);
	}
});

echo PHP_EOL;
echo 'Super user installed software: ';
echo PHP_EOL;

echo $super->runSoftware('strtolower', 'TEST');
echo PHP_EOL;

echo PHP_EOL;

echo 'Admins can change users\' usernames';
echo PHP_EOL;
echo 'Super user current username: ' . $super->getUsername();
echo PHP_EOL;

$admin->setUsernameForUser($super, 'newsuper');
echo 'Admin changed Super Users\' username to: ' . $super->getUsername();
echo PHP_EOL;

echo $admin->username;
echo PHP_EOL;


echo new ReflectionObject($admin);
