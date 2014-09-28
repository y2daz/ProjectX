<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 9/26/14
 * Time: 7:02 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();

if(isset($_GET["id"]))
{
    $StaffId=$_GET["id"];
}else{
    $StaffId="";
}

?>



<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <style type="text/css">
        #flag {
            position: absolute;
            left: 440px;
            top:100px;
            width: 120px;
            height: 120px;
        }

        #sch{
            position:relative;
            font-size: 24pt;
            text-align: center;
            left:10pt;
            top: 170pt;

        }

        #hd{
            position: relative;
            font-size: 14pt;
            text-align: center;
            bottom: -50px;
            top: -60pt;
            left: 10pt;



        }

        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 170pt;

        }

        .leaveTable
        {
            position: absolute;
            left:400px;
            top:400px;
            width: 200px;
        }

        .leaveTable2
        {
            position: absolute;
            left: 200px;
            top: 480px;

        }

    </style>


</head>
<body>

<h1 id="sch">D.S.Senanayake College</h1>
<h2>Gregory's Road, Colombo 07, Sri Lanka.</h2>
<h1 id="sch">Staff Leave Report</h1>
<form method="get">

    <img id="flag" src="/images/abc.jpg"/>

</form>

<body>

<table class="leaveTable">

    <?php

    $result = getStaffMember($StaffId);

    $i = 1;


    if (!isFilled($result))
    {
        echo "<style> .leaveTable{display: none} </style>";
        echo "<tr><td colspan='2'>There are no Leave Requests.</td></tr>";
        //sendNotification("There are no records to show.");
    }
    else
    {
        foreach($result as $row){
            $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

            echo $top;
                echo "<td style='font-weight: bold'> Staff ID </td>";
                echo "<td style='text-align: right'> $row[0] </td>";
            echo "</tr>";

            echo "<tr>";
                echo "<td style='font-weight: bold'> Name </td>";
                echo "<td style='text-align: right'> $row[1] </td>";
            echo "</tr>";
        }
    }
    ?>
</table>

<table class="leaveTable2">

    <th>Requested Date</th>
    <th>Start Date</th>
    <th>End Date</th>
    <th>Leave Type</th>
    <th>Other Information</th>
    <th>Approval Status</th>


    <?php

    $result = getLeave($StaffId);

    $i = 1;


    if (!isFilled($result))
    {
        echo "<style> .leaveTable2{display: none} </style>";

        echo "<tr><td colspan='5'>There are no Leave Requests.</td></tr>";
        //sendNotification("There are no records to show.");
    }
    else
    {
        foreach($result as $row){
            $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

            echo $top;
            echo "<td>$row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";

            if($row[4] == 0)
            {
                $LeaveType = "Official";
            }
            else if($row[4] == 1)
            {
                $LeaveType = "Maternity";
            }
            else if($row[4] == 2)
            {
                $LeaveType  = "Other";
            }
            else
            {
                $LeaveType = "";
            }

            echo "<td>$LeaveType</td>";

            echo "<td>$row[5]</td>";

            if($row[6] == 0)
            {
               $LeaveStatus = "Pending";
            }
            else if($row[6] == 1)
            {
                $LeaveStatus = "Approved";
            }
            else if($row[6] == 2)
            {
                $LeaveStatus = "Rejected";
            }
            else
            {
                $LeaveStatus = "";
            }

            echo "<td> $LeaveStatus </td>";

            echo '</tr>';

        }
    }
    ?>


</table>

</body>


</html>



