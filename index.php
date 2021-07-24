<?php

// FRONT CONTROLLER

// 1. Base Settings
session_start();
define('ROOT', dirname(__FILE__));
require(ROOT . '/config/config.php');
if (DEBUG) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}

// 2. Const. ROOT

require_once(ROOT . '/components/Autoload.php');
require(ROOT . '/config/basics.php');

// 3. DB Connection

//Db::getConnection();

// 4. Router run

$router = new Router();
$router->run();