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
    $staffId= getLanguage("staffID",$_COOKIE['language'] );
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
    $staffId= getLanguage("staffID",$_COOKIE['language'] );
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
    .insert table, .insert th, .insert td {
        border: 0px solid black;
    }
    .insert th{
        max-width: 300px;
        text-align:left;
    }
    .insert td {
        min-width: 150px;
        width: 100px;
        text-align:left;

    }
    .insert
    {
        position:absolute;
        left:110px;
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
<form action="termtestResults.php" method="get" class="insert">

<table class="insert" cellspacing="0">
    <tr>
        <td><?php echo $grade . " and " . $class ?></td>
        <td><input name="gradeAndClass" type="text" value="" /></td>
    </tr>
<!--    <tr>-->
<!--        <td>--><?php //echo $class ?><!--</td>-->
<!--        <td><input type="text" value="" name="Class"  maxlength="2" required="true"></td>-->
<!--    </tr>-->
    <tr>
        <td><?php echo $staffId ?></td>
        <td><input type="text" value="" name="staffId" required="true"></td>
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
            <label><input type="radio" name="Term" value="Mid"><?php echo $mid ?></label>
            <label><input type="radio" name="Term" value="Final"><?php echo $final ?></label>
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