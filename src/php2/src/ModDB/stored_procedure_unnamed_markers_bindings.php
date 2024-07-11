<?php
// Execute the storedProc.sql at the mysql> command line first, then run the below.

// Get the connection instance
$pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

// Set error mode attribute
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Prepare an SQL statement and get a statement object
$stmt = $pdo->prepare('CALL newCustomer(?,?)');

// Hard coded input parameters
$fname = 'Mark';
$lname = 'Watney';

// Execute the SQL statement
if($stmt->execute([$fname, $lname])){
    echo "New user $fname $lname added";
}