<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 11/12/14
 * Time: 21:24
 */

require_once("../dbAccess.php");
require_once("../common.php");

if( isset( $_POST[ "staffId" ] ) )
{
    $result = getStaffMember( $_POST[ "staffId" ] );
    echo $result[0][1];
}