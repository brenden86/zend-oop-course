<?php
/**
 * AbstractModel.php
 */
class AbstractModel implements ModelInterface {
    protected $services, $pdo;
    public $tableName = 'generic';
    public function __construct(Services $services) {
        $this->services = $services;
        $this->pdo = $this->services->getDb()->pdo;
    }
}