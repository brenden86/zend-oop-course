<?php

namespace ZendOopCourse\Labs\Exceptions;

enum UserRole
{
    case BASE_USER;
    case SUPER_USER;
    case ADMIN;
}