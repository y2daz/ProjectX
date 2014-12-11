<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 04/09/14
 * Time: 22:37
 */

    require_once("../dbConnect.php");
    require_once("../formValidation.php");


class Timetable {

    public $slot = array();
    public $staffId = 0;
    public $class = 0;
    public $grade = "";

    function __construct(){
        for ($i = 0; $i < 40; $i++)
        {
            $slot[$i] = new SlotDetail();
        }
    }

    public function getTimetableFromDB(){
        $result = getTimetable( $this->staffId, true);

        if(isFilled($result)){
            $i = 0;

            foreach($result as $row){
                $this->insertSLot($i, $row[0], $row[1], $row[4] );
                $i++;
            }
        }
    }
    public function getTimetableClassFromDB(){
        $result = getTimetablebyClass($this->class,$this->grade);

        if(isFilled($result)){
            $i = 0;

            foreach($result as $row){
                $number= ($row[3] + (8 * ($row[2] - 1) )) + 8;
//                echo "<br /> $number";
                if (isFilled($this->slot[$number]->Subject)){
                    $this->insertSLot($number, $row[0], $row[1], $this->slot[$number]->Subject . " / $row[4]");
                    $this->insertSLot($number, $row[0], $row[1], "Multiple Subjects");
                }else{
                    $this->insertSLot($number, $row[0], $row[1], $row[4] );
                }
                $i++;
            }
        }
    }

//            $this -> insertSLot($i, $GradeArr[$i], $ClassArr[$i], $SubjectArr[$i]);
//    public function setTimetable( $GradeArr, $ClassArr, $SubjectArr ){
//
//        for($i = 0; $i < 40; $i++){
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

        return updateTimetable($this->staffId, $gradeArr, $classArr, $subjectArr, true);
    }

    public function insertSLot($number, $grade , $class, $subject)
    {
        $this->slot[$number]->Grade = $grade;
        $this->slot[$number]->Class = $class;
        $this->slot[$number]->Subject = $subject;
    }
//    public function insertSlotclass($number,  $subject)
//    {
//        //$this->slot[$number]->Grade = $grade;
//        //$this->slot[$number]->Class = $class;
//        $this->slot[$number]->Subject = $subject;
//    }


}

class SlotDetail {
    public $Grade;
    public $Class;
    public $Subject;

    function __construct(){
        $this->Class = "";
        $this->Grade = "";
        $this->Subject = "";
    }
}