<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 15/02/15
 * Time: 09:19
 */
require_once("../dbAccess.php");
require_once("../common.php");


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["reset"])) //User has clicked a reset password button
{
    if( $_POST["user"] == "" ){
        $_POST["user"] = $_SESSION["user"];

        $operation = changePassword( $_POST["user"], $_POST["newPassword"] );
        if ($operation == 1)
        {
            echo true;
        }
        else
        {
            echo false;
        }
    }else{
        $user = Role::getRolePerms( $_SESSION["accessLevel"] );
        if( $user->hasPerm('Manage Users') ){

            $operation = changePassword($_POST["user"], $_POST["newPassword"]);
            if ($operation == 1)
            {
                echo true;
            }
            else
            {
                echo false;
            }
        }
        else{
            echo false;
        }
    }
}