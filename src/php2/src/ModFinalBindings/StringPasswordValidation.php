<?php
$password = "Fyfjk34sdfjfsjq7";
$pattern = "/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/";
echo preg_match($pattern, $password) ? 'Strong' : 'Weak';