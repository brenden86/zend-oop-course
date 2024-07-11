<?php

// Get the connection instance
$pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

// Setup a one-off SQL statement and get a statement object
$id = 10;
$stmt = $pdo->query("DELETE FROM orders WHERE id=$id");

// Execute the SQL statement
$stmt->execute();

// Get the records and see the deletion
$stmt = $pdo->query('SELECT * FROM orders');

// Get the rows including the new insert
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the result
print_r($result);
