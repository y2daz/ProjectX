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


    if (isset($_POST["ApplyforLeave"])) //user has clicked the button to apply leave
    {
        if(is_numeric($_POST["staffid"]))
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
        else
        {
            sendNotification("Invalid Staff ID Entered");
        }
    }

//    if(isset($_POST["GetLeaveData"]))
//    {
//        $result = getLeaveData($_POST["staffid"]);
//
//        foreach($result as $row)
//        {
//            $OfficialLeave = $row[0];
//            $MaternityLeave = $row[1];
//            $OtherLeave = $row[2];
//        }
//    }
//    else
//    {
//        $OfficialLeave = "";
//        $MaternityLeave = "";
//        $OtherLeave = "";
//    }

    $OfficialLeave = "";
    $MaternityLeave = "";
    $OtherLeave = "";


    if (isFilled($_POST["newStaffID"])){
//        echo $_POST["newStaffID"];
        $result = getLeaveData($_POST["newStaffID"]);

        foreach($result as $row)
        {
            $OfficialLeave = $row[0];
            $MaternityLeave = $row[1];
            $OtherLeave = $row[2];
        }

        $staffIdVal = $_POST["newStaffID"];
        $startDateVal = $_POST["startDate"];
        $endDateVal = $_POST["endDate"];
        $leaveTypeVal = $_POST["leaveType"];
        $otherReasonsVal = $_POST["otherReasons"];

    }else{
        $staffIdVal = "";
        $startDateVal = "";
        $endDateVal = "";
        $leaveTypeVal = "";
        $otherReasonsVal = "";
    }

    /*
    echo $OfficialLeave;
    echo $MaternityLeave;
    echo $OtherLeave;
    */

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
                left: 500px;
                top: 100px;
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


        </style>

        <script>

//            function selectedvalue(data)
//            {
//                document.getElementById("check").value = data.value;
//            }


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


                    <tr><th><?php echo $enterdetails ?><th></th></tr>

                    <tr>
                        <td><?php echo $staffid ?></td>
                        <td><input type="text" id="StaffID" name="staffid" value="<?php echo $staffIdVal ?>" required="true"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $startdate ?></td>
                        <td><input type="date" name="startdate" required="true"  value="<?php echo $startDateVal ?>" /></td>
                    </tr>
                    <tr>
                        <td><?php echo $enddate ?></td>
                        <td><input type="date" name="enddate" required="true" value="<?php echo $endDateVal ?>" /></td>
                    </tr>
                    <tr>
                        <td><?php echo $leavetype ?></td>
                        <td><select name="leavetype" required="true" >
                                <option value="1" selected="<?php echo ($leaveTypeVal == 1? "selected": ""); ?>"><?php echo $officialleavecombo ?></option>
                                <option value="2" selected="<?php echo ($leaveTypeVal == 2? "selected": ""); ?>"><?php echo $maternityleavecombo ?></option>
                                <option value="3" selected="<?php echo ($leaveTypeVal == 3? "selected": ""); ?>"><?php echo $otherleavecombo ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><?php echo $otherreasons ?></td>
                        <td><textarea name="otherreasons" rows="3" cols="25" draggable="false" style="resize:none"><?php echo $otherReasonsVal ?></textarea></td>
                    </tr>

                </table>

                <table class="insert2" id="output">

                    <tr><th><?php echo $availableleavedays ?> <th></th></tr>

                    <tr>
                        <td><?php echo $officialleavecombo ?></td>
                        <td> <?php echo $OfficialLeave ?> </td>
                    </tr>

                    <tr>
                        <td><?php echo $maternityleavecombo ?></td>
                        <td> <?php echo $MaternityLeave ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $otherleavecombo ?></td>
                        <td> <?php echo $OtherLeave ?></td>
                    </tr>

                </table>

                <br />

                <p align="center">
                    <input type="submit" name="ApplyforLeave" value="<?php echo $applyforleave ?>" id="submitme">
                    <input type="reset" name="reset" value="<?php echo $reset ?>">
                    <input type="submit" name="GetLeaveData" value="<?php echo $getleavedata ?>">
                </p>

<!--                <input name="leavetype" id="check" value="OfficialLeave" >-->
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
