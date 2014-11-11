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

    function insertLeaveFunc()
    {
        $operation = insertLeave($_POST["staffid"], $_POST["noOfCasual"], $_POST["noOfMedical"], $_POST["noOfDuty"], $_POST["startDate"], $_POST["endDate"], $_POST["reason"]);
        $success = "Leave Request Sent!";
        $fail = "Request Failed!";

        if($operation){
            sendNotification($success);
        }
        else{
            sendNotification($fail);
        }
    }

    if (isset($_POST["ApplyforLeave"])) //user has clicked the button to apply leave
    {
        $checkStaffMember = checkStaffMember($_POST["staffid"]);

        if($checkStaffMember)
        {
            $result = getLeaveData( $_POST["staffid"] );

            $row = $result[0];

            $CasualLeave = $row[0];
            $MedicalLeave = $row[1];
            $DutyLeave = $row[2];

            insertLeaveFunc();
        }
        else
        {
            sendNotification("Staff Member Does Not Exist!");
        }
    }

    $CasualLeave = "";
    $MedicalLeave = "";
    $DutyLeave = "";

    if (isFilled($_POST["newStaffID"])){

        $result = getLeaveData($_POST["newStaffID"]);

        foreach($result as $row)
        {
            $CasualLeave = $row[0];
            $MedicalLeave = $row[1];
            $DutyLeave = $row[2];
            $StaffName = $row[3];
            $sectionVal = $row[4];
            $designationVal = $row[5];

        }

        $staffIdVal = $_POST["newStaffID"];
        $CasualLeave = ($CasualLeave < 0 ? 0 : $CasualLeave);
        $MedicalLeave = ($MedicalLeave < 0 ? 0 : $MedicalLeave);
        $DutyLeave = ($DutyLeave < 0 ? 0 : $DutyLeave);
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
            .innerTable{
                min-width: 500px;
                border-collapse: collapse;
            }
            .innerTable th th{
                background-color: #ffffff;
            }
            .innerTable, .innerTable tr, .innerTable th, .innerTable td{
                border: 1px solid #005e77 ;
            }
        </style>

        <script>
            $(document).ready(function() {

                $("#StaffID").on("blur", function(){
//                   alert( $(this).val() );
                    var staffId = $(this).val();
                    var startDate = $( "[name='startdate']").val();
                    var endDate = $( "[name='enddate']" ).val();
                    var leaveType = $( "[name='leavetype']" ).val();
                    var otherReasons = $( "[name='otherreasons']" ).val();

//                    alert( staffId + "_" + startDate + "_" + endDate + "_" + leaveType + "_" + otherReasons);
                    var params = {"newStaffID" : staffId, "startDate" : startDate, "endDate" : endDate, "leaveType" : leaveType, "otherReasons" : otherReasons};
                    post(document.URL, params, "post");
                });

                $("#startdate")
                    .attr("min", getTodayDate())
                    .on("change", function(e){
                        $("#enddate").attr("min", $("#startdate").val() );
                });



                $(".changeNoDays")
                    .val("0")
                    .on("input", function(){
                        var total = parseInt( $("#noOfCasual").val() ) + parseInt( $("#noOfMedical").val() ) + parseInt( $("#noOfDuty").val() );
                        $("#noOfTotal").val( total );
                });

                var totalTaken = parseInt( $("#noOfCasualTaken").val() ) + parseInt( $("#noOfMedicalTaken").val() ) + parseInt( $("#noOfDutyTaken").val() );
                $("#noOfTotalTaken").val( totalTaken );
            });

        </script>


    </head>
    <body>
        <h1><?php echo $applyforleave ?></h1>

        <form class="insert" method="post" action="applyForLeave.php">

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
                    <td colspan="3">
                        <table class="innerTable">
                            <tr>
                                <th>Days</th>
                                <th>Casual</th>
                                <th>Medical</th>
                                <th>Duty</th>
                                <th>Total</th>
                            </tr>
                            <tr>
                                <td>Applying</td>
                                <td> <input id="noOfCasual" class="changeNoDays" type="number" min="0" max="21" name="noOfCasual" /> </td>
                                <td> <input id="noOfMedical" class="changeNoDays" type="number" min="0" max="20" name="noOfMedical" /> </td>
                                <td> <input id="noOfDuty" class="changeNoDays" type="number" min="0" max="99" name="noOfDuty" /> </td>
                                <td> <input id="noOfTotal" type="number" min="1" max="366" name="noTotal" readonly /> </td>
                            </tr>
                            <tr>
                                <td>Taken</td>
                                <td> <input id="noOfCasualTaken" type="number" min="0" max="21" name="noOfCasualTaken" readonly value="<?php echo $CasualLeave ?>" /> </td>
                                <td> <input id="noOfMedicalTaken" type="number" min="0" max="20" name="noOfMedicalTaken" readonly value="<?php echo $MedicalLeave ?>" /> </td>
                                <td> <input id="noOfDutyTaken" type="number" min="0" max="99" name="noOfDutyTaken" readonly value="<?php echo $DutyLeave ?>" /> </td>
                                <td> <input id="noOfTotalTaken" type="number" min="0" max="366" name="noTotalTaken" readonly /> </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td>Reason</td>
                    <td><textarea name="reason" rows="3" cols="25" draggable="false" tabindex="5" style="resize:none" tabindex="4"><?php echo $otherReasonsVal ?></textarea></td>
                </tr>
                <tr>
                    <td><?php echo $startdate ?></td>
                    <td><input id="startdate" type="date" name="startDate" required="true"  value="<?php echo $startDateVal ?>" tabindex="2"/></td>
                </tr>
                <tr>
                    <td><?php echo $enddate ?></td>
                    <td><input id="enddate" type="date" name="endDate" required="true" value="<?php echo $endDateVal ?>" tabindex="3"/></td>
                </tr>
            </table>
            <br />

            <p align="center">
                <input type="submit" name="ApplyforLeave" value="<?php echo $applyforleave ?>" id="submitme" tabindex="5">
                <input type="button" name="Reset" value="<?php echo $reset ?>" tabindex="6" onclick="location.href='../leaveManagement/applyForLeave.php'" >
            </p>

        </form>
    </body>
</html>

<?php
    //Assign all Page Specific variables
    $fullPageHeight = 800;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Apply for Leave";

    //Only change above

    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>
