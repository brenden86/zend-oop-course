<?php

abstract class Form
{
    public $action;
    public $name;
    public $method;

    public function getStartTag(){
        return '<form>';
    }

    public function getEndTag(){
        return '</form>';
    }
}
