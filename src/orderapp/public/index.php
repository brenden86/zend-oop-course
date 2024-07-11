<?php
/**
 * Application Entry
 */

define('BASE', realpath(__DIR__ . '/../'));

//require '../vendor/autoload.php';
spl_autoload_register(
    function ($class) {
        $file = str_replace('\\', '/', $class) . '.php';
        require BASE . '/src/' . $file;
    }
);

// "use" the front controller and services
use OrderApp\Controller\IndexController;
use OrderApp\Core\Service\Services;

//Get a new index controller and startup
$controller = new IndexController(Services::getInstance());
$controller->index();