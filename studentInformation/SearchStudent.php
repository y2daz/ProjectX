<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

table {
    border-spacing:0px 5px;
}

.general {
    position:absolute;
    left:80px;
    top:80px;
}

th{
    align:center;
    color:white;
    background-color:#154DC1;
    height:30px;
    padding:5px;
}

td {
    padding:5px;
}
input.button1 {
    position:relative;
    font-weight:bold;
    font-size:20px;
    left:50px;
    top:10px;
}
input.button2 {
    position:relative;
    font-weight:bold;
    font-size:20px;
    right:20px;
    top:10px;
}
input.button3 {
    position:relative;
    font-weight:bold;
    font-size:20px;
    left:20px;
    top:10px;
}
<?php //Get language and make changes

    if($_COOKIE['language'] == 0)
    {
	    $AdmissionID = "AdmisionID";
        $Name = "Name";
        $Class = "Class";
        $Medium = "Medium";
        $DateOfBirth     = "DateOfBirth";

    }

    ?>





        </style>
    </head>
    <body>

    <form>
        <table class="Searchedtable" align="center">
            <tr>
                <th>AdmisionID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Medium</th>
                <th>DateOfBirth</th>
                <th></th>
            </tr>
            <tr class="alt">
                <td>01111</td>
                <td>Madhushan De Silva</td>
                <td>13</td>
                <td>English</td>
                <td>1993/07/27</td>
                <td><input type="button" name="expand" value="Expand Details" /></td>
            </tr>
            <tr class="alt">
                <td>

                    <input type="checkbox" name="checkbox" value=""><?php echo $AdmissionID?>
                    <input type="checkbox" name="checkbox" value=""><?php echo $Name?>
                    <input type="checkbox" name="checkbox" value=""><?php echo $Class?>
                    <input type="checkbox" name="checkbox" value=""><?php echo $Medium?>
                    <input type="checkbox" name="checkbox" value=""><?php echo $DateOfBirth?>
                </td>
            </tr>
        </table>
    </form>




    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>