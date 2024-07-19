<?php
include __DIR__ . '/../../vendor/autoload.php';
include __DIR__ . '/../DbConfig.php';

// Sample Customer Model
$customer = new class('John', 'Doe') {
    public function __construct(
        public string $firstName,
        public string $lastName
    ) {}
};

try {

    $pdo = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    echo 'Connected to ' . DB_NAME . PHP_EOL;

    /******************************
     *  LAB: Prepared Statements  *
     *****************************/

    $sql = 'INSERT INTO customers (firstname, lastname) VALUES (:firstname, :lastname)';
    $result = $pdo->prepare($sql)->execute(['firstname' => $customer->firstName, 'lastname' => $customer->lastName]);

    if ($result) echo 'Customer ' . $customer->firstName . ' ' . $customer->lastName . ' was added to the database.';
    echo PHP_EOL;

    /******************************
     *   LAB: Stored Procedures   *
     *****************************/

    $customer->firstName = 'George';
    $customer->lastName = 'Washington';

    $stored_proc = '
        DROP PROCEDURE IF EXISTS phpcourse.newCustomer;
        CREATE PROCEDURE phpcourse.newCustomer (first varchar(50), last varchar(50))
        BEGIN
            INSERT INTO customers (firstname, lastname) VALUES (first, last);
        END;
    ';

    $pdo->exec($stored_proc);

    $sql = 'CALL newCustomer (?, ?)';
    $result = $pdo->prepare($sql)->execute([$customer->firstName, $customer->lastName]);

    if ($result) echo 'Customer ' . $customer->firstName . ' ' . $customer->lastName . ' was added to the database via stored procedure.';
    echo PHP_EOL;

} catch (Exception $e) {
    echo $e->getMessage();
}


    /******************************
     *      LAB: Transaction      *
     *****************************/

$customer->firstName = 'Abraham';
$customer->lastName = 'Lincoln';

try {
    $pdo->beginTransaction();
    echo '---transaction start---' . PHP_EOL;
    // create user
    $stmt = $pdo->prepare('CALL newCustomer (?, ?)')->execute([$customer->firstName, $customer->lastName]);
    echo 'Created new customer: ' . $customer->firstName . ' ' . $customer->lastName . PHP_EOL;

    $params = [
        'date' => (new DateTime())->format('Y-m-d'),
        'status' => 'open',
        'amount' => 95,
        'description' => 'Box of quill pens',
        'customer' => $pdo->lastInsertId(),
    ];

    // insert new customer's order
    $sql = 'INSERT INTO orders (' . implode(', ', array_keys($params)) . ') VALUES (' . implode(', ', array_fill(0, count($params), '?')) . ')';
    $stmt = $pdo->prepare($sql)->execute(array_values($params));
    echo 'Created new order: ' . $params['description'] . PHP_EOL;

    echo '---transaction successful---' . PHP_EOL;
    $pdo->commit();
} catch (PDOException $e) {
    $pdo->rollBack();
    echo $e->getMessage();
} catch (Exception $e) {
    echo $e->getMessage();
}


