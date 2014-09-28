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

$AdmissionNo ="";
$DateFrom = "";
$DateTo ="";





?>
    <html>
        <head>
            <style type=text/css>
    <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
    <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            h1{
                text-align: center;
            }
            h3{
                position: relative;
                left:50px;
            }
            #info{
                position: absolute;
                padding: 10px;
                left: 40px;
            }

            .insert2
            {
                position:absolute;
                left:330px;
                top:275px;

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

            .resultsTable
            {
                position: absolute;
                left: 300px;
                top: 350px;
            }

            .insert{
                position:relative;
                left:40px;
                bottom:5px;
            }

            .insert td{
                padding:10px;
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
                            <input type="text" class="text1" name="search" value="">
                        </td>
                    </tr>
                    <tr><td><br></td></tr>
                    <tr>
                        <td><input type="radio" name="Choice" value="AdmissionNo"  />Admission Number</td>

                        <td><input type="radio" name="Choice" value="Class" />Class</td>

                        <td><input type="checkbox" name="viewAbsentCheck" value="ViewAbsentOnlyAbsentDays"  />View only absent days</td>

                    </tr>

                    <tr><td><br></td></tr>

                    <tr>
                        <td>Date From</td>
                        <td><input type="date" name="datefrom" value=""></td>
                        <td>Date To</td>
                        <td><input type="date" name="dateto" value=""></td>
                    </tr>

                    <tr><td><br></td></tr>

                </table>

                <table align="center" class="insert2">
                    <tr style="text-align: center"><td><input type="submit" value="Search" name="value"></td></tr>
                </table>



                <table class="resultsTable">

                    <th>Date</th>
                    <th>Present</th>

                <?php

                if(isset($_POST["search"]))
                {
                    if($_GET["Choice"] == "AdmissionNo")
                    {
                        $AdmissionNo = $_GET["value"];
                        $DateFrom = $_GET["datefrom"];
                        $DateTo = $_GET["dateto"];

                        $result =  getAttendanceByAdmissionNo($AdmissionNo, $DateFrom,  $DateTo);

                        foreach($result as $row)
                        {
                            $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" :
                                "<tr><td>";
                            echo $top;
                            echo "<tr> $row[0] </tr>";
                            echo "<tr> $row[1] </tr>";
                        }

                    }
                    else if($_GET["Choice"] == "Class")
                    {
                        $Class = $_GET["value"];
                    }
                }

                ?>

                </table>

       </form>
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