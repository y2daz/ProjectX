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

    if(isset($_POST["GetLeaveData"]))
    {
        $result = getLeaveData($_POST["staffid"]);

        foreach($result as $row)
        {
            $OfficialLeave = $row[0];
            $MaternityLeave = $row[1];
            $OtherLeave = $row[2];
        }
    }
    else
    {
        $OfficialLeave = "";
        $MaternityLeave = "";
        $OtherLeave = "";
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

        <script src="leave.js">

            function selectedvalue(data)
            {

                document.getElementById("check").value = data.value;
            }

        </script>


    </head>
    <body>
            <h1>Apply For Leave</h1>

            <form class="insert" method="post">

                <table id="details">


                    <tr><th><?php echo $enterdetails ?><th></th></tr>

                    <tr>
                        <td><?php echo $staffid ?></td>
                        <td><input type="text" id="StaffID" name="staffid" value="" required="true"/></td>
                    </tr>


                    <tr>
                        <td><?php echo $startdate ?></td>
                        <td><input type="date" name="startdate" required="true"/></td>
                    </tr>


                    <tr>
                        <td><?php echo $enddate ?></td>
                        <td><input type="date" name="enddate" required="true"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $leavetype ?></td>
                        <td><select name="leavetype" onchange="selectedvalue(this)" required="true">
                                <option value="1"><?php echo $officialleavecombo ?></option>
                                <option value="2"><?php echo $maternityleavecombo ?></option>
                                <option value="3"><?php echo $otherleavecombo ?></option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td><?php echo $otherreasons ?></td>
                        <td><textarea name="otherreasons" rows="3"; cols="25"; name="LeaveReasons"; draggable="false"; style="resize:none"></textarea></td>
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
