<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 19/07/14
 * Time: 17:04
 */

    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
    include(THISROOT . "/dbAccess.php");

    ob_start();

    if (isset($_POST["ApplyforLeave"])) //user has clicked the button to apply leave
    {
        $operation = insertLeave($_POST["staffid"], $_POST["startdate"], $_POST["enddate"], $_POST["leavetype"], $_POST["otherreasons"]);

        echo $operation;
    }

    if(isset($_POST["GetLeaveData"]))
    {
        $result = getLeaveData($_POST["staffid"]);

        $OfficialLeave = $result[0];
        $MaternityLeave = $result[1];
        $OtherLeave = $result[2];
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

            .nigga
            {
                position: absolute;
                left: 500px;
                top: 100px;
            }

            .nigga th
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

            .insert input{
                font-weight:bold;
                font-size:15px;
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


                    <tr><th>Enter Details<th></th></tr>

                    <tr>
                        <td>Staff ID :</td>
                        <td><input type="text" name="staffid" value="" required="true"/></td>
                    </tr>


                    <tr>
                        <td>Start Date :</td>
                        <td><input type="date" name="startdate" required="true"/></td>
                    </tr>


                    <tr>
                        <td>End Date :</td>
                        <td><input type="date" name="enddate" required="true"/></td>
                    </tr>
                    <tr>
                        <td>Leave Type :</td>
                        <td><select name="leavetype" onchange="selectedvalue(this)" required="true">
                                <option value="1">Offical Leave</option>
                                <option value="2">Maternity Leave</option>
                                <option value="3">Other Leave</option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>Other Reason(s)</td>
                        <td><textarea name="otherreasons" rows="3"; cols="25"; name="LeaveReasons"; draggable="false"; style="resize:none"></textarea></td>
                    </tr>

                </table>

                <table class="nigga" id="output">

                    <tr><th>Available Leave Days <th></th></tr>

                    <tr>
                        <td>Official Leave</td>
                        <td> <?php echo $OfficialLeave ?> </td>
                    </tr>

                    <tr>
                        <td>Maternity Leave</td>
                        <td> <?php echo $MaternityLeave ?></td>
                    </tr>

                    <tr>
                        <td>Other Leave</td>
                        <td> <?php echo $OtherLeave ?></td>
                    </tr>

                </table>

                <br />

                <p align="center">
                    <input type="submit" name="ApplyforLeave" value="Apply for Leave" id="submitme">
                    <input type="reset" name="reset" value="Reset">
                    <input type="submit" name="GetLeaveData" value="Get Leave Data">
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
