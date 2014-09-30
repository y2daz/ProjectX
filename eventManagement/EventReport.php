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
    <title>Event Report</title>

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
            top: -120px;
            left: 605px;
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
            width:100px;
        }

        #eventReport #description{
            width: 70px;
        }

        #eventReport #date{
            width:50px;
        }

        #eventReport #location{
            width:70px;
        }

        #eventReport #starttime{
            width:70px;
        }

        #eventReport #endtime{
            width:70px;
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

        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 105pt;

        }

        h1{
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

        #PrintButton{
            position: absolute;
            top: 100px;
            left :40px;
            font-size: 1.5em;
        }

</style>
    </head>

    <body>

    <h1 id="sch">D.S.Senanayake College</h1>
    <h2>Gregory's Road, Colombo 07, Sri Lanka.</h2>
    <h3>Event Report</h3>

    <div class="" id="general" style="">



            <form method="get">
                <table id="info">
                    <tr>
                    <th>
                        <img id="flag" src="/images/abc.jpg"/>


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

               if(isFilled($result))
               {
                   foreach($result as $row){
                       $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                       echo $top;
                       echo "<td id='eventName'>$row[0]</td>";
                       echo "<td id='description'>$row[1]</td>";
                       echo "<td id='date'>$row[2]</td>";
                       echo "<td id='location'>$row[3]</td>";
                       echo "<td id='starttime'>$row[4]</td>";
                       echo "<td id='endtime'>$row[5]</td>";
//                    echo "<td>$row[6]</td>";





                      echo "</tr>";
                   }
               }
               else
               {
                   echo "<tr><td colspan='6'>No Data Found</td></tr>";
               }



                ?>





            </table>
        </div>
        <button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>
    </body>
</html>
