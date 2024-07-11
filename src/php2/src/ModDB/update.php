<?php

// Get the connection instance
$pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

// Setup a one-off SQL statement and get a statement object
$stmt = $pdo->query("UPDATE orders SET description='something special' WHERE id=1");

// Check results
echo "\nUpdate was ";
echo ($stmt->rowCount()) ? "successful!\n" : "NOT successful!\n";

// Get the record and see the update
$stmt = $pdo->query('SELECT * FROM orders where id=1');

// Get the updated row
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output the result
print_r($result);
