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

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Leave Approval') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */

    $displaytable = "none";
    $displaygrid = "block";

    if(isset($_POST["reject"])){
        $operation = reviewLeave($_POST["staffId"], $_POST["startDate"], null, 2, true);

        if($operation){
            if( isset($_POST["sendSMS"]) ){
                $staffMember = getStaffMember( $_POST["staffId"], true );
                $contactNo = $staffMember[0][9];
                sendNotification("Leave Request Rejected!", "approveLeave.php");
                sendSMS( $contactNo, "Your leave starting on " . $_POST["startDate"] . " has been rejected. -Staff Management System" );
            }
            else{
                sendNotification("Leave Request Rejected!", "approveLeave.php");
            }
        }
        else{
            sendNotification("Error rejecting leave request.");
        }
    }

    if(isset($_POST["approve"])){
        $operation = reviewLeave($_POST["staffId"], $_POST["startDate"], NULL, 1, true);

//        $operation = true;

        if($operation){
            if( isset($_POST["sendSMS"]) ){
                $staffMember = getStaffMember( $_POST["staffId"], true );
                $contactNo = $staffMember[0][9];
                sendNotification( "Leave Approved! Sending SMS.", "approveLeave.php");
                sendSMS( $contactNo, "Your leave starting on " . $_POST["startDate"] . " has been approved. -Staff Management System" );
            }
            else{
                sendNotification( "Leave Approved!", "approveLeave.php");
            }
        }
        else{
            sendNotification( "Error approving leave request." );
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
            $result = getStaffLeavetoApprove( $_GET["expand"], $_GET["sdate"], false );

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

                $otherData = getFullLeaveData( $exStaffId, true );
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

                $exNoOfTotalLeave = $exNoOfCasualLeave + $exNoOfMedicalLeave + $exNoOfNoPayLeave;
                $exNoOfTotalTaken = $exNoOfCasualTaken + $exNoOfMedicalTaken + $exNoOfNoPayTaken;
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
            input[type="submit"] {
                width: 110px;
            }
            .left{
                text-align: left;
            }
        </style>
        <script>
            $(document).ready(function(){

                $("#sbtApprove").on("click", function(){

                    var staffId = $("input[name='staffId']").val();
                    var startDate = $("input[name='startDate']").val();

                    reviewLeave( staffId, startDate, 1 );

                });

                $("#sbtReject").on("click", function(){

                    var staffId = $("input[name='staffId']").val();
                    var startDate = $("input[name='startDate']").val();

                    reviewLeave( staffId, startDate, 2 );
                });
            });
        </script>
    </head>
    <body>
        <h1> Leave Pending Approval  </h1>
        <br />

        <form method="post" class="viewGrid">
            <table class="leaveTable" align="center">
                <tr>
                    <th>Serial No</th>
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
                            echo "<td> " . getStaffNo( $row[0] ) . "</td>";
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
                    <td>Serial No</td>
                    <td > <input type = "text" name="staffId" value="<?php echo getStaffNo( $exStaffId ) ?>"/ readonly> </td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td> <input type = "text" value="<?php echo $exName ?>"/ readonly> </td>
                </tr>
                <tr>
                    <td>Section</td>
                    <td ><input type="text" value="<?php echo $exSection ?>"/ readonly></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td > <input type="text" value="<?php echo $exDesignation ?>" / readonly> </td>
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
                                <td> <input id="noOfCasualTaken" type="number" min="0" max="21" readonly value="<?php echo $exNoOfCasualTaken ?>" /> </td>
                                <td> <input id="noOfMedicalTaken" type="number" min="0" max="20" readonly value="<?php echo $exNoOfMedicalTaken ?>" /> </td>
                                <td> <input id="noOfDutyTaken" type="number" min="0" max="99" readonly value="<?php echo $exNoOfDutyTaken ?>" /> </td>
                                <td> <input id="noOfNoPayTaken" type="number" min="0" max="99" readonly value="<?php echo $exNoOfNoPayTaken ?>" /> </td>
                                <td> <input id="noOfTotalTaken" type="number" min="0" max="366" readonly value="<?php echo $exNoOfTotalTaken ?>" /> </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td> Address when on Leave  </td>
                    <td > <input type = "text" value="<?php echo $exAddressOnLeave ?>" readonly /> </td>
                </tr>

                <tr>
                    <td>Reason</td>
                    <td > <input type = "textarea" value="<?php echo $exReason ?>" readonly /> </td>
                </tr>
                <tr>
                    <td> Start Date </td>
                    <td > <input type="date" name="startDate" value="<?php echo $exStartDate?>" readonly /> </td>
                </tr>

                <tr>
                    <td> Date Assuming Duty</td>
                    <td > <input type="date" value="<?php echo $exEndDate ?>" readonly /></td>
                </tr>
            </table>

            <br />
            <br />

            <table align="center">
                <tr>
                    <td> <input id="sbtApprove" type="button" name="approve" value="<?php echo $approvelang ?>"> </td>
                    <td> <input id="sbtReject" type="button" name="reject"  value="<?php echo $rejectlang ?>">  </td>
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

