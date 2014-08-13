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
            <tr><th>General Information</th><th></th></tr>
            <tr>
                <td>Admission ID</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr class="alt">
                <td>Name With Initials</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Nationality/Race</td>
                <td><select type="text" value="">
                        <option>Sinhala</option>
                        <option>Sri Lankan Tamil</option>
                        <option>Indian Tamil</option>
                        <option>Sri Lankan Muslim</option>
                        <option>Other</option>
                    </select></td>
            </tr>
            <tr class="alt">
                <td>Religion</td>
                <td><select type="text" value="">
                        <option>Buddhism</option>
                        <option>Hinduism</option>
                        <option>Islam</option>
                        <option>Christianity</option>
                        <option>Othe	r</option>
                    </select></td>
            </tr>
            <tr class="alt">
                <td>Medium</td>
                <td>
                    <input type="radio" name="Med" value="sinhala">Sinhala
                    <input type="radio" name="Med" value="english">English
                    <input type="radio" name="Med" value="tamil">Tamil

                </td>
            </tr>
            <tr>
                <td>Address</td>
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

                <td><input class="button1" type="button" value="Submit"></td>

                <td><input class="button2" type="button" value="Reset"></td>
            </tr>
        </table>
    </form>



    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>