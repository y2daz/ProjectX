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

    if(isset($_POST["reject"]))
    {
        $Principal = "12345";

        $operation = rejectLeave($_POST["staffid"], $_POST["startdate"], null);

        if($operation)
        {
            sendNotification("Leave Request Rejected!");
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
                $Principal = null;

                $operation = approveLeave($_POST["staffid"], $_POST["startdate"], $_POST["enddate"], $_POST["leavetype"], $Principal);

                $success = "Leave Approved!";
                $fail = "Approval Failed!";

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
                sendNotification("Invalid Staff ID");
            }

        }
        else
        {
            sendNotification("Please enter Staff ID");
        }


    }

    $staffid = "";
    $name = "";
    $startdate = "";
    $enddate = "";
    $leavetypeexpand = "";
    $otherreasons = "";

    if (isset($_GET["expand"]))
    {
        if (isset($_GET["sdate"]))
        {
            $result = getStaffLeavetoApprove($_GET["expand"], $_GET["sdate"]);

            if (isFilled($result))
            {
                $row = $result[0];

                $staffid  = $row[0];
                $name = $row[1];
                $startdate = $row[5];
                $enddate = $row[6];
                $leavetypeexpand = $row[2];
                $otherreasons = $row[7];
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
    }
    else
    {
        $staffidlang = "Staff ID";
        $namelang = "Name";
        $startdatelang = "Start Date";
        $enddatelang ="End Date";
        $leavetypelang ="Leave Type";
        $otherreasonslang ="Other Reasons";
        $officialleavecombolang = "Official Leave";
        $maternityleavecombolang = "Maternity Leave";
        $otherleavecombolang = "Other Leave";
        $applyforleavelang = "Apply for Leave";
        $resetlang ="Reset";
        $getleavedatalang = "Get Leave Data";
        $enterdetailslang = "Enter Details";
        $availableleavedayslang ="Available Leave Days";
        $requestdatelang="Requested Date";
        $statuslang = "Leave Status";
        $approvelang  = "Approve";
        $rejectlang = "Reject";
    }

?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            table.leaveTable {
                border-spacing:0px 5px;
                min-width: 500px;
            }

            #searchCriteria{
                position:relative;
                left:20px;
                top:20px;
            }

            th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:5px;
            }

            td {
                text-align: center;
                padding:5px;
            }
            .leaveTable .alt{
                background-color: #bed9ff;
            }

            .details td
            {
                text-align: left;
            }



        </style>
    </head>
    <body>
        <h1 align="center"> Approve Leave </h1>
        <br />


        <form method="post">
            <table class="leaveTable" align="center">
                <tr>
                    <th><?php echo $staffidlang ?></th>
                    <th><?php echo $namelang ?></th>
                    <th><?php echo $leavetypelang ?></th>
                    <th><?php echo $requestdatelang ?></th>
                    <th><?php echo $statuslang ?></th>
                    <th></th>
                </tr>

                <?php
                $result = getLeaveToApprove();
                $i = 1;


                if (!isFilled($result))
                {
                    echo "<tr><td colspan='6'>There are no records to show.</td></tr>";
                }
                else
                {
                    foreach($result as $row){
                        $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";


                        if($row[2] == 1)
                        {
                            $leavetype = "Official Leave";
                        }
                        else if ($row[2] == 2)
                        {
                            $leavetype = "Maternity Leave";
                        }
                        else if($row[2] == 3)
                        {
                            $leavetype = "Other Leave";
                        }

                        echo $top;
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$leavetype</td>";
                        echo "<td>$row[3]</td>";

                        if ($row[4] == 0)
                        {
                            $leaveStatus = "Not reviewed";
                        }
                        else if($row[4] == 1)
                        {
                            $leaveStatus = "Approved";
                        }
                        else if($row[4] == 2)
                        {
                            $leaveStatus = "Rejected";
                        }

                        echo "<td>$leaveStatus</td>";
                        echo "<td><input name=\"Expand\" type=\"Submit\" value=\"Expand Details\" formaction=\"approveLeave.php?expand=" . $row[0] . "&sdate=" . $row[5] . "\" /> </td> ";


                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </form>

            <br />
            <br />

        <form method="post">

            <?php

                if($leavetypeexpand == 1)
                {
                    $leavetypeexpand = "Official Leave";
                }
                else if($leavetypeexpand == 2)
                {
                    $leavetypeexpand = "Maternity Leave";
                }
                else if($leavetypeexpand == 3)
                {
                    $leavetypeexpand = "Other Leave";

                }

            ?>

            <table class="details" align="center">
                <tr>
                    <td><?php echo $staffidlang ?></td>
                    <td > <input type = "text" name="staffid" value=<?php echo $staffid ?>> </td>
                </tr>


                <tr>
                    <td> <?php echo $namelang ?> </td>
                    <td > <input type = "text" name="name" value="<?php echo $name ?>"/> </td>
                </tr>

                <tr>
                    <td><?php echo $startdatelang ?></td>
                    <td ><input type="date" name="startdate" value="<?php echo $startdate ?>"/></td>
                </tr>


                <tr>
                    <td><?php echo $enddatelang ?></td>
                    <td > <input type="date" name="enddate" value="<?php echo $enddate ?>" /> </td>
                </tr>

                <tr>
                    <td> <?php echo $leavetypelang ?>  </td>
                    <td > <input type = "text" name="leavetype" value="<?php echo $leavetypeexpand ?>"/> </td>
                </tr>

                <tr>
                    <td><?php echo $otherreasonslang ?></td>
                    <td > <input type = "textarea" name="otherreasons" value="<?php echo $otherreasons ?>"/> </td>
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
    $fullPageHeight = 800;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Approve Leave";

    $pageContent = ob_get_contents();
    ob_end_clean();

    //Apply the template
    include("../Master.php");
?>

