<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 19/07/14
 * Time: 17:04
 */

    require_once("../formValidation.php");
    require_once("../dbAccess.php");

    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
    define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

    require_once(THISROOT . "/common.php");

    ob_start();

    $displaytable = "none";
    $displaygrid = "block";

    if(isset($_POST["reject"]))
    {
        $Principal = null;

        $operation = rejectLeave($_POST["staffid"], $_POST["startdate"], null);

        if($operation)
        {
            sendNotification("Leave Request Rejected!", "approveLeave.php");
        }
        else
        {
            sendNotification("Leave Request Rejection Failed!");
        }
    }

    if(isset($_POST["approve"]))
    {
        if(! $_POST["staffid"] == "")
        {
            if(is_numeric($_POST["staffid"]))
            {
                $operation = approveLeave($_POST["staffid"], $_POST["startdate"]);

                $success = "Leave Approved!";
                $fail = "Approval Failed!";

                if($operation)
                {
                    sendNotification($success, "approveLeave.php");
                }
                else
                {
                    sendNotification($fail);
                }
            }
            else
            {
                sendNotification("Invalid Staff ID");
            }

        }
        else
        {
            sendNotification("Please enter Staff ID");
        }


    }

    $staffId = "";
    $name = "";
    $startDate = "";
    $endDate = "";
    $leavetypeexpand = "";
    $reason = "";
    $noOfCasualLeave = "";
    $noOfMedicalLeave = "";
    $noOfDutyLeave = "";
    $ContactNumber = "";

    if (isset($_GET["expand"]))
    {
        if (isset($_GET["sdate"]))
        {
            $displaytable = "block";

            $result = getStaffLeavetoApprove($_GET["expand"], $_GET["sdate"]);

            if (isFilled($result))
            {
                $row = $result[0];

                $staffId  = $row[0];
                $name = $row[1];
                //Request Date $row[2]
                $startDate = $row[3];
                $endDate = $row[4];
                //status row[5]
                $reason = $row[6];
                $noOfCasualLeave = $row[7];
                $noOfMedicalLeave = $row[8];
                $noOfDutyLeave = $row[9];
                $ContactNumber = $row[10];
            }
        }
    }

    if($_COOKIE["language"] == 1)
    {
        $staffidlang = "අනුක්‍රමික අංකය";
        $namelang = "නම";
        $startdatelang = "අරාම්භක දිනය";
        $enddatelang ="අවසාන දිනය";
        $leavetypelang ="නිවාඩු  වර්ගය";
        $otherreasonslang ="වෙනත් හේතු";
        $officialleavecombo = "රාජකාරි  නිවාඩු";
        $maternityleavecombo = "මාතෘ  නිවාඩු";
        $otherleavecombo = "වෙනත් නිවාඩු";
        $applyforleavelang = "නිවාඩු  ඉල්ලුම්කිරිම";
        $resetlang = "නැවත  සකසන්න";
        $getleavedatalang= "නිවාඩු  දත්ත ගැනීමට";
        $enterdetailslang = "තොරතුරු  ඇතුලත් කරන්න";
        $availableleavedayslang = "ඉතුරු  නිවාඩු  දින";
        $requestdatelang = "දිනය ඉල්ලුම්කිරිම";
        $statuslang = "නිවාඩු  තත්වය";
        $approvelang = "අනුමත කරනවා";
        $rejectlang ="ප්‍රතික්ෂේප කරනවා";
        $contactnumberlang = "දුරකථන අංකය";
    }
    else
    {
        $staffidlang = "Staff ID";
        $namelang = "Name";
        $startdatelang = "Start Date";
        $enddatelang ="End Date";
        $leavetypelang ="Leave Type";
        $otherreasonslang ="Other Reasons";
        $officialleavecombo = "Official Leave";
        $maternityleavecombo = "Maternity Leave";
        $otherleavecombo = "Other Leave";
        $applyforleavelang = "Apply for Leave";
        $resetlang ="Reset";
        $getleavedatalang = "Get Leave Data";
        $enterdetailslang = "Enter Details";
        $availableleavedayslang ="Available Leave Days";
        $requestdatelang="Requested Date";
        $statuslang = "Leave Status";
        $approvelang  = "Approve";
        $rejectlang = "Reject";
        $contactnumberlang = "Contact Number";
    }

?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            .leaveTable {
                border-spacing:0px 5px;
                min-width: 500px;
            }
            #searchCriteria{
                position:relative;
                left:20px;
                top:20px;
            }
            .leaveTable th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:5px;
            }
            .leaveTable td {
                text-align: center;
                padding:5px;
            }
            .leaveTable .left{
                text-align: left;
            }
            .leaveTable .alt{
                background-color: #bed9ff;
            }
            .details td{
                text-align: left;
            }
            .viewTable{
                display: <?php echo $displaytable ?>
            }
            .viewGrid{
                display: <?php echo $displaygrid ?>
            }
        </style>
    </head>
    <body>
        <h1 align="center"> Approve Leave </h1>
        <br />

        <form method="post" class="viewGrid">
            <table class="leaveTable" align="center">
                <tr>
                    <th>Staff ID</th>
                    <th>Name with Initials</th>
                    <th>No of Days</th>
                    <th>Date Range</th>
<!--                    <th>Date Assuming Duty</th>-->
<!--                    <th>Reason</th>-->
<!--                    <th>Contact Number</th>-->
                    <th>&nbsp;</th>
                </tr>

                <?php
                $result = getAllLeaveToApprove();
                $i = 1;

                if (!isset($result)){
                    echo "<tr><td colspan='6'>There are no Leave Requests.</td></tr>";
                    //sendNotification("There are no records to show.");
                }
                else{
                    foreach($result as $row){
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td> " . ( $row[2] + $row[3] + $row[4] + $row[5] ) . "</td>";
                        echo "<td>$row[7] to $row[8]</td>";
                        echo "<td><input name=\"Expand\" type=\"Submit\" value=\"Expand\" formaction=\"approveLeave.php?expand=" . $row[0] . "&sdate=" . $row[5] . "\" /> </td> ";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </form>

            <br />
            <br />

        <form method="post" class="viewTable">
            <table class="details" align="center">
                <tr>
                    <td>Staff ID</td>
                    <td > <input type = "text" name="staffid" value="<?php echo $staffId ?>"/ readonly> </td>
                </tr>

                <tr>
                    <td>Name with Initials</td>
                    <td> <input type = "text" name="name" value="<?php echo $name ?>"/ readonly> </td>
                </tr>

                <tr>
                    <td><?php echo $startdatelang ?></td>
                    <td ><input type="date" name="startdate" value="<?php echo $startDate ?>"/ readonly></td>
                </tr>


                <tr>
                    <td><?php echo $enddatelang ?></td>
                    <td > <input type="date" name="enddate" value="<?php echo $endDate ?>" / readonly> </td>
                </tr>

                <tr>
                    <td> <?php echo $leavetypelang ?>  </td>
                    <td > <input type = "text" name="leavetype" value="<?php echo $leavetypeexpand ?>"/ readonly> </td>
                </tr>

                <tr>
                    <td><?php echo $otherreasonslang ?></td>
                    <td > <input type = "textarea" name="otherreasons" value="<?php echo $reason ?>"/ readonly> </td>
                </tr>

                <tr>
                    <td><?php echo $officialleavecombo ?></td>
                    <td > <input type="text" name="officialleave" value="<?php echo $noOfCasualLeave . " Days" ?>" </td>
                </tr>

                <tr>
                    <td><?php echo $maternityleavecombo ?></td>
                    <td > <input type="text" name="maternityleave" value="<?php echo $noOfMedicalLeave . " Days" ?>" </td>
                </tr>

                <tr>
                    <td><?php echo $otherleavecombo ?></td>
                    <td > <input type="text" name="otherleave" value="<?php echo $noOfDutyLeave . " Days" ?>" </td>
                </tr>

                <tr>
                    <td><?php echo $contactnumberlang ?></td>
                    <td > <input type="text" name="contactnumber" value="<?php echo $ContactNumber ?>" </td>
                </tr>

            </table>

            <br />
            <br />

            <table align="center">
                <tr>
                    <td> <input type="submit" name="approve" style="width: 110px" value="<?php echo $approvelang ?>"> </td>
                    <td> <input type="submit" name="reject"  style="width: 110px" value="<?php echo $rejectlang ?>">  </td>
<!--                    <td> <input type="reset" name="reset" value="Reset" onclick=""> </td>-->
                </tr>
            </table>

        </form>
    </body>
</html>
<?php
    //Assign all Page Specific variables
    $fullPageHeight = 1100;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Approve Leave";

    $pageContent = ob_get_contents();
    ob_end_clean();

    //Apply the template
    require_once(THISROOT . "/Master.php");
?>

