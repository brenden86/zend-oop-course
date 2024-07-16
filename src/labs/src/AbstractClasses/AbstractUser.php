<?php

namespace ZendOopCourse\Labs\AbstractClasses;

use DateTime;

abstract class AbstractUser
{

    const PW_MIN_LENGTH = 6;

    public readonly DateTime $createDate;
    public string $username;
    protected string $password;
    public string $firstName;
    public string $lastName;
    protected array $software = [];

    public function __construct(
        string $username,
        string $password,
        string $firstName = '',
        string $lastName = ''
    ) {
        $this->createDate = new DateTime();
        $this->username = $username;
        $this->setPassword($password);
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    public function setPassword(string $password)
    {
        if(strlen($password) < self::PW_MIN_LENGTH) {
            echo 'Password must be at least ' . self::PW_MIN_LENGTH . ' characters long';
        } else {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    public function setFirstName(string $newFirstName)
    {
        $this->firstName = $newFirstName;
    }

    public function setLastName(string $newLastName)
    {
        $this->lastName = $newLastName;
    }

    public function getUserClassification() {
        $fqClass = explode('\\', get_class($this));
        return $fqClass[count($fqClass) - 1];
    }

    abstract public function getUserInfo(): array;

}
