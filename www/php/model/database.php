<?php

/**
 * @project : Journée Sportive du CFPT - Database Connection
 * @author : Alexandre PINTRAND
 * @version 1.0, 01/09/2021, Initial revision
**/

require_once 'config.php';

function db() {
    static $myDb = null;
    if ($myDb === null) {
        $myDb = new PDO("mysql:host=". DB_HOST .";dbname=". DB_NAME .";charset=utf8", DB_USER, DB_PASSWORD);
        $myDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $myDb->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    return $myDb;
}
