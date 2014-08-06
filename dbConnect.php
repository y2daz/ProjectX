<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
 * Date: 06/08/14
 * Time: 12:47
 */

class dbConnect {

    public function getConnection()
    {
        $dbHost = "localhost";
        $dbUser = "manaSystem";
        $dbPass = "SMevHZxMEJVfv4Kc";
        $dbName = "";

        //Create Connection object
        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        return $connection;
    }
} 