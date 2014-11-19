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

    $exStaffId = "";
    $exName = "";
    $exDesignation = "";
    $exSection = "";
    $exNoOfCasualLeave = 0;
    $exNoOfMedicalLeave = 0;
    $exNoOfDutyLeave = 0;
    $exNoOfNoPayLeave = 0;
    $exNoOfCasualTaken = 0;
    $exNoOfMedicalTaken = 0;
    $exNoOfDutyTaken = 0;
    $exNoOfNoPayTaken = 0;
    $exRequestDate = "";
    $exStartDate = "";
    $exEndDate = "";
    $exAddressOnLeave = "";
    $exReason = "";
    $exContactNumber = "";
    $exNoOfTotalLeave = 0;
    $exNoOfTotalTaken = 0;

    $leavetypeexpand = "";

    if (isset($_GET["expand"])){
        $displaytable = "block";
        $displaygrid = "none";

        $fullPageHeight = 800;

        if (isset($_GET["sdate"])){
            $result = getStaffLeavetoApprove( $_GET["expand"], $_GET["sdate"] );

            if ( isset($result) ){
                $row = $result[0];
                $i = 0;

                $exStaffId  = $row[ $i++ ];
                $exNoOfCasualLeave = $row[ $i++ ];
                $exNoOfMedicalLeave = $row[ $i++ ];
                $exNoOfDutyLeave = $row[ $i++ ];
                $exNoOfNoPayLeave = $row[ $i++ ];
                $exRequestDate = $row[ $i++ ];
                $exStartDate = $row[ $i++ ];
                $exEndDate = $row[ $i++ ];
                $exAddressOnLeave = $row[ $i++ ];
                $exReason = $row[ $i++ ];

                $otherData = getFullLeaveData( $exStaffId );
                $row = $otherData[0];
                $i = 0;

                $exNoOfCasualTaken = $row[ $i++ ];
                $exNoOfMedicalTaken = $row[ $i++ ];
                $exNoOfDutyTaken = $row[ $i++ ];
                $exNoOfNoPayTaken = $row[ $i++ ];
                $exName = $row[ $i++ ];
                $exSection = $row[ $i++ ];
                $exDesignation = $row[ $i++ ];
                $exContactNumber = $row[ $i++ ];

                $exNoOfTotalLeave = $exNoOfCasualLeave + $exNoOfMedicalLeave + $exNoOfDutyLeave + $exNoOfNoPayLeave;
                $exNoOfTotalTaken = $exNoOfCasualTaken + $exNoOfMedicalTaken + $exNoOfDutyTaken + $exNoOfNoPayTaken;
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
            .leaveTable th, .viewTable th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:8px 15px 8px 15px;
            }
            .leaveTable td, .viewTable td{
                /*text-align: center;*/
                padding:7px;
            }
            .viewGrid{
                display: <?php echo $displaygrid ?>
            }
            .viewTable{
                display: <?php echo $displaytable ?>
            }
            .innerTable{
                min-width: 550px;
                border-collapse: collapse;
            }
            .innerTable th th{
                background-color: #ffffff;
            }
            .innerTable, .innerTable tr, .innerTable th, .innerTable td{
                border: 1px solid #005e77 ;
            }
            .left{
                text-align: left;
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

                if( !isset( $_GET["expand"]) ){
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
                            echo "<td><input name=\"Expand\" type=\"Submit\" value=\"Expand\" formaction=\"approveLeave.php?expand=" . $row[0] . "&sdate=" . $row[7] . "\" /> </td> ";
                            echo "</tr>";
                            echo ($i++ % 3 == 0 ? "<tr class=\"blank\">\n<td colspan='6'>&nbsp;</td>\n\t\t</tr>" : "");
                        }
                        //Print an mepty row at the end if not printed
                        echo ( ($i - 1) % 3 != 0 ? "<tr class=\"blank\">\n<td colspan='6'>&nbsp;</td>\n\t\t</tr>" : "");

                        $fullPageHeight = ( 400 + ($i * 28) );
                    }
                }

                ?>
            </table>
        </form>

        <form method="post" class="viewTable">
            <table class="details" align="center">
                <tr>
                    <th colspan="6">Leave application of <?php echo $exName ?></th>
                </tr>
                <tr>
                    <td>Staff ID</td>
                    <td > <input type = "text" name="staffid" value="<?php echo $exStaffId ?>"/ readonly> </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td> <input type = "text" name="name" value="<?php echo $exName ?>"/ readonly> </td>
                </tr>
                <tr>
                    <td>Section</td>
                    <td ><input type="text" name="section" value="<?php echo $exSection ?>"/ readonly></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td > <input type="text" name="designation" value="<?php echo $exDesignation ?>" / readonly> </td>
                </tr>

                <tr><td colspan="4">&nbsp;</td></tr>
                <tr>
                    <td colspan="3">
                        <table class="innerTable">
                            <tr>
                                <th>Days</th>
                                <!--                                    <th>Short</th>-->
                                <th>Casual</th>
                                <th>Medical</th>
                                <th>Duty</th>
                                <th>No Pay</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>Applying</td>
                                <!--                                    <td> <input id="noOfShort" class="changeNoDays" type="number" min="0" max="21" name="noOfShort" /> </td>-->
                                <td> <input id="noOfCasual" type="number" min="0" max="21" readonly value="<?php echo $exNoOfCasualLeave?>" /> </td>
                                <td> <input id="noOfMedical" type="number" min="0" max="20" readonly value="<?php echo $exNoOfMedicalLeave?>" /> </td>
                                <td> <input id="noOfDuty" type="number" min="0" max="99" readonly value="<?php echo $exNoOfDutyLeave?>" /> </td>
                                <td> <input id="noOfNoPay" type="number" min="0" max="99" readonly value="<?php echo $exNoOfNoPayLeave?>" /> </td>
                                <td> <input id="noOfTotal" type="number" min="1" max="366" readonly value="<?php echo $exNoOfTotalLeave ?>" /> </td>
                            </tr>
                            <tr>
                                <td>Taken</td>
                                <!--                                    <td> <input id="noOfShortTaken" type="number" min="0" max="21" name="noOfShortTaken" readonly value="--><?php //echo $CasualLeave ?><!--" /> </td>-->
                                <td> <input id="noOfCasualTaken" type="number" min="0" max="21" name="noOfCasualTaken" readonly value="<?php echo $exNoOfCasualTaken ?>" /> </td>
                                <td> <input id="noOfMedicalTaken" type="number" min="0" max="20" name="noOfMedicalTaken" readonly value="<?php echo $exNoOfMedicalTaken ?>" /> </td>
                                <td> <input id="noOfDutyTaken" type="number" min="0" max="99" name="noOfDutyTaken" readonly value="<?php echo $exNoOfDutyTaken ?>" /> </td>
                                <td> <input id="noOfNoPayTaken" type="number" min="0" max="99" name="noOfNoPayTaken" readonly value="<?php echo $exNoOfNoPayTaken ?>" /> </td>
                                <td> <input id="noOfTotalTaken" type="number" min="0" max="366" name="noTotalTaken" readonly value="<?php echo $exNoOfTotalTaken ?>" /> </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td> Address when on Leave  </td>
                    <td > <input type = "text" name="address" value="<?php echo $exAddressOnLeave ?>"/ readonly> </td>
                </tr>

                <tr>
                    <td>Reason</td>
                    <td > <input type = "textarea" name="otherreasons" value="<?php echo $exReason ?>"/ readonly> </td>
                </tr>
                <tr>
                    <td> Start Date </td>
                    <td > <input type="date" name="startDate" value="<?php echo $exStartDate?>" </td>
                </tr>

                <tr>
                    <td> Date Assuming Duty</td>
                    <td > <input type="date" name="endDate" value="<?php echo $exEndDate ?>" </td>
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
//    $fullPageHeight = 1100;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Approve Leave";

    $pageContent = ob_get_contents();
    ob_end_clean();

    //Apply the template
    require_once(THISROOT . "/Master.php");
?>

