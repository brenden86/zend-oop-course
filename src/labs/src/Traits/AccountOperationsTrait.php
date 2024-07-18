<?php

namespace ZendOopCourse\Labs\Traits;

trait AccountOperationsTrait
{
    public function getCreateDate($userAccount)
    {
        return $userAccount->created->format('Y-m-d');
    }

    public function changePassword(Account &$userAccount, string $password)
    {
        $userAccount->password = $password;
    }
}