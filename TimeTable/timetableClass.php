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

    public function getTimetable(){
        $result = getTimetable($this->staffId);

        if(isFilled($result)){
            $i = 0;

            foreach($result as $row){
                $this->insertSLot($i, $row[0], $row[1], $row[4] );
                $i++;
            }
        }
    }

    public function setTimetable( $array ){
//Store html timetable to object

    }

    public function dbGet(){
//STore timetable from db to object
    }
    public function dbSet(){
//Store object in db
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

    function __construct(){
        $this->Class="";
        $this->Grade="";
        $this->Subject="";
    }
}