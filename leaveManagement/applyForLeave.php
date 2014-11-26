<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 19/07/14
 * Time: 17:04
 */

    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
    require_once(THISROOT . "/common.php");
    include(THISROOT . "/dbAccess.php");

    ob_start();

    error_reporting(E_ERROR | E_PARSE);

    $staffIdVal = "";
    $sectionVal = "";
    $designationVal = "";

    if( isset( $_GET["StaffID"] ) ){
        $_POST["newStaffID"] = $_GET["StaffID"];
    }

    function insertFullLeaveFunc(){
        $operation = insertFullLeave($_POST["staffid"], $_POST["noOfCasual"], $_POST["noOfMedical"], $_POST["noOfDuty"],  $_POST["noOfNoPay"], $_POST["startDate"], $_POST["endDate"],
            $_POST["addressOnLeave"], $_POST["reason"]);
        $success = "Leave Request Sent!";
        $fail = "Error sending leave request.";

        if($operation){
            sendNotification($success);
        }
        else{
            sendNotification($fail);
        }
    }

    function insertOtherLeaveFunc(){
        $operation = insertOtherLeave( $_POST["staffid"], $_POST["otherLeaveType"], $_POST["leaveDate"], $_POST["otherReason"] );
        if($operation){
            sendNotification("Leave request sent.");
        }
        else{
            sendNotification("Error sending leave request.");
        }
    }

    if (isset($_POST["ApplyFull"])) //user has clicked the button to apply full leave
    {
        $checkStaffMember = checkStaffMember($_POST["staffid"]);
        if($checkStaffMember){
//            $result = getFullLeaveData( $_POST["staffid"] );
//
//            $row = $result[0];
//
//            $CasualLeave = $row[0];
//            $MedicalLeave = $row[1];
//            $DutyLeave = $row[2];

            if( isset ( $_POST["startDate"] ) && isFilled( $_POST["startDate"] ) ){
                if( isset ( $_POST["endDate"] ) && isFilled( $_POST["endDate"] ) ){
                    insertFullLeaveFunc();
                }
            }
        }
        else{
            sendNotification("Staff Member Does Not Exist!");
        }
    }
    elseif ( isset( $_POST[ "ApplyOther" ] ) ){ //user has clicked the button to apply short leave
        $checkStaffMember = checkStaffMember($_POST["staffid"]);
        if($checkStaffMember){
            insertOtherLeaveFunc();
        }
        else{
            sendNotification("Staff Member Does Not Exist!");
        }
    }

    $CasualLeave = "";
    $MedicalLeave = "";
    $DutyLeave = "";
    $NoPayLeave = "";

    $i = 0;
    for( $i = 0; $i < 3; $i++ ){
//        for( $x = 0; $x < 2; $x++ ){
            $arrOtherLeave[$i] = 0;
//        }
    }

    if (isset($_POST["newStaffID"])){

        $result = getFullLeaveData($_POST["newStaffID"]);

        foreach($result as $row)
        {
            $CasualLeave = $row[0];
            $MedicalLeave = $row[1];
            $DutyLeave = $row[2];
            $NoPayLeave = $row[3];
            $StaffName = $row[4];
            $sectionVal = $row[5];
            $designationVal = $row[6];
        }

        $staffIdVal = $_POST["newStaffID"];
        $CasualLeave = ($CasualLeave < 0 ? 0 : $CasualLeave);
        $MedicalLeave = ($MedicalLeave < 0 ? 0 : $MedicalLeave);
        $DutyLeave = ($DutyLeave < 0 ? 0 : $DutyLeave);

//        $enteredDate = date_create( $_POST["leaveDate"] );

//        echo "date creat = " . date_create( $_POST["leaveDate"] ) . "<br /";

        $month = ( isset( $_POST["leaveDate"] ) ? date( "m", strtotime( $_POST["leaveDate"] ) ) : NULL );
//        echo "Entered month = $month";

        $otherResult = getOtherLeaveData( $_POST["newStaffID"], $month );

        for( $i = 0; $i < 3; $i++ ){
            $otherResult[ $i ][ 1 ] = isset( $otherResult[ $i ][ 1 ] ) ? $otherResult[ $i ][ 1 ] : 0;
        }
        $arrOtherLeave = array( $otherResult[0][1], $otherResult[1][1], $otherResult[2][1]);
    }


    if($_COOKIE["language"] == 1)
    {
        $staffid = "අනුක්‍රමික අංකය";
        $startdate = "අරාම්භක දිනය";
        $enddate ="අවසාන දිනය";
        $leavetype ="නිවාඩු  වර්ගය";
        $otherreasons="වෙනත් හේතු";
        $officialleavecombo = "රාජකාරි  නිවාඩු";
        $maternityleavecombo = "මාතෘ  නිවාඩු";
        $otherleavecombo = "වෙනත් නිවාඩු";
        $applyforleave = "නිවාඩු  ඉල්ලුම්කිරිම";
        $reset = "නැවත  සකසන්න";
        $getleavedata= "නිවාඩු  දත්ත ගැනීමට";
        $enterdetails = "තොරතුරු  ඇතුලත් කරන්න";
        $availableleavedays = "ඉතුරු  නිවාඩු  දින";
        $staffname = "නම";
        $searchstaffid = "අනුක්‍රමික අංකය සොයන්න";
    }
    else
    {
        $staffid = "Staff ID";
        $startdate = "Start Date";
        $enddate ="Date Assuming Duty";
        $leavetype ="Leave Type";
        $otherreasons="Other Reasons";
        $officialleavecombo = "Official Leave";
        $maternityleavecombo = "Maternity Leave";
        $otherleavecombo = "Other Leave";
        $applyforleave = "Apply";
        $reset ="Reset";
        $getleavedata = "Get Leave Data";
        $enterdetails = "Enter Details";
        $availableleavedays ="No. of Available Days";
        $staffname = "Name";
        $searchstaffid = "Search Staff ID";
    }
?>

<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                text-align: center;
            }
            #details{
                border-collapse: collapse;
            }
            #output{
                border-collapse: collapse;
            }
            .insert{
                position:absolute;
                left:40px;
                top: 100px;
            }
            .insert2{
                position: absolute;
                left: 535px;
                top: 150px;
            }
            .insert2 th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
                min-width: 30px;
            }
            .insert th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;

            }
            .insert td{
                padding:10px;
            }
            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }
            textarea[name="reason"], textarea[name="otherReason"], input[name="addressOnLeave"]{
                width: 345px;
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
            .center{
                text-align: center;
            }
            .left{
                text-align: left;
                margin-left: 10%;
            }
            .strong{
                font-weight: 700;
            }
        </style>

        <script>
            $(document).ready(function() {

                $("#StaffID").on("blur", function(){
//                   alert( $(this).val() );
                    var staffId = $(this).val();

//                    alert( staffId + "_" + startDate + "_" + endDate + "_" + leaveType + "_" + otherReasons);
                    var params = {"newStaffID" : staffId};
                    post(document.URL, params, "post");
                });

                $("#startDate")
                    .attr("min", getTodayDate())
                    .on("change", function(e){
                        $("#endDate").attr("min", $("#startDate").val() );
                });

                $(".changeNoDays")
                    .val("0")
                    .on("input", function(){
                        var total = parseInt( $("#noOfCasual").val() ) + parseInt( $("#noOfMedical").val() ) +
                            parseInt( $("#noOfNoPay").val() );
                        $("#noOfTotal").val( total );
                });

                var totalTaken = parseInt( $("#noOfCasualTaken").val() ) + parseInt( $("#noOfMedicalTaken").val() ) +
                    parseInt( $("#noOfNoPayTaken").val() );
                $("#noOfTotalTaken").val( totalTaken );

                $( "[name='leaveType']")
                    .on("change", function(){
                        var lType = $(this).attr("value");

                        if( lType == "full"){
                            $("#fullLeave").show();
                            $("#shortLeave").hide();
                        }
                        else{
                            $("#fullLeave").hide();
                            $("#shortLeave").show();
                        }
                    });

                <?php
                    $fL = '$("#rdFullLeave").';
                    $sL = '$("#rdShortLeave").';
                    $click = "click();";

                    echo isset( $_POST["leaveDate"] ) ? $sL . $click . "\n" : $fL . $click . "\n" ;
                ?>


                $("[name='leaveDate']").on("change", function(){
                    var staffId = $('#StaffID').val();
                    var leaveDate = $(this).val();
//                    alert( staffId + "_" + startDate + "_" + endDate + "_" + leaveType + "_" + otherReasons);
                    var params = {"newStaffID" : staffId, "leaveDate" : leaveDate};
                    post(document.URL, params, "post");
                });
            });

        </script>
    </head>
    <body>
        <h1>Apply for Leave</h1>

        <form class="insert" method="post" >

            <table id="details">
                <tr><th><?php echo $enterdetails ?><th></th> <th></th> </tr>

                <tr>
                    <td><?php echo $staffid ?></td>
                    <td><input type="text" id="StaffID" name="staffid" value="<?php echo $staffIdVal ?>" required="true" tabindex="1"/></td>
                    <td><input type="button" name="searchstaffid" value="<?php echo $searchstaffid ?>" onclick="location.href='../leaveManagement/searchStaffID.php'" /></td>
                </tr>
                <tr>
                    <td><?php echo $staffname ?></td>
                    <td><input type="text" name="staffname" value="<?php echo $StaffName ?>" required="true" readonly /></td>
                </tr>
                <tr>
                    <td>Section</td>
                    <td><input type="text" name="section" value="<?php echo $sectionVal ?>" required="true" readonly /></td>
                </tr>
                <tr>
                    <td>Designation</td>
                    <td><input type="text" name="designation" value="<?php echo $designationVal ?>" required="true" readonly /></td>
                </tr>
                <tr>
                    <td>
                        <label> <input id="rdShortLeave" type="radio" name="leaveType" value="short"  /> Less than one day </label>
                    </td>
                    <td>
                        <label> <input id="rdFullLeave" type="radio" name="leaveType" value="full"/> Other </label>
                    </td>
                </tr>
            </table>

            <div id="fullLeave">
                <table>
                    <tr>
                        <td><?php echo $startdate ?></td>
                        <td><input id="startDate" type="date" name="startDate"  value="" tabindex="2"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $enddate ?></td>
                        <td><input id="endDate" type="date" name="endDate" value="" tabindex="3"/></td>
                    </tr>
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
                                    <td> <input id="noOfCasual" class="changeNoDays" type="number" min="0" max="21" name="noOfCasual" /> </td>
                                    <td> <input id="noOfMedical" class="changeNoDays" type="number" min="0" max="20" name="noOfMedical" /> </td>
                                    <td> <input id="noOfDuty" class="changeNoDays" type="number" min="0" max="99" name="noOfDuty" /> </td>
                                    <td> <input id="noOfNoPay" class="changeNoDays" type="number" min="0" max="99" name="noOfNoPay" /> </td>
                                    <td> <input id="noOfTotal" type="number" min="1" max="366" name="noTotal" readonly /> </td>
                                </tr>
                                <tr>
                                    <td>Taken</td>
<!--                                    <td> <input id="noOfShortTaken" type="number" min="0" max="21" name="noOfShortTaken" readonly value="--><?php //echo $CasualLeave ?><!--" /> </td>-->
                                    <td> <input id="noOfCasualTaken" type="number" min="0" max="21" name="noOfCasualTaken" readonly value="<?php echo $CasualLeave ?>" /> </td>
                                    <td> <input id="noOfMedicalTaken" type="number" min="0" max="20" name="noOfMedicalTaken" readonly value="<?php echo $MedicalLeave ?>" /> </td>
                                    <td> <input id="noOfDutyTaken" type="number" min="0" max="99" name="noOfDutyTaken" readonly value="<?php echo $DutyLeave ?>" /> </td>
                                    <td> <input id="noOfNoPayTaken" type="number" min="0" max="99" name="noOfNoPayTaken" readonly value="<?php echo $NoPayLeave ?>" /> </td>
                                    <td> <input id="noOfTotalTaken" type="number" min="0" max="366" name="noTotalTaken" readonly /> </td>
                                </tr>
                            </table>

                        </td>
                    </tr>
                    <tr>
                        <td>Address when on Leave</td>
                        <td><input type="text" name="addressOnLeave" value="" /></td>
                    </tr>
                    <tr>
                        <td>Reason</td>
                        <td><textarea name="reason" rows="3" cols="25" draggable="false" tabindex="5" style="resize:none" tabindex="4"></textarea></td>
                    </tr>
                </table>


                <p align="center">
                    <input type="submit" name="ApplyFull" value="Apply" id="submitme" tabindex="5">
                    <input type="Reset" >
                </p>
            </div>

            <div id="shortLeave">
                <table>
                    <tr>
                        <td>Date</td>
                        <td><input id="leaveDate" type="date" name="leaveDate" value="<?php echo isset( $_POST["leaveDate"] ) ? $_POST["leaveDate"] : "" ;?>" tabindex="2"/></td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <table class="innerTable">
                                <tr>
                                    <?php

                                    $strMonth = isset( $_POST["leaveDate"] ) ? date( "F", strtotime( $_POST["leaveDate"] ) ) : date( "F" );

                                    ?>
                                    <th colspan="4"> <span class="left"> For month of <span class="strong"><?php echo $strMonth; ?></span></span> </th>
                                </tr>
                                <tr>
                                    <td>Applying</td>
                                    <td >
                                        <label> <input type="radio" name="otherLeaveType" value="1" checked/> Late </label> </td>
                                        <td><label> <input type="radio" name="otherLeaveType" value="2" checked/> Half Day</label></td>
                                        <td><label> <input type="radio" name="otherLeaveType" value="3" checked/> Short Leave</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Days taken this month</td>
                                    <td> <input id="noOfLateTaken" type="number" min="0" max="21" name="noOfLateTaken" readonly value="<?php echo $arrOtherLeave[0]?>"  /> </td>
                                    <td> <input id="noOfHalfDayTaken" type="number" min="0" max="21" name="noOfHalfDayTaken" readonly value="<?php echo $arrOtherLeave[1]?>" /> </td>
                                    <td> <input id="noOfShortLeaveTaken" type="number" min="0" max="21" name="noOfShortLeaveTaken" readonly value="<?php echo $arrOtherLeave[2]?>" /> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Reason</td>
                        <td><textarea name="otherReason" rows="3" cols="25" draggable="false" tabindex="5" style="resize:none" tabindex="4"></textarea></td>
                    </tr>
                </table>

                <br />
                <p align="center">
                    <input type="submit" name="ApplyOther" value="Apply" id="submitsomeoneelse" tabindex="5">
                    <input type="reset" >
                </p>
            </div>

            <div id="tooltip">
                <p id="message"></p>
            </div>

        </form>
    </body>
</html>

<?php
    //Assign all Page Specific variables
    $fullPageHeight = 900;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Apply for Leave";

    //Only change above

    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>
