<?php

namespace ZendOopCourse\Labs\Inheritance;

use ZendOopCourse\Labs\Inheritance\SuperUser;

class Administrator extends SuperUser
{
    public function setUsernameForUser(&$user, string $newUsername)
    {
        $user->username = $newUsername;
    }

    public function changePasswordForUser(&$user, string $newPassword)
    {
        $user->password = $newPassword;
    }
}