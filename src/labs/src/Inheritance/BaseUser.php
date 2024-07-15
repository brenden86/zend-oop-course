<?php

namespace ZendOopCourse\Labs\Inheritance;

use DateTime;
use Exception;

class BaseUser
{

    const PW_MIN_LENGTH = 6;

    protected readonly DateTime $createDate;
    protected string $password;

    public function __construct(
        public string $username,
        string $password,
        public string $firstName = '',
        public string $lastName = ''
    ) {
        $this->createDate = new DateTime();
        $this->setPassword($password);
    }


    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

//     DEBUGGING ONLY
//    public function getPassword() {
//        return password_verify($this->password, PASSWORD_DEFAULT);
//    }
    public function setPassword(string $password)
    {
        if(strlen($password) < self::PW_MIN_LENGTH) {
            throw new Exception('Password must be at least ' . self::PW_MIN_LENGTH . ' characters long');
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

	public function whatever(iterable $arr)
	{
		return implode(':', $arr);
	}

}
