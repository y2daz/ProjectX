<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
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
$lang = $_COOKIE["language"];

?>
<html>
    <head>
        <link rel="stylesheet" href="substitute.css">
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>

    <h1><?php echo getLanguage("substituteTeacherForm", $lang) ?></h1>

    <h2><?php echo getLanguage("chooseOption", $lang) ?></h2>

    <table id="info">
        <tr>
            <td><input type="RADIO" name="Choice" value="Teacher" checked="1" onclick="document.getElementById('selection').innerHTML='Teacher : ';"/><?php echo getLanguage("byTeacher",$lang)?></td>
            <td><input type="RADIO" name="Choice" value="Class" onclick="document.getElementById('selection').innerHTML='Class : ';  " /> <?php echo getLanguage("byClass",$lang)?></td>
        </tr>
        <tr>
            <td colspan="2"><span id="selection"><?php echo getLanguage("teachersName",$lang)?> : </span><input type="text" class="text1" name="class" value=""></td>
        </tr>
    </table>




    <table id="timetable" >
        <tr>
            <th class="time"><?php echo getLanguage("time",$lang)?></th>
            <th><?php echo getLanguage("monday",$lang)?></th>
            <th><?php echo getLanguage("tuesday",$lang)?></th>
            <th><?php echo getLanguage("wednesday",$lang)?></th>
            <th><?php echo getLanguage("thursday",$lang)?></th>
            <th><?php echo getLanguage("friday",$lang)?></th>
        </tr>

        <tr>
            <td >07.50-08.30</td>
            <td onclick="<?php echo("yakow")?>" ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >08.30-09.10</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >09.10-09.50</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >09.50-10.30</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>
        <tr>
            <td  >10.30-10.50</td>
            <td  colspan="5" align="center"><?php echo getLanguage("interval",$lang)?></td>
        </tr>

        <tr>
            <td >10.50-11.30</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >11.30-12.10</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >12.10-12.50</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

        <tr>
            <td >12.50-01.30</td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
            <td ></td>
        </tr>

    </table>

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