<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 23/08/14
 * Time: 18:07
 */

//    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
//    include(THISROOT . "/dbAccess.php");
//    require_once(THISROOT . "/common.php");
    require_once("formValidation.php");

    function sendNotification($message){
        echo "<script> sendMessage(\"$message\"); </script>";
    }

    function getGradeAndClass($text){
        $arrGradeClass = array();
        $text = trim( $text );
        $workingVal = "";

        for ($i = 0; $i < strlen($text); $i++)
        {
            $curr = substr($text, $i, 1);
            if(strcmp($curr, " ") !== 0){
                $workingVal .= $curr;
            }
        }
        $arrGradeClass[0] = "";
        for ($i = 0; $i < strlen($workingVal); $i++)
        {
            $curr = substr($workingVal, $i, 1);
            if(!is_numeric($curr)){
                break;
            }
            $arrGradeClass[0] .= $curr;
        }
        $arrGradeClass[1] = "";
        for ($x = 0; $x < strlen($workingVal); $x++)
        {
            $curr = substr($workingVal, $x, 1);
            if( preg_match("/[a-z]/i", $curr ) ){
                $arrGradeClass[1] .= strtoupper( $curr );
            }

        }
        return $arrGradeClass; //Grade in [0] and class in [1]
    }

?>