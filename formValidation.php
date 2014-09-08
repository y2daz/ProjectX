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

function isNIC($nicNumber)
{
    if(strlen($nicNumber) == 10)
    {
        $checknumber = substr($nicNumber, 0, (strlen($nicNumber)-1));

        if(is_numeric($checknumber))
        {
           $checkifV = ucfirst(substr($nicNumber, strlen($nicNumber)-1, strlen($nicNumber)));

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

function isNumber($salary)
{
    if(is_numeric($salary))
        return true;
    else
        echo "please enter valid amount";

}

function isLetters($value) //Works for all string must change
{
    if(is_string($value))
        return true;
    else
        return false;

}

//Find a function to check the string for pattern
function Name($nameWithInitials)
{
    if (preg_match("/^[a-zA-Z ]+$/i", $nameWithInitials))
    {
        return true;
    }
    else
    {
        echo "Enter Alphabetical letters only ";
    }
}
function isContactNumber($contactnumber)
{
    if((preg_match("/[^0-9]/", '', $contactnumber)) && strlen($contactnumber) == 10)
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
