<?php
/**
 * UserModel.php
 */
class UserModel extends AbstractModel {
    protected $user;
    public function __construct(DomainServices $services, $user) {
        $this->services = $services;
        $this->pdo = $services->getDomainDb()->pdo;
        $this->user = $user;
    }
}