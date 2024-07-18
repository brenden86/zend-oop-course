<?php

namespace ZendOopCourse\Labs\Exceptions;

use Exception;
use DateTime;

class UserException extends Exception
{

    public string $username;
    public UserExceptionTypes $type;

    public function __construct(
        string $username,
        string $message = '',
        UserExceptionTypes $type = UserExceptionTypes::GENERAL
    ) {
        $this->username = $username;
        $this->message = $message;
        $this->type = $type;
        parent::__construct($message);
    }

    public function generateLogEntry(): string
    {
        return implode(
            ' | ',
            [
                (new DateTime())->format('Y-m-d H:i:s'),
                $this->username,
                'Type: ' . $this->type->name,
                $this->message,
                $this->file . ':' . $this->line
            ]
        ) . PHP_EOL;
    }

}

