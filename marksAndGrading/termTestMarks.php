﻿<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();


if($_COOKIE['language'] == 0)
{
    $termtestresultsform = "Term Test Details Form";
    $grade="Grade";
    $class = "Class";
    $teachername = "Teacher's Name";
    $subject="Subject";
    $year="Year";
    $term="Term";
    $submit="Submit";
    $reset="Reset";
    $mid="Mid";
    $final="Final";
}
else
{

    $term="වාරය";
    $year = "වර්ෂය";
    $subject="විෂය";
    $grade="ශ්‍රේණිය";
    $class="පංතිය";
    $teachername="ගුරුවරයාගේ නම";
    $termtestresultsform="වාර විභාග ප්‍රතිඵල විස්තර සටහන";
    $submit="යොමු කරන්න";
    $reset="නැවත පිහිටුවන්න";
    $mid="මධ්‍ය";
    $final="අවසන්";
}
?>





<html>
<head>
<style type=text/css>
    <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
    <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

    h1{
        text-align: center;
        background-color: #005e77;
        color: #ffffff;
    }

    table, th, td {
        border: 0px solid black;
    }

    th{
        width: 1000px;
        text-align:left;
    }

    td {
        width: 50px;
        text-align:left;

    }

    tr{
        height: 20px;

    }

    .insert
    {
        position:absolute;
        left:135px;
        top: 65px;
    }

    .insert2
    {
        position:absolute;
        left:135px;
        top: 350px;
    }



    .insert input.button {
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

<h1><?php echo $termtestresultsform ?></h1>


<body>
<form action="termtestresults.php" method="get" class="insert">

<table class="insert" cellspacing="0">
<tr>
    <td><?php echo $grade ?></td>
    <td><select name="Grade" type="text" value="" >
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
<tr>
    <td><?php echo $class ?></td>
    <td><input type="text" value="" name="Class"  maxlength="2" required="true"></td>
</tr>
<tr>
    <td><?php echo $teachername ?></td>
    <td><input type="text" value="" name="TeacherName" required="true"></td>
</tr>
<tr>
<tr>
    <td><?php echo $subject ?></td>
    <td><input type="text" value="" name="Subject" required="true"></td>
</tr>
<tr>
<tr>
    <td><?php echo $year ?></td>
    <td><input type="text" value="" name="Year" maxlength="4" required="true"></td>
</tr>
<tr>
    <td><?php echo $term ?></td>
    <td>
        <input type="radio" name="Term" value="Mid"><?php echo $mid ?>
        <input type="radio" name="Term" value="Final"><?php echo $final ?>
    </td>
</tr>


</table>

    <table class="insert2">
        <tr>
            <td>
                <input class="button" type="submit" name="submit" value="<?php echo $submit ?>">
            </td>

            <td>
                <input class="button" type="reset" name="reset" value="<?php echo $reset ?>">
            </td>
        </tr>

    </table>

</form>





</tr>

</body>
</html>

<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Term Test Marks Input";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>