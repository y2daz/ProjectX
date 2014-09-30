<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 9/29/14
 * Time: 9:45 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");

ob_start();

$lang = $_COOKIE["language"];

error_reporting(0);//Temporarily turn of all errors


?>
<html>



</html>