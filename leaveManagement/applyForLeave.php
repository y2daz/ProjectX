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


?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                text-align: center;
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

            <form>

                <br /><br /><br />

                <table align="center">
                    <tr>
                        <td>Staff ID :</td>
                        <td><input type="text" name="staffid" value="" /></td>
                    </tr>
                    <tr>
                        <td>Start Date :</td>
                        <td><input type="date" name="startdate" /></td>
                    </tr>
                    <tr>
                        <td>End Date :</td>
                        <td><input type="date" name="enddate" /></td>
                    </tr>
                    <tr>
                        <td>Leave Type :</td>
                        <td><select onchange="selectedvalue(this)">
                                <option value="OfficialLeave">Offical Leave</option>
                                <option value="MaternityLeave">Maternity Leave</option>
                                <option value="CasualLeave">Casual Leave</option>
                                <option value="OtherLeave">Other Leave</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td>Other Reason(s)</td>
                        <td><textarea name="otherreasons" rows="3"; cols="25"; name="LeaveReasons"; draggable="false"; style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <!--<td>Number of Leave Days Left : </td> -->
                        <!--<td><input type="text" name="NoofLeaveDaysLeft" disabled="disabled"	</td> -->
                    <tr>
                </table>

                <br />

                <p align="center">
                    <input type="submit" value="submit" id="submitme">
                </p>

                <input name="leavetype" id="check" value="OfficialLeave" >


            </form>
    </body>
</html>

<?php
    //Assign all Page Specific variables
    $fullPageHeight = 800;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Template";

    //Only change above

    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>
