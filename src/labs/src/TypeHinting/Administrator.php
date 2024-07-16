<?php
namespace ZendOopCourse\Labs\TypeHinting;

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

    public function installSoftwareForUser(&$user, string $pkgName, callable $callback) {
        $user->installSoftware($pkgName, $callback);
    }
}