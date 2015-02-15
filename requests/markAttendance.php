<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 15/02/15
 * Time: 16:48
 */

require_once("../dbAccess.php");
require_once("../common.php");


if( isset( $_POST["markPresent"] ) ){
    $staffId = $_POST["staffID"];
    $markedDate = $_POST["markedDate"];

    $operation = markPresent( $staffId, $markedDate );

    if( $operation ){
        echo "Marked &nbsp;&nbsp;<input type='button' id='und_{$staffId}' class='btnUndo smallButton' value='Undo' />  ";
    }
}

if( isset( $_POST["undoMarkPresent"] ) ){
    $staffId = $_POST["staffID"];
    $markedDate = $_POST["markedDate"];

    $operation = undoMarkPresent( $staffId, $markedDate );

    if( $operation ){
        echo "<input type='button' id='btn_{$staffId}' class='btnMark smallButton' value='Mark Present' />  ";
    }
}
