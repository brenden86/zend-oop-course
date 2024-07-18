<?php

namespace ZendOopCourse\Labs\Exceptions;

enum UserExceptionTypes {
    case GENERAL;
    case CREATE;
    case DELETE;
    case LOGIN;

    public static function isCritical(UserExceptionTypes $type): bool
    {
        return (
            $type === static::DELETE ||
            $type === static::LOGIN
        );
    }
}