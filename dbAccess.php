<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 8/5/14
 * Time: 12:00 PM
 */
    require_once("dbConnect.php");

    $dbObj = new dbConnect();

//    $mysqli = $dbObj->getConnection();

//    if ($mysqli->connect_errno) {
//        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
//    }
//
//    $result = $mysqli->query("SELECT 'The SQL Works, people.' AS _msg");
//    $row = $result->fetch_assoc();
//
//    echo $row['_msg'];
//
//    $mysqli->close();

    function login($username, $password)
    {
        $dbObj = new dbConnect();

        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
                die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        $query = "Select * FROM User ";
        $query .= "WHERE userEmail='$username' ";
        $query .= "AND userPassword='$password' ";

        echo $query;


//        $result = $mysqli->query("SELECT 'The SQL Works, people.' AS _msg");
//        $row = $result->fetch_assoc();

//        echo $row['_msg'];

        $mysqli->close();

    }



?>
