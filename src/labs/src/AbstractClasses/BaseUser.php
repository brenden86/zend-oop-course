<?php
namespace ZendOopCourse\Labs\AbstractClasses;

use ZendOopCourse\Labs\AbstractClasses\AbstractUser;
use Exception;

class BaseUser extends AbstractUser
{

    public function getUserInfo(): array
    {
        return [
            'name' => $this->getFullName(),
            'username' => $this->username,
            'created_on' => $this->createDate->format('M j, Y'),
            'user_type' => $this->getUserClassification()
        ];
    }

}