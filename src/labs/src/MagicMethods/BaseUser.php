<?php

namespace ZendOopCourse\Labs\MagicMethods;

use DateTime;

class BaseUser
{

    const PW_MIN_LENGTH = 6;
    const DT_FORMAT = 'Y-m-d H:i:s';
    const OP_NOT_PERMITTED_MSG  = 'You are not permitted to execute this operation, please contact your administrator.';

    protected readonly DateTime $createDate;
    protected string $password;

    public function __construct(
        protected string $username,
        string $password,
        public string $firstName = '',
        public string $lastName = ''
    ) {
        $this->createDate = new DateTime();
        $this->setPassword($password);
    }

    public function __destruct()
    {
        $timestamp = (new DateTime())->format(self::DT_FORMAT);
        $log_message = 'User ' . $this->username . ' was created or modified.';
        $log = $timestamp . ' ' . $log_message . PHP_EOL;
        file_put_contents('user_activity.log', $log, FILE_APPEND);
    }

    public function __toString()
    {
        $name_str = '';
        if (!empty($this->getFullName())) {
            $name_str = '(' . $this->getFullName() . ')';
        }
        return trim($this->getUsername() . ' ' . $name_str);
    }

    public function __call($name, $arguments)
    {
        if (method_exists(Administrator::class, $name)) {
            echo self::OP_NOT_PERMITTED_MSG;
        }
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getUsername()
    {
        return $this->username;
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


}
