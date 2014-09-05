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
//Put object to html
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
}