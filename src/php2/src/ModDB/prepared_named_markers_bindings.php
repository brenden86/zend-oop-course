<?php

// Get the connection instance
$pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

// Prepare an SQL statement and get a statement object
$stmt = $pdo->prepare('INSERT INTO customers (firstname,lastname) VALUES (?,?)');

// Hard coded input parameters
$fname = 'Mark';
$lname = 'Watney';

// Execute the SQL statement passing a parameter array
$stmt->execute([$fname, $lname]);

// Get the records and see the update
$stmt = $pdo->query('SELECT * FROM customers');

// Get the rows including the new insert
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the result
print_r($result);
