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
            left: 290px;
            top:10px;
            width: 120px;
            height: 120px;
        }

        .title
        {
            position: absolute;
            left: 205px;
            top: 150px;
            text-align: center;
        }


        .leaveTable
        {
            position: absolute;
            left:58px;
            top:300px;
            width: 250px;
        }

        .leaveTable2
        {
            position: absolute;
            left: 45px;
            top: 360px;
        }

        .leaveTable2 td
        {
            text-align: center;
        }

        .leaveTable2 th
        {
            width: 100px;
        }

    </style>


</head>
<body>

<table class="title">

    <tr>
        <td><h3>D.S.Senanayake College</h3></td>
    </tr>

    <tr>
        <td><h4>Gregory's Road, Colombo 07, Sri Lanka.</h4></td>
    </tr>

    <tr>
        <td><h3>Staff Leave Analysis Report</h3></td>
    </tr>

</table>

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
    <th>Approval Status</th>


    <?php

    $result = getLeave($StaffId);

    $i = 1;


    if (!isFilled($result))
    {
//        echo "<style> .leaveTable2{display: none} </style>";

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

            if($row[4] == 1)
            {
                $LeaveType = "Official";
            }
            else if($row[4] == 2)
            {
                $LeaveType = "Maternity";
            }
            else if($row[4] == 3)
            {
                $LeaveType  = "Other";
            }
            else
            {
                $LeaveType = "";
            }

            echo "<td>$LeaveType</td>";

//            echo "<td>$row[5]</td>";

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



