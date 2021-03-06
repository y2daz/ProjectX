<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 9/17/14
 * Time: 9:04 AM
 */
session_start();

require_once("../dbAccess.php");
require_once("../common.php");
error_reporting(E_ERROR | E_PARSE);

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

if(!isFilled($_COOKIE['language']))
{
    setcookie('language', '0'); //where 0 is English and 1 is Sinhala
}
if(!isFilled($_SESSION["user"]))
{
    header("Location: " . PATHFRONT . "/Menu.php");
}
if(isset($_GET["logout"]))
{
    $_SESSION["user"] = NULL;
    header("Location: " . PATHFRONT . "/Menu.php");
}

//$AdmissionNo;
//$result = getAttendance();

/*$line1 = "Class Wise Report";
$line2 = "D.S Senanayake College Colombo 7";

$column0Header = "AdmissionNo";
$column1Header = "Class";
$column2Header = "Date"; **/

if(!isFilled($_GET["grade"]))
{
    header("Location:    " . PATHFRONT . "/TimeTable/timetableClasswise.php");
}
else{
    $classroom =$_GET["grade"];
    $startDate=$_GET["dateFrom"];
    $endDate=$_GET["dateTo"];


    $arrClassroom = getGradeAndClass( $classroom );

    $grade = $arrClassroom[0];
    $class = $arrClassroom[1];

    $studentList = getAttendanceReport( $startDate, $endDate, $grade, $class );


//        echo "<pre>";
//        print_r($studentList);
//        echo "</pre>";
//        if($studentList == null )
//        {
//            sendNotification("No free teachers.");
//        }
//        else
//        {
//            sendNotification("Teachers available for .");
//        }

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Wise Report</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <script>
        function printPage(){
            console.log("printing");
            window.print();
            console.log("printing");
        }
    </script>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        h1,h3{
            text-align: center;
        }
        .report{
        }
        .report, .report th, .report td{
            /*text-align: justify;*/
            border: 1px solid black;
            border-collapse: collapse;
            max-height: 300px;
            padding: 5px 10px 5px 10px;
        }
        .report .headerRow{
            height:50px;
        }
        .report th.number{
            max-width: 100px;
        }
        .report.{
            text-align: center;
        }
        .report .center{
            text-align: center;
            max-width: 100px;
        }
        .secret td{
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
        }
        #col_0{
            max-width: 100px;
            min-width: 50px;
            padding-left: 10px;
            padding-right: 10px;
        }
        #col_1{
            max-width: 50px;
            min-width: 50px;
            padding-left: 10px;
            padding-right: 10px;
        }
        #col_2{
            max-width: 150px;
            min-width: 100px;
            padding-left: 8px;
            padding-right: 8px;
        }
        #col_3{
            max-width: 250px;
            min-width: 150px;
            padding-left: 10px;
            padding-right: 10px;
        }
        #PrintButton{
            position: absolute;
            top: 100px;
            left :40px;
            font-size: 1.5em;
        }
        #flag {
            position: relative;
            top: -120px;
            left:205pt;
            /*border: 5px solid black;*/
            width: 120px;
            height: 120px;
        }
        #sch{
            position:relative;
            font-size: 24pt;
            text-align: center;
            left:10pt;
            top: 120pt;

        }
        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 105pt;

        }
        h3{
            position: relative;
            font-size: 15pt;
            text-align: center;
            left: 0pt;
            top: 100pt;
        }


    </style>
</head>

    <body>

    <h1 id="sch">D.S.Senanayake College</h1>
    <h2>Gregory's Road, Colombo 07, Sri Lanka.</h2>
    <h3>Class wise report</h3>


    <form method="get">
        <table id="info">
            <tr>
                <th>
                    <img id="flag" src="/images/abc.jpg"/>
                </th>
            </tr>

        </table>
    </form>


    <table class="report" align="center">
        <tr class="secret">

            <th>Admission Number</th>
            <th>Name</th>
            <th class="number">Present Days</th>
            <th class="number">No of school Days</th>
            <th class="number">Attendance (Percentage)</th>

        <?php


        if(!isFilled($studentList))
        {
            echo "<tr><td colspan='37'>There are no records to show.</td></tr>";
        }
        else
        {
            $rowcount = 0;
            foreach($studentList as $row){
                echo ( $rowcount % 2 == 0 ? "<tr>" : "<tr class='alt'>");
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td id='replacementName_$row[0]' >" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . number_format( (($row[2] / $row[3] ) * 100), 2 ) . "</td>";
                // $date = date("y/m/d");
//                    echo "<td><input id='confirm_$row[0]' class='confirm' type='button' value='Confirm' name='Confirm_  $row[0]' </td>";
                echo "</tr>";
                $rowcount++;
            }
        }


        ?>

        </tr>
    </table>



<!--    <button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>-->

<br />

    </body>
</html>
