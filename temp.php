<?php
///**
// * Created by PhpStorm.
// * User: yazdaan
// * Date: 07/08/14
// * Time: 21:24
// */
//
//    require_once("dbAccess.php");
//
//    function createAttendanceColumns(){
//
//        $conn = mysqli_connect('localhost', "root", "secret", 'manaDB');
//
//        for ($columnNo = 0; $columnNo < 260; $columnNo++)
//        {
//            $columnName = chr( ($columnNo/26)+(65)) . ($columnNo%26);
//            echo $columnName . "<br />";
//            mysqli_query($conn, " ALTER TABLE 'Attendance' ADD $columnName BIT;");
//
//        }
//        mysqli_close($conn);
//    }
//
//    createAttendanceColumns();
//
//?>