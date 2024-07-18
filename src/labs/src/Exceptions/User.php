<?php

namespace ZendOopCourse\Labs\Exceptions;

use Exception;

class User
{
    const PW_MIN_LENGTH = 8;

    public string $username;
    protected string $password;
    public UserRole $role;

    public function __construct(
        string $username,
        string $password,
        UserRole $role = UserRole::BASE_USER
    ) {
        $this->setUsername($username);
        $this->setPassword($password);
        $this->role = $role;
    }

    public function setUsername(string $username)
    {
        if (empty($username)) {
            throw new Exception('Username cannot be empty');
        }
        if (isset(Database::$users[$username])) {
            throw new UserException($username, "User {$username} already exists.", UserExceptionTypes::CREATE);
        } else {
            $this->username = $username;
        }
    }

    public function setPassword(string $password)
    {
        if (strlen($password) < static::PW_MIN_LENGTH) {
            throw new UserException($this->username ?? '', 'Password must be at least ' . static::PW_MIN_LENGTH . ' characters.', UserExceptionTypes::CREATE);
        } else {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }

    public function login(string $password)
    {
        if (password_verify($password, $this->password)) {
            echo 'User ' . $this->username . ' logged in.' . PHP_EOL;
        } else {
            throw new UserException($this->username, 'Invalid password.', UserExceptionTypes::LOGIN);
        }
    }

    public static function deleteUser(User &$user)
    {
        if ($user->role === UserRole::ADMIN) {
            throw new UserException($user->username, "Administrators cannot be deleted this way.", UserExceptionTypes::DELETE);
        } else {
            unset($user);
        }
    }
}