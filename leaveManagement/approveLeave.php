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

    ob_start();

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
                padding:5px;
            }
            .leaveTable .alt{
                background-color: #bed9ff;
            }

        </style>
    </head>
    <body>
        <h1 align="center"> Approve Leave </h1>
        <br />


        <form method="post">
            <table class="leaveTable" align="center">
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th>Leave Type</th>
                    <th>Request Date</th>
                    <th>Status</th>
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


                        if($row[2] == 0)
                        {
                            $leavetype = "Official Leave";
                        }
                        else if ($row[2] == 1)
                        {
                            $leavetype = "Maternity Leave";
                        }
                        else if($row[2] == 2)
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

                        echo "<td>$leaveStatus</td>";
                        echo "<td><input name=\"Expand\" type=\"Submit\" value=\"Expand Details\" formaction=\"approveLeave.php?expand=" . $row[0] . "&sdate=" . $row[5] . "\" /> </td> ";

    //
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </form>

            <br />
            <br />

        <form method="post">
            <table class="details" align="center">
                <tr>
                    <td> Staff ID </td>
                    <td > <input type = "text" name="staffid" value=<?php echo $staffid ?>> </td>
                </tr>


                <tr>
                    <td> Name </td>
                    <td > <input type = "text" name="name" value="<?php echo $name ?>"/> </td>
                </tr>

                <tr>
                    <td> Start Date </td>
                    <td ><input type="date" name="startdate" value="<?php echo $startdate ?>"/></td>
                </tr>


                <tr>
                    <td> End Date </td>
                    <td > <input type="date" name="enddate" value="<?php echo $enddate ?>" /> </td>
                </tr>

                <tr>
                    <td> Leave Type  </td>
                    <td > <input type = "text" name="leavetype" value="<?php echo $leavetypeexpand ?>"/> </td>
                </tr>

                <tr>
                    <td> Other Reasons(s) </td>
                    <td > <input type = "textarea" name="otherreasons" value="<?php echo $otherreasons ?>"/> </td>
                </tr>

            </table>

            <br />
            <br />

            <table align="center">
                <tr>
                    <td> <input type="submit" value="Approve"> </td>
                    <td > <input type="submit" value="Reject">  </td>
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

