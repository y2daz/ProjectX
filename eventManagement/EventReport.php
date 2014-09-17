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

<html>
<head>
    <style type=text/css>
        #main{ height:<?php echo "$fullPageHeight" . "px";?> }
        #footer{ top:<?php echo "$footerTop" . "px";?> }

        #general{
            /*width:50%;*/
            height:auto;
            text-align: center;
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

</style>
    </head>

    <body>
        <div class="" id="general" style="">

            <h1>Event Report</h1>
            <table id="eventReport">

                <tr>
                    <th>Event Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Event Manager</th>
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
                    echo "<td>$row[6]</td>";





                    echo "</td></tr></form>";
                }
                ?>





            </table>
        </div>
    </body>
</html>
