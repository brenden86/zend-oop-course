<?php

class Utility {
    public static $currency = '$';

    public static function formatCurrency($arg){
        return self::$currency . $arg;
    }

    public static function setCurrency($arg){
        self::$currency = $arg;
    }
}

$default = Utility::$currency;
$default = Utility::formatCurrency();