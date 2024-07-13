<?php

namespace ZendOopCourse\Labs\Inheritance;

use ZendOopCourse\Labs\Inheritance\SuperUser;

class Administrator extends SuperUser
{
    public function setUsername($newUsername)
    {
        $this->username = $newUsername;
    }

    public function setUsernameForUser(&$user, string $newUsername)
    {
        $user->username = $newUsername;
    }

    public function setPasswordForUser(&$user, string $newPassword)
    {
        $user->password = $newPassword;
    }
}