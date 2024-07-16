<?php
namespace ZendOopCourse\Labs\TypeHinting;

interface UserInterface
{
    public function getUserInfo();
    public function setPassword(string $password);
    public function getUserClassification(): string;
}