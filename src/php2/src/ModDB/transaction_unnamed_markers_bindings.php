<?php
// Transaction

try{
    // Get the connection instance
    $pdo = new PDO('mysql:unix_socket=/var/run/mysqld/mysqld.sock;dbname=phpcourse', 'vagrant', 'vagrant');

    // Set error mode attribute
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Begin the transaction
    $pdo->beginTransaction();

    // Series of SQL statements, all of which have to succeed

    // Commit
    $pdo->commit();
}catch(PDOException $e){
    $pdo->rollBack(); // Failure, rollback
    // log and communicate error
}