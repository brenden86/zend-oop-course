<?php
require 'User.php';
class GuestUser extends User
{
    const TYPE = 'guest';
    public $role;

    public function getRole(){
        return $this->role;
    }

    public function setRole($role){
        $this->role = $role;
    }
    parent::
}