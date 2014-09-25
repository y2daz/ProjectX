<?php

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once("../formValidation.php");
require_once("../dbAccess.php");
require_once(THISROOT . "/common.php");

error_reporting(E_ERROR | E_PARSE);

ob_start();

$view = "none";

if(isset($_POST["submit"]))
{
    $StaffID = $_POST["StaffID"];

    if(is_numeric($StaffID))
    {
        if(checkStaffMember($StaffID))
        {
            $result = checkLeaveStatus($StaffID);
            $view = "block";
        }
        else
        {
            sendNotification("Staff member does not exist");
        }
    }
    else
    {
        sendNotification("Invalid Staff ID");
    }
}

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                position: absolute;
                left: 245px;
                top: 10px;
            }

            .checkStaff{
                position: absolute;
                left: 50px;
                top: 110px;
            }

            .submitButton{
                position: absolute;
                left: 170px;
                top: 140px;
            }

            .viewTable{
                position: absolute;
                left: 230px;
                top: 230px;
                border-collapse: collapse;
                display: <?php echo $view ?>;
            }


            .viewTable th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:5px;
            }

            .viewTable td{
                text-align: center;
            }


        </style>
    </head>
    <body>

    <h1>Check Approval Status</h1>

    <form method="post">

        <table class="checkStaff">
            <tr>
                <td>Staff ID : </td>
                <td><input type="text" name="StaffID" value=""</td>
            </tr>
        </table>

        <input type="submit" name="submit" value="Check" class="submitButton">

        <table class="viewTable">

            <th>Requested Date</th>
            <th>Leave Type</th>
            <th>Approval Status</th>

            <?php

            if(! isFilled($result))
            {
                echo "<tr><td colspan='3'>No request data</td></tr>";
            }
            else
            {
                $i = 1;

                foreach($result as $row){
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                    $Status = "Pending";
                    $LeaveType = "Other";
                    $LeaveReason = $row[3];

                    if($row[1] == 0)
                    {
                        $Status = "Pending";
                    }
                    else if ($row[1] == 1)
                    {
                        $Status = "Approved";
                    }
                    else if($row[1] == 2)
                    {
                        $Status = "Rejected";
                    }

                    if($row[2] == 1)
                    {
                        $LeaveType = "Official Leave";
                    }
                    else if($row[2] == 2)
                    {
                        $LeaveType = "Maternity Leave";
                    }
                    else if($row[2] == 3)
                    {
                        $LeaveType = "Other Leave";
                    }


                    echo $top;
                    echo "<td> $row[0] </td>";
                    echo "<td> $LeaveType </td>";
                    echo "<td> $Status </td>";
                    echo "</tr>";
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
$pageTitle= "Check Leave Status";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>