<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 8/8/14
 * Time: 2:01 PM
 */

?>

<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="script.js"></script>

</head>

<body>

<h1>Create TimeTable Form</h1>

<h2>Choose Option</h2>

<table id="info">
    <tr>
        <td><input type="RADIO" name="Choice" value="Teacher" onclick="document.getElementById('selection').innerHTML='Teacher : ';"/> by Teacher</td>
        <td><input type="RADIO" name="Choice" value="Class" onclick="document.getElementById('selection').innerHTML='Class : ';"/> by Class</td>
    </tr>
    <tr>
        <td colspan="2"><span id="selection">Class : </span><input type="text1" name="class" value=""></td>
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
        <td ><input type="text" name="mo1"></td>
        <td ><input type="text" name="tu1"></td>
        <td ><input type="text" name="we1"></td>
        <td ><input type="text" name="th1"></td>
        <td ><input type="text" name="fr1"></td>
    </tr>

    <tr>
        <td >08.30-09.10</td>
        <td ><input type="text" name="mo2"></td>
        <td ><input type="text" name="tu2"></td>
        <td ><input type="text" name="we2"></td>
        <td ><input type="text" name="th2"></td>
        <td ><input type="text" name="fr2"></td>
    </tr>

    <tr>
        <td >09.10-09.50</td>
        <td ><input type="text" name="mo3"></td>
        <td ><input type="text" name="tu3"></td>
        <td ><input type="text" name="we3"></td>
        <td ><input type="text" name="th3"></td>
        <td ><input type="text" name="fr3"></td>
    </tr>

    <tr>
        <td >09.50-10.30</td>
        <td ><input type="text" name="mo4"></td>
        <td ><input type="text" name="tu4"></td>
        <td ><input type="text" name="we4"></td>
        <td ><input type="text" name="th4"></td>
        <td ><input type="text" name="fr4"></td>
    </tr>
    <tr>
        <td  >10.30-10.50</td>
        <td  colspan="5" align="center">INTERVAL</td>
    </tr>

    <tr>
        <td >10.50-11.30</td>
        <td ><input type="text" name="mo5"></td>
        <td ><input type="text" name="tu5"></td>
        <td ><input type="text" name="we5"></td>
        <td ><input type="text" name="th5"></td>
        <td ><input type="text" name="fr5"></td>
    </tr>

    <tr>
        <td >11.30-12.10</td>
        <td ><input type="text" name="mo6"></td>
        <td ><input type="text" name="tu6"></td>
        <td ><input type="text" name="we6"></td>
        <td ><input type="text" name="th6"></td>
        <td ><input type="text" name="fr6"></td>
    </tr>

    <tr>
        <td >12.10-12.50</td>
        <td ><input type="text" name="mo7"></td>
        <td ><input type="text" name="tu7"></td>
        <td ><input type="text" name="we7"></td>
        <td ><input type="text" name="th7"></td>
        <td ><input type="text" name="fr7"></td>
    </tr>

    <tr>
        <td >12.50-01.30</td>
        <td ><input type="text" name="mo8"></td>
        <td ><input type="text" name="tu8"></td>
        <td ><input type="text" name="we8"></td>
        <td ><input type="text" name="th8"></td>
        <td ><input type="text" name="fr8"></td>
    </tr>

</table>
<br>
<br>
<h2>Assign Teachers</h2>

<table id="assign">
    <tr>
        <th>Subject</th>
        <th>Teacher</th>
    </tr>
    <tr>
        <td >Subject 1</td>
        <td ><input type="text" name="t1"></td>
    </tr>
    <tr>
        <td >Subject 2</td>
        <td ><input type="text" name="t2"></td>
    </tr>
    <tr>
        <td >Subject 3</td>
        <td ><input type="text" name="t3"></td>
    </tr>
    <tr>
        <td >Subject 4</td>
        <td ><input type="text" name="t4"></td>
    </tr>
    <tr>
        <td >Subject 5</td>
        <td ><input type="text" name="t5"></td>
    </tr>

</table>
<table id="submit">
    <tr>
        <th><input type="submit" name="submit" value="SUBMIT"></th>
    </tr>
</table>
</body>
</html>