<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
//require_once(THISROOT . "/common.php");
ob_start();

//hehe
//hehe
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");


$olmarks="";
if (isset($_POST["Submit"])) //User has clicked the submit button to update staff
{
    $operation = searchOLMarks($_POST["IndexNo"], $_POST["AdmissionNo"], $_POST["Year"], $_POST["Subject"], $_POST[" Grade"]);

  /*  if ($operation == true)
    {
        sendNotification("Staff Details successfully updated.");
    }
    else
    {
        sendNotification("Error updating information.");
    }*/
}

if( isset($_GET["IndexNo"]) )
{
    $IndexNo = $_GET["IndexNo"];

}

if (isset($_GET["search"]))
{
    $olmarks = null;

    if ($_GET["Choice"] == "")
    {
        $olmarks = searcholmarks($_GET["query"]);
    }
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
        text-align:left;
    }

    td {
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

    <h1>Search Results</h1>
    <form method="GET">

<table class="insert" cellspacing="0">
<tr>
    <tr class="alt">
    <ol>
    <tr>

        <td>
            <input type="radio" name="exam" value="term">
        </td>
        <td>Term Test Marks</td>
        <td></td>




        <td>Addmission Number</td>
        <td><input name="admissionNo" type="text" value=""></td>
        <td>Grade</td>
        <td><input name="grade" type="text" value=""></td>
        <td>Term</td>
        <td><select name="term" type="text" value="">
                <option>Mid</option>
                <option>Final</option>



    </tr>
        </ol>


    <tr class="alt">

    <ol>



    <tr>
        <td>
            <input dirname="gceOLResult" type="radio" name="exam" value="ol">
        </td>

        <td>G.C.E O/L Results</td>
        <td></td>



        <td>Index Number</td>
        <td><input name="indexNo" type="text" value=""></td>
        <td>Year</td>
        <td><input name="year" type="text" value=""></td>
    </tr>
        </ol>

    <tr class="alt">
    <ol>
    <tr>
        <td>
            <input dirname="gceALResults" type="radio" name="exam" value="al">
        </td>
        <td>G.C.E A/L Results</td>
        <td></td>





        <td>Index Number</td>
        <td><input name="indexNo" type="text" value=""></td>
        <td>Year</td>
        <td><input name="year" type="text" value=""></td>
    </tr>
        </ol>



</table>


        </form>

    <td><input class="button" name="search" type="submit" value="Search"></td>




<input class="button1" type="reset" value="Reset">







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