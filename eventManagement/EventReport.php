<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 9/17/14
 * Time: 9:11 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Class Report</title>

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

        #general{
            /*width:50%;*/
            height:auto;
            text-align: center;
        }

        #flag {
            position: relative;
            top: -10px;
            left:205pt;
            /*border: 5pxxx solid black;*/
            width: 120px;
            height: 120px;
        }

        #eventReport{
            position: relative;
            left:25px;
            width:1300px;
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        #eventReport .alt{
            background-color: #ffffff;
        }
        #eventReport td{
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        #eventReport #eventName{
            width:200px;
        }

        #eventReport #description{
            width:300px;
        }

        #eventReport #date{
            width:200px;
        }

        #eventReport #location{
            width:200px;
        }

        #eventReport #starttime{
            width:200px;
        }

        #eventReport #endtime{
            width:200px;
        }

        #eventReport #manager{
            width:200px;
        }

        #eventReport th{
            color:black;
            /*background-color: #005e77;*/
            height:30px;
            padding:5px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:15px;
            width: 500px;

        }

        #PrintButton{
            position: absolute;
            top: 100px;
            left :40px;
            font-size: 1.5em;
        }

</style>
    </head>

    <body>
        <div class="" id="general" style="">

            <h1>Event Report</h1>

            <form method="get">
                <table id="info">
                    <tr>
                    <th>
                        <img id="flag" src="/images/dslogo.jpg"/>


                </table>
            </form>

            <table id="eventReport">

                <tr>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>End Time</th>
<!--                    <th>Event Manager</th>-->
                </tr>

                <?php
                $result = getEventdetails($_GET["id"]);
                $i = 1;

                foreach($result as $row){
                    $top = "<form method='post' action='EventReport.php'>";
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                    echo $top;
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
//                    echo "<td>$row[6]</td>";





                    echo "</td></tr></form>";
                }
                ?>





            </table>
        </div>
        <button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>
    </body>
</html>
