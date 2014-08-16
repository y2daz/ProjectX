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

$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
    <head>
        <link rel="stylesheet" href="timetable.css">
        <script src="timetable.js"></script>
    </head>
    <body>


    <h1>Create TimeTable Form</h1>

    <h2>Choose Option</h2>

    <table id="info">
        <tr>
            <td><input type="RADIO" name="Choice" value="Teacher"  onclick="clickedTeacher()"/> by Teacher</td>
            <td><input type="RADIO" name="Choice" value="Class" onclick="clickedClass()" /> by Class</td>
        </tr>
        <tr>
            <td colspan="2"><span id="selection">Teacher : </span><input type="text" class="text1" name="class" value=""></td>
        </tr>
    </table>

    <table id="timetable" >
        <tr>
            <th class="time">Time</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thursday</th>
            <th>Friday</th>
        </tr>

        <tr>
            <td class="time">07.50-08.30</td>
            <td ><input type="text" class="text" name="mo1"></td>
            <td ><input type="text" class="text" name="tu1"></td>
            <td ><input type="text" class="text" name="we1"></td>
            <td ><input type="text" class="text" name="th1"></td>
            <td ><input type="text" class="text" name="fr1"></td>
        </tr>

        <tr>
            <td class="time">08.30-09.10</td>
            <td ><input type="text" class="text" name="mo2"></td>
            <td ><input type="text" class="text" name="tu2"></td>
            <td ><input type="text" class="text" name="we2"></td>
            <td ><input type="text" class="text" name="th2"></td>
            <td ><input type="text" class="text" name="fr2"></td>
        </tr>

        <tr>
            <td class="time">09.10-09.50</td>
            <td ><input type="text" class="text" name="mo3"></td>
            <td ><input type="text" class="text" name="tu3"></td>
            <td ><input type="text" class="text" name="we3"></td>
            <td ><input type="text" class="text" name="th3"></td>
            <td ><input type="text" class="text" name="fr3"></td>
        </tr>

        <tr>
            <td class="time">09.50-10.30</td>
            <td ><input type="text" class="text" name="mo4"></td>
            <td ><input type="text" class="text" name="tu4"></td>
            <td ><input type="text" class="text" name="we4"></td>
            <td ><input type="text" class="text" name="th4"></td>
            <td ><input type="text" class="text" name="fr4"></td>
        </tr>
        <tr>
            <td  class="time">10.30-10.50</td>
            <td  colspan="5" align="center">INTERVAL</td>
        </tr>

        <tr>
            <td class="time">10.50-11.30</td>
            <td ><input type="text" class="text" name="mo5"></td>
            <td ><input type="text" class="text" name="tu5"></td>
            <td ><input type="text" class="text" name="we5"></td>
            <td ><input type="text" class="text" name="th5"></td>
            <td ><input type="text" class="text" name="fr5"></td>
        </tr>

        <tr>
            <td class="time">11.30-12.10</td>
            <td ><input type="text" class="text" name="mo6"></td>
            <td ><input type="text" class="text" name="tu6"></td>
            <td ><input type="text" class="text" name="we6"></td>
            <td ><input type="text" class="text" name="th6"></td>
            <td ><input type="text" class="text" name="fr6"></td>
        </tr>

        <tr>
            <td class="time">12.10-12.50</td>
            <td ><input type="text" class="text" name="mo7"></td>
            <td ><input type="text" class="text" name="tu7"></td>
            <td ><input type="text" class="text" name="we7"></td>
            <td ><input type="text" class="text" name="th7"></td>
            <td ><input type="text" class="text" name="fr7"></td>
        </tr>

        <tr>
            <td class="time">12.50-01.30</td>
            <td ><input type="text" class="text" name="mo8"></td>
            <td ><input type="text" class="text" name="tu8"></td>
            <td ><input type="text" class="text" name="we8"></td>
            <td ><input type="text" class="text" name="th8"></td>
            <td ><input type="text" class="text" name="fr8"></td>
        </tr>

    </table>

    <br />
    <br />

    <div id="toHide" hidden="hidden">
        <h2>Assign Teachers</h2>

        <table id="assign" class="toHide" >
            <tr>
                <th>Subject</th>
                <th>Teacher</th>
            </tr>
            <tr>
                <td class="noOfSubject" >Subject 1</td>
                <td ><input type="text" class="text2" name="t1"></td>
            </tr>
        </table>
        <table id="submit">
            <tr>
                <th><input type="button" name="addNewSubject" value="Add New Subject" onclick="addNewRow()"></th>
            </tr>
            </table>
    </div>
    <table id="submit">
        <tr>
            <th><input type="submit" name="submit" value="SUBMIT"></th>
        </tr>
    </table>



    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>