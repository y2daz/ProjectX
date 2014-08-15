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

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
<head>
<style type=text/css>
    <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
    <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->


    table, th, td {
        border: 0px solid black;

    }
    th{
        width: 1000px;
        text-align:left;
    }

    td {
        width: 10px;
        text-align:left;
    }

    tr{
        height: 20px;
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

<div id="main">

    <h1>Term Test Details Form</h1>
<form>

<table class="insert" cellspacing="0">
<tr>
    <td>Grade</td>
    <td><select type="text" value="">

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
    <td><input type="text" value=""></td>
</tr>
<tr>
    <td>Teacher's Name</td>
    <td><input type="text" value=""></td>
</tr>
<tr class="alt">
<tr>
    <td>Subject</td>
    <td><input type="text" value=""></td>
</tr>
<tr class="alt">
<tr>
    <td>Year</td>
    <td><input type="text" value=""></td>
</tr>
<tr class="alt">
    <td>Term</td>
    <td>
        <input type="radio" name="Term" value="Mid">Final
        <input type="radio" name="Term" value="Final">Mid
        <input type="radio" name="Term" value="Other">Other

    </td>
</tr>

<h2></h2>

</table>


        </form>


    <tr>
    <td></td>

    <td><input class="button" type="submit" value="Submit"></td>




    <td><input class="button1" type="reset" value="Reset"></td>







</tr>

</div>
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