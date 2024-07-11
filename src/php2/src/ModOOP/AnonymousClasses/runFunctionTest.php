<?php

function findById(PDO $pdo, $id)
{
    $pdo->prepare('SELECT name FROM customers WHERE id = ?');
    $stmt = $pdo->execute([$id]);
    return $stmt->fetch();
}

// A fake PDO class for testing
$fakePDO = new class() extends PDO {
    public function __construct() {}
    public function prepare($stmt, $options = NULL) {}
    public function execute($id)
    {
        return new class () extends PDOStatement {
            public function fetch($a = NULL, $b = NULL, $c = NULL)
            {
                return ['name' => 'Fred Flintstone'];
            }
        };
    }
};

var_dump(findById($fakePDO, 1));
