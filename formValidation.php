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
    if (($value == NULL) || ($value == ""))
    {
        return false;
    }
    else
    {
        return true;
    }
}

function isNIC($value)
{
    if(strlen($value) == 10)
    {
        $checknumber = substr($value, 0, (strlen($value)-1));

        if(is_numeric($checknumber))
        {
           $checkifV = ucfirst(substr($value, strlen($value)-1, strlen($value)));

            if(strcmp($checkifV, "V"));
            {
                return true;
            }

        }
    }
    {
        return false;
    }
}

function isNumber($value)
{
    if(is_numeric($value))
        return true;
    else
        return false;

}

function isLetters($value) //Works for all string must change
{
    if(is_string($value))
        return true;
    else
        return false;

}

//Find a function to check the string for pattern

function isContactNumber($value)
{
    if((preg_match("/[^0-9]/", '', $value)) && strlen($value) == 10)
        return true;
    else
        return false;

}

function hasSpaces($value)
{
    for ($i = 0; $i < strlen($value); $i++)
    {
        $curr = substr($value, $i, 1);

        if(strcmp($curr, " ") == 0)
            return 1;
    }
    return 0;
}


?>
