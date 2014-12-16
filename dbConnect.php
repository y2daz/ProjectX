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
        $dbName = "manaDB";

        //Create Connection object
        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        return $connection;
    }

    public function getSMSConnection()
    {
        $dbHost = "localhost";
        $dbUser = "ozekiSystem";
        $dbPass = "wkbwD6PMPuGTSJx";
        $dbName = "ozekiSMS";

        //Create Connection object
        $connection = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

        return $connection;
    }
}