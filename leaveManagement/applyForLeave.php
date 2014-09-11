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


    if(isset($_GET["StaffID"]))
    {
        $_POST["newStaffID"] = $_GET["StaffID"];
    }

    function insertLeaveFunc()
    {
        $operation = insertLeave($_POST["staffid"], $_POST["startdate"], $_POST["enddate"], $_POST["leavetype"], $_POST["otherreasons"]);
        $success = "Leave Request Sent!";
        $fail = "Request Failed!";

        if($operation)
        {
            sendNotification($success);
        }
        else
        {
            sendNotification($fail);
        }
    }

    if (isset($_POST["ApplyforLeave"])) //user has clicked the button to apply leave
    {

        $checkStaffMember = checkStaffMember($_POST["staffid"]);

        if(is_numeric($_POST["staffid"]) )
        {

            if($checkStaffMember)
            {
                $result = getLeaveData($_POST["staffid"]);

                foreach($result as $row)
                {
                    $OfficialLeave = $row[0];
                    $MaternityLeave = $row[1];
                    $OtherLeave = $row[2];
                }


                if($_POST["leavetype"] == 1)
                {
                    if($OfficialLeave < 1)
                    {
                        sendNotification("You are out of Official Leave days!");
                    }
                    else
                    {
                        insertLeaveFunc();
                    }
                }
                else if ($_POST["leavetype"] == 2)
                {
                    if($MaternityLeave < 1)
                    {
                        sendNotification("You are out of Maternity Leave days!");
                    }
                    else
                    {
                        insertLeaveFunc();
                    }

                }
                else if ($_POST["leavetype"] == 3)
                {
                    if($OtherLeave < 1)
                    {
                        sendNotification("You are out of Other Leave days!");
                    }
                    else
                    {
                        insertLeaveFunc();
                    }
                }
            }
            else
            {
                sendNotification("Staff Member Does Not Exist!");
            }

        }
        else
        {
            sendNotification("Invalid Staff ID Entered");
        }
    }

    $OfficialLeave = "";
    $MaternityLeave = "";
    $OtherLeave = "";


    if (isFilled($_POST["newStaffID"])){

        $result = getLeaveData($_POST["newStaffID"]);

        foreach($result as $row)
        {
            $OfficialLeave = $row[0];
            $MaternityLeave = $row[1];
            $OtherLeave = $row[2];
            $StaffName = $row[3];
        }

        if($OfficialLeave < 0)
        {
            $OfficialLeave = 0;
        }
        else if ($MaternityLeave < 0)
        {
            $MaternityLeave = 0;
        }
        else if ($OtherLeave < 0)
        {
            $OtherLeave = 0;
        }

//        echo $OfficialLeave;
//        echo $MaternityLeave;
//        echo $OtherLeave;
//        echo $StaffName;

        $StaffColour = "tb1GREEN";
        $staffIdVal = $_POST["newStaffID"];
        $startDateVal = $_POST["startDate"];
        $endDateVal = $_POST["endDate"];
        $leaveTypeVal = $_POST["leaveType"];
        $otherReasonsVal = $_POST["otherReasons"];

    }else{

        $StaffColour = "tb1WHITE";
        $staffIdVal = "";
        $startDateVal = "";
        $endDateVal = "";
        $leaveTypeVal = "";
        $otherReasonsVal = "";
        $OfficialLeave = "";
        $MaternityLeave = "";
        $OtherLeave = "";
        $StaffName = "";
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
    }
    else
    {
        $staffid = "Staff ID";
        $startdate = "Start Date";
        $enddate ="End Date";
        $leavetype ="Leave Type";
        $otherreasons="Other Reasons";
        $officialleavecombo = "Official Leave";
        $maternityleavecombo = "Maternity Leave";
        $otherleavecombo = "Other Leave";
        $applyforleave = "Apply for Leave";
        $reset ="Reset";
        $getleavedata = "Get Leave Data";
        $enterdetails = "Enter Details";
        $availableleavedays ="Available Leave Days";
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
            #output
            {
                border-collapse: collapse;
            }
            .insert
            {
                position:absolute;
                left:40px;
                top: 100px;
            }
            .insert2
            {
                position: absolute;
                left: 535px;
                top: 150px;

            }
            .insert2 th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
                min-width: 30px;
            }

            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
            ;
            }

            .insert td
            {
                padding:10px;
            }

            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;

            }

            .tb1GREEN{
                background-color : #BCED91;
                border: 1px solid #008000;
                text-align: center;
                font-weight: 600;

            }

            .tb1WHITE{
                background-color : #ffffff;
                text-align: center;
                font-weight: 600;
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

            });

        </script>


    </head>
    <body>
            <h1>Apply For Leave</h1>

            <form class="insert" method="post">

                <table id="details">
                    <tr><th><?php echo $enterdetails ?><th></th> <th></th> </tr>

                    <tr>
                        <td><?php echo $staffid ?></td>
                        <td><input type="text" id="StaffID" name="staffid" value="<?php echo $staffIdVal ?>" required="true" tabindex="1"/></td>
                        <td><input type="button" name="searchstaffid" value="<?php echo $searchstaffid ?>" onclick="location.href='../leaveManagement/searchStaffID.php'"></td>
                    </tr>
                    <tr>
                        <td><?php echo $staffname ?></td>
                        <td><input class="<?php echo $StaffColour ?>" type="text" name="staffname" value="<?php echo $StaffName ?>" required="true" readonly>
                    </tr>
                    <tr>
                        <td><?php echo $startdate ?></td>
                        <td><input type="date" name="startdate" required="true"  value="<?php echo $startDateVal ?>" tabindex="2"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $enddate ?></td>
                        <td><input type="date" name="enddate" required="true" value="<?php echo $endDateVal ?>" tabindex="3"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $leavetype ?></td>
                        <td><select name="leavetype" required="true" tabindex="4">
                                <option value="1" selected="<?php echo ($leaveTypeVal == 1? "selected": ""); ?>"><?php echo $officialleavecombo ?></option>
                                <option value="2" selected="<?php echo ($leaveTypeVal == 2? "selected": ""); ?>"><?php echo $maternityleavecombo ?></option>
                                <option value="3" selected="<?php echo ($leaveTypeVal == 3? "selected": ""); ?>"><?php echo $otherleavecombo ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $otherreasons ?></td>
                        <td><textarea name="otherreasons" rows="3" cols="25" draggable="false" tabindex="5" style="resize:none" tabindex="4"><?php echo $otherReasonsVal ?></textarea></td>
                    </tr>
                </table>

                <table class="insert2" id="output">

                    <tr><th><?php echo $availableleavedays ?> <th></th></tr>

                    <tr>
                        <td><?php echo $officialleavecombo ?></td>
                        <td class="<?php echo $StaffColour ?>"> <?php echo $OfficialLeave ?> </td>
                    </tr>

                    <tr>
                        <td><?php echo $maternityleavecombo ?></td>
                        <td class="<?php echo $StaffColour ?>"> <?php echo $MaternityLeave ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $otherleavecombo ?></td>
                        <td class="<?php echo $StaffColour ?>"> <?php echo $OtherLeave ?></td>
                    </tr>

                </table>

                <br />

                <p align="center">
                    <input type="submit" name="ApplyforLeave" value="<?php echo $applyforleave ?>" id="submitme" tabindex="5">
                    <input type="button" name="Reset" value="<?php echo $reset ?>" tabindex="6" onclick="location.href='../leaveManagement/applyForLeave.php'">
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
