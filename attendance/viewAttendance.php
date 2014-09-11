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

require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");


ob_start();
error_reporting(E_ERROR | E_PARSE);


$currentAttendance="";

if( isset($_GET["AdmissionNo"]) )
{
    $admissionNo = $_GET["AdmissionNo"];

}
elseif(isset($_GET["Class"]))
{
    $Class = $_GET["Class"];
}



$tableDetails = "none";
$tableViewTable = "none";
$fullPageHeight = 600;

if (isset($_GET["search"]))
{
    $currentAttendance = null;

    if ($_GET["Choice"] == "AdmissionNo")
    {
        $currentAttendance = ViewAttendance($_GET["value"]);
    }
    else if($_GET["Choice"] == "Class")
    {
        $currentAttendance = ViewAttendancebyclass($_GET["value"]);
        //echo $_GET["value"];
    }

    $tableDetails= "none";
    $tableViewTable= "block";

}
$admissionNo="";
$Year = "";

?>
    <html>
        <head>
            <style type=text/css>
    <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
    <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

                /*
                ADD YOUR CSS HERE
                */
    h1{
        text-align: center;
    }
    h3{
        position: relative;
        left:50px;
    }
    #info{
        position: relative;
        left: 40px;
    }
    .viewTable{
        position: relative;
        border-collapse: collapse;
        left:25px;
        max-width: 750px;
        display: <?php echo $tableViewTable ?>;
    }
    .viewTable th{
        width: 300px;
        font-weight: 600;
        color:white;
        background-color: #005e77;
    }
    .viewTable tr.alt{
        background-color: #bed9ff;
    }
    .viewTable td{
        padding-left: 4px;
        padding-right: 4px;
        min-width: 60px;
        text-align: center;
    }
    .details {
        /*position: relative;*/
        /*top:50px;*/
        width:500px;
        height:150px;
        display: <?php echo $tableDetails ?>
    }
    input.button1 {
        position:relative;
        font-weight:bold;
        font-size:15px;
        right:-150px;
        top:100px;
    }
            </style>
        </head>
    <body>
      <form>

        <table class="insert" cellspacing="0">
        <h1>View Attendance</h1>

            <form method="GET">

                <table id="info">
                    <tr>
                        <td colspan="2"><span id="selection">Search by : </span>
                            <input type="text" class="text1" name="value" value="">
                        </td>
                        <td><input class="button" name="search" type="submit" value="Search"></td>
                    </tr>
                    <tr><td></td><td>&nbsp;</td></tr>
                    <tr>
                        <td><input type="RADIO" name="Choice" value="AdmissionNo" checked />Admission Number</td>
                        <!--                <td><input type="RADIO" name="Choice" value="NamewithInitials"  />Name with-->
                        <!--                    Initials</td> -->
                        <!--                <td><input type="RADIO" name="Choice" value="Medium"  />Medium</td>-->
                        <!--                <td><input type="RADIO" name="Choice" value="Grade"  />Grade</td>-->
                        <td><input type="RADIO" name="Choice" value="Class" />Class</td>
                        <!--                <td><input type="RADIO" name="Choice" value="House"  />House</td>-->
                    </tr>

                </table>
            </form>
            <br />


            <form method="post">
                <table class="viewTable">
                    <tr>
                        <th>Admisson Number</th>
                        <th>Year</th>
                        <!--<th>Date of Birth</th>-->
                        <!--<th>Grade and Class</th>*/
                        <th></th>
                    </tr>-->
                    <?php

                    $res = $currentStudent;

                    $i = 1;

                    if (isFilled($res))
                    {
                        foreach($res as $row)
                        {
                            $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" :
                                "<tr><td>";
                            echo $top;
                            echo "$row[0]";
                            echo "<td>$row[1]</td>";
                            echo "<td>$row[2]</td>";
                            echo "<td>$row[3]</td>";
                          //  echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"SearchStudent.php?expand=" . $row[0] . "\" /> </td> ";

                            echo "</td></tr>";
                        }
                    }
                    else{
                        echo "<tr>";
                        echo "<td colspan='5'>There are no records to show</td>";
                        echo "</tr>";
                    }

                    if (isset($_GET["search"]))
                    {
                        $fullPageHeight = ( 600 + ($i * 18) );
                    }

                    ?>
                </table>
            </form>
            <br />
            <br />





</body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "View Attendance";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
//require_once(THISROOT . "/Master.php");
include("../Master.php");

?>