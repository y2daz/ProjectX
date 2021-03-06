<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 12:21
 */

/**
 * This file contains all the used validation functions that are common to all forms
 */


function isFilled($value){
    if ( $value == NULL){
        return false;
    }
    else{
        if ( is_string( $value ) ){
            if(strlen( $value ) == 0){
                return false;
            }
            else{
                return true;
            }
        }
        return true;
    }
}

function isNIC($nicNumber)
{
    if (preg_match("/^[0-9]{9}[v|x]$/i", $nicNumber)){
        return true;
    }
    else{
        return false;
    }
}

function isNumeric($nationalityRace)
{
    if(preg_match("/^[0-9]+$/", $nationalityRace)){
        return true;
    }
    else{
        return false;
    }
}

//Find a function to check the string for pattern
function isAlphabetic($nameWithInitials)
{
    if (preg_match("/^([A-Z]|\.|\s)*$/i", $nameWithInitials)){
        return true;
    }
    else{
        return false;
    }
}

function isContactNumber($contactnumber)
{
    if(preg_match("/^[0-9]{10}$/", $contactnumber)){
        return true;
    }
    else{
        return false;
    }
}

function hasSpaces($value)
{
    for ($i = 0; $i < strlen($value); $i++){
        $curr = substr($value, $i, 1);

        if(strcmp($curr, " ") == 0){
            return true;
        }
    }
    return false;
}

?>
