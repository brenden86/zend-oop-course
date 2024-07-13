<?php

namespace ZendOopCourse\Labs\MagicMethods;

use ZendOopCourse\Labs\MagicMethods\SuperUser;

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