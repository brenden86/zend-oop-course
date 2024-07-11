<?php
/*Checks for the number at the beginning and also checks for multiple periods
 in the user name and domain name in the email address.*/

$email = 'firstname.lastname@xyz.com';
$pattern = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,}$/";
echo preg_match($pattern, $email) ? 'Valid' : 'Invalid';