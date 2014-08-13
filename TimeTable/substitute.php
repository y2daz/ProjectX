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

?>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="substitute.css">
        <script src="timetable.js"></script>

        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

        </style>
    </head>
    <body>


    <h1>Create TimeTable Form</h1>

    <h2>Choose Option</h2>

    <table id="info">
        <tr>
            <td><input type="RADIO" name="Choice" value="Teacher" onclick="document.getElementById('selection').innerHTML='Teacher : ';"/> by Teacher</td>
            <td><input type="RADIO" name="Choice" value="Class" onclick="document.getElementById('selection').innerHTML='Class : ';  " /> by Class</td>
        </tr>
        <tr>
            <td colspan="2"><span id="selection">Class : </span><input type="text" class="text1" name="class" value=""></td>
        </tr>
    </table>
    <table id="timetable" >
        <tr>
            <th>Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </tr>

        <tr>
            <td >07.50-08.30</td>
            <td ></td>
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
            <td  colspan="5" align="center">INTERVAL</td>
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
    <table id="submit">
        <tr>
            <th><input type="submit" name="submit" value="SUBMIT"></th>
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