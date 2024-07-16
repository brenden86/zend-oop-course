<?php
namespace ZendOopCourse\Labs\Interfaces;

interface UserInterface
{
    public function getUserInfo();
    public function setPassword(string $password);
}