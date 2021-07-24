<?php

require_once ROOT . "/lib/rb-mysql.php";

class Db
{
    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        R::setup(
            "mysql:host={$params['host']};dbname={$params['dbname']}",
            "{$params['user']}",
            "{$params['password']}"
        );
        if (DEBUG) {
            if (!R::testConnection()) {
                exit('Connection error');
            }
            R::debug(true, 3);
            R::startLogging();
        }
    }
}