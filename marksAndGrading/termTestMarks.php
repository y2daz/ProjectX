<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

?>





<html>
<head>
<style type=text/css>
    <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
    <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

    h1{
        text-align: center;
    }

    .insert, th, td {
        border: 0px solid black;

    }
    .insert th{
        /*width: 1000px;*/
        text-align:left;
    }

    .insert td {
        /*width: 10px;*/
        text-align:left;
        padding: 2px 5px 2px 5px;;
    }


    input.button {
        position:relative;
        font-weight:bold;
        font-size:20px;
        left:30px;
        top:20px;
    }
    input.button1 {
        position:relative;
        font-weight:bold;
        font-size:20px;
        left:50px;
        top:20px;
    }



</style>
    </head>


<body>

<form method="POST"  action="termTestMarks.php">
    <h1>Term Test Details Form</h1>



<table class="insert" cellspacing="0">
<tr>
    <td>Grade</td>
    <td><select type="text" value="" >

            <option>--</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
        </select></td>
</tr>
<tr class="alt">
    <td>Class</td>
    <td><input name="class" type="text" value="" required="true"></td>
</tr>
<tr>
    <td>Teacher's ID</td>
    <td><input name="staffID" type="text" value="" required="true"></td>
</tr>
<tr class="alt">
<tr>
    <td>Subject</td>
    <td><input name="subject" type="text" value="" required="true"></td>
</tr>
<tr class="alt">
<tr>
    <td>Year</td>
    <td><input name="year" type="text" value="" required="true"></td>
</tr>
<tr class="alt">
    <td>Term</td>
    <td>
        <input type="radio" name="Term" value="Mid">Final
        <input type="radio" name="Term" value="Final">Mid


    </td>
</tr>

<br />

</table>

    <input class="button" type="submit" value="Submit">

    <input class="button1" type="reset" value="Reset">

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