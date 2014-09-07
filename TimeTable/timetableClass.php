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
    public $staffId = 0;

    function __construct(){
        for ($i = 0; $i < 40; $i++)
        {
            $slot[$i] = new SlotDetail();
        }
    }

    public function getTimetableFromDB(){
        $result = getTimetable($this->staffId);

        if(isFilled($result)){
            $i = 0;

            foreach($result as $row){
                $this->insertSLot($i, $row[0], $row[1], $row[4] );
                $i++;
            }
        }
    }

//    public function setTimetable( $GradeArr, $ClassArr, $SubjectArr ){
//
//        for($i = 0; $i < 40; $i++){
//            $this -> insertSLot($i, $GradeArr[$i], $ClassArr[$i], $SubjectArr[$i]);
//            echo $subjectArr[$i] . " _ " . $gradeArr[$i] . "_" .  $classArr[$i] . "<br/>";
//        }
//    }

    public function updateTimetableToDB(){ //Store object in db
        $subjectArr = null;
        $gradeArr = null;
        $classArr = null;

        for($i = 0; $i < 40; $i++){
            $subjectArr[$i] = $this->slot[$i]->Subject;
            $gradeArr[$i] = $this->slot[$i]->Grade;
            $classArr[$i] = $this->slot[$i]->Class;

//            echo $subjectArr[$i] . " _ " . $gradeArr[$i] . "_" .  $classArr[$i] . "<br/>";
        }

        return updateTimetable($this->staffId, $gradeArr, $classArr, $subjectArr);
    }

    public function insertSLot($number, $grade, $class, $subject)
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

    function __construct(){
        $this->Class="";
        $this->Grade="";
        $this->Subject="";
    }
}