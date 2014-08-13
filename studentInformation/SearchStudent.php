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



        </style>
    </head>
    <body>

    <form>
        <table class="general" cellspacing="0">
            <tr class="alt">
                <td>Admission ID</td>
                <td><input type="text" value=""></td>

            <tr>
                <td>Name With Initials</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Nationality/Race</td>
                <td><input type="text" value=""></td>
            </tr>

            <td>Medium</td>
            <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Grade/Year</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Class</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td></td>

                <td><input class="button1" type="button" value="Search"></td>

                <td><input class="button2" type="button" value="Reset"></td>

                <td><input class="button3" type="button" value="Cancel"></td>
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