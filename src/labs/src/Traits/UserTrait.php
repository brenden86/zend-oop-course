<?php

namespace ZendOopCourse\Labs\Traits;

use DateTime;

trait UserTrait
{
    public function changePassword(string $password)
    {
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }
}