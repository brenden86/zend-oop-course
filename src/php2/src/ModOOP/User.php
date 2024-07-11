<?php

class User {
    const TABLE = 'user';
    public $firstname;
    public $lastname;

    public function __construct($firstname, $lastname){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getLastName(){
        return $this->lastname;
    }
}

class GuestUser extends User
{
    const TYPE = 'guest';
    public $role;

    public function getRole(){
        return $this->role;
    }
}