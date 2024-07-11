<?php

class User {
    const TABLE = 'user';
    public $firstname;
    public $lastname;

    public function setFirstName($arg){
        $this->firstname = $arg;
    }

    public function __destruct(){
        echo 'done User';
    }
}

class GuestUser
{
    const TYPE = 'guest';

    public function setFirstName($fname, $mi = null){
        $this->firstname = ($mi) ? $fname . ' ' . $mi : $fname;
    }

    public function __destruct(){
        echo 'done guest user';
    }
}

$user = new User;
$guest = new GuestUser;