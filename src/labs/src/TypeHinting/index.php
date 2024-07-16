<?php
include __DIR__ . '/../../vendor/autoload.php';

use ZendOopCourse\Labs\TypeHinting\Administrator;
use ZendOopCourse\Labs\TypeHinting\BaseUser;
use ZendOopCourse\Labs\TypeHinting\UserGroup;
use ZendOopCourse\Labs\TypeHinting\SuperUser;

$user1 = new BaseUser('user1', 'password1', 'John', 'Smith');
$user2 = new BaseUser('user2', 'password2', 'Josh', 'Smith');
$user3 = new SuperUser('user3', 'password3', 'Jacob', 'Smith');

$admin = new Administrator('jsmith', 'password1', 'Joe', 'Smith');

$developerGroup = new UserGroup('developers', $admin);

$developerGroup->addMember($user1);
$developerGroup->addMember($user2);
$developerGroup->addMember($user3);

echo 'Members of group ' . $developerGroup->groupName . ':' . PHP_EOL;
print_r($developerGroup->getMembers());

$developerGroup->removeMember($user3->username);
echo 'Removed user ' . $user3->username;
echo PHP_EOL;

echo 'NEW Group members:' . PHP_EOL;
print_r($developerGroup->getMembers());
echo PHP_EOL;
