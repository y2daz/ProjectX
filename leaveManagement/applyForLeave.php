<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 19/07/14
 * Time: 17:04
 */
    ob_start();
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
                        <td>Name :</td>
                        <td><input type="text" name="staffname" /></td>
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
                        <td><select>
                                <option value="OfficialLeave">Maternity</option>
                                <option value="MaternityLeave">Short Leave</option>
                                <option value="CasualLeave">Annual Leave</option>
                                <option value="Other">Casual Leave</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Select Time Period Type :
                        </td>
                        <td>
                            <input type="radio" name="TimeType" value="Hours"> Hours
                            <input type="radio" name="TimeType" value="Days"> Days
                            <input type="radio" name="TimeType" value="Months"> Months
                        </td>
                    </tr>
                    <tr>
                        <td>Time Period :</td>
                        <td><input type="text" name="timeperiod"></td>
                    </tr>
                    <tr>
                        <td>Other Reason(s)</td>
                        <td><textarea rows="3"; cols="25"; name="LeaveReasons"; draggable="false"; style="resize:none"></textarea></td>
                    </tr>
                    <tr>
                        <td>Number of Leave Days Left : </td>
                        <td><input type="text" name="NoofLeaveDaysLeft" disabled="disabled"	</td>
                    <tr>
                </table>

                <br /><br /><br />

                <p align="center">
                    <input type="button" name="ApplyforLeave" value="Apply for Leave" id="ApplyforLeave" />
                </p>
            </form>
    </body>
</html>
<?php
    //Assign all Page Specific variables
    $fullPageHeight = 800;
    $footerTop = $fullPageHeight + 100;

    $pageContent = ob_get_contents();
    ob_end_clean();
    $pageTitle= "Apply for Leave";
    //Apply the template
    require_once("../Master.php");
?>
