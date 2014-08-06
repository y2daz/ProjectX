<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 12:47
 */

class dbConnect {

    public function getConnection()
    {
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPass = "secret";
        $dbName = "";

        //Create Connection object
        $connection = new \mysqli($dbHost, $dbUser, $dbPass, $dbName);

        return $connection;
    }
} 