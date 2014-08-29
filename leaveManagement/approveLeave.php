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







?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            table {
                border-spacing:0px 5px;
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

                foreach($result as $row){
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";
                    echo $top;
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";

                    if ($row[4] == 0)
                    {
                        $leaveStatus = "Not reviewed";
                    }

                    echo "<td>$leaveStatus</td>";
                    echo "<td><input name=\"Delete\" type=\"button\" value=\"Delete\" onclick=\"post(document.URL, {'delete' : '" . $row[0] . "' }, 'post');\" /> </td> ";

//                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
//                            post(document.URL, params, "post");
                    echo "</tr>";
                }
                ?>
            </table>

            <br />
            <br />

        <form method="post">
            <table class="details" align="center">
                <tr>
                    <td> Staff ID </td>
                    <td > <input type = "text" name="staffid" /> </td>
                </tr>


                <tr>
                    <td> Name </td>
                    <td > <input type = "text" name="staffid" /> </td>
                </tr>

                <tr>
                    <td> Start Date </td>
                    <td ><input type="date"; name="StartDate"; id="StartDate" align="right"/></td>
                </tr>


                <tr>
                    <td> End Date </td>
                    <td > <input type="date" name="enddate" align="right" /> </td>
                </tr>

                <tr>
                    <td> Leave Type  </td>
                    <td > <input type = "text" name="staffid" /> </td>
                </tr>

                <tr>
                    <td> Time Period </td>
                    <td > <input type = "text" name="staffid" /> </td>
                </tr>

                <tr>
                    <td> Other Reasons(s) </td>
                    <td > <input type = "text" name="staffid" /> </td>
                </tr>

            </table>

            <br />
            <br />

            <table align="center">
                <tr>
                    <td> <input type="button" value="Approve"> </td>
                    <td > <input type="button" value="Reject">  </td>
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

