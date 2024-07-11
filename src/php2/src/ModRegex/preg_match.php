<?php


$pattern = '/<h1>(.+)<\/h1>/';
$replace = '<h4>\1</h4>';
$subject = 'Okay, we have a <h1>couple of tables</h1> in our string, one is TableUsers.php, and another is TableRoles.php';

$foo = preg_replace($pattern, $replace, $subject);
echo $foo;

// ^ inside [] means "not"
echo (preg_match("/[^A-Z0-9- ]/i", "DS-11")) ? "TRUE\n" : "FALSE\n";
echo (preg_match_all("/[^A-Z0-9-]/i", "DS-11-<hahaha></hahaha>", $match))   ? "TRUE\n" : "FALSE\n";