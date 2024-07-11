<?php

// Get the connection instance
$pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

// Setup a one-off SQL statement and get a statement object
$time = time();
$stmt = $pdo->query("INSERT INTO orders (order_date,order_status,amount,description,customer_id) VALUES ('$time','active','200','cool backpack','4')");

// Execute the SQL statement
$stmt->execute();

// Get the records and see the update
$stmt = $pdo->query('SELECT * FROM orders');

// Get the rows including the new insert
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Output the result
print_r($result);
