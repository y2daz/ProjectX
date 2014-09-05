<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 04/09/14
 * Time: 22:37
 */

    require_once("../dbConnect.php");
    require_once("../formValidation.php");


class Timetable {

    public $slot = array();
    public $staffId;

    function __construct(){
        for ($i = 0; $i < 40; $i++)
        {
            $slot[$i] = new SlotDetail();
            $a = new SlotDetail();
        }
    }

    public function getTimetable(){
//        $dbObj = new dbConnect();
//        $mysqli = $dbObj->getConnection();
//
//        if ($mysqli->connect_errno) {
//            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
//        }
//
//        if ($stmt = $mysqli->prepare("Select userPassword, accessLevel FROM User WHERE userEmail=? AND isDeleted=0 LIMIT 1;"))
//        {
//            $stmt -> bind_param("s", $email);
//
//            if ($stmt->execute())
//            {
////                $stmt->store_result();
//
//                $OUTuserPassword = NULL;
//                $OUTaccessLevel = 0;
//
//                $stmt->bind_result($OUTuserPassword, $OUTaccessLevel);
//                $stmt->fetch();
//
////                echo $password . " " . $OUTuserPassword . "\n";
////                echo password_hash($password, PASSWORD_DEFAULT);
//
////                $hash=password_hash("rasmuslerdorf", PASSWORD_DEFAULT);
//
//                if (password_verify($password, $OUTuserPassword))
//                {
//                    $_SESSION["user"]="$email";
//                    $stmt->close();
//                    $mysqli->close();
//                    return true;
//                }
//            }
//        }
//        $stmt->close();
//        $mysqli->close();
//        return false;
    }

    public function setTimetable( $array ){
        //Probably 2d array. Associative.

    }

    public function dbUpdate(){

    }

    private function insertSLot($number, $grade, $class, $subject)
    {
        $this->slot[$number]->Grade = $grade;
        $this->slot[$number]->Class = $class;
        $this->slot[$number]->Subject = $subject;
    }


}

class SlotDetail {
    public $Grade;
    public $Class;
    public $Subject;
}