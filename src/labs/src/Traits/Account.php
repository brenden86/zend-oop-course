<?php

namespace ZendOopCourse\Labs\Traits;

use DateTime;

class Account
{
    protected DateTime $created;

    public function __construct(
        public string $username = '',
        protected string $password = ''
    ) {
        $this->created = new DateTime();
    }

    use AccountOperationsTrait, UserTrait {
        UserTrait::changePassword insteadof AccountOperationsTrait;
        UserTrait::getPassword as public;
        AccountOperationsTrait::changePassword as changeAccountPassword;
    }

}