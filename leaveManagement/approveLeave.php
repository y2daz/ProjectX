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
                    <th>Time Period</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Mrs. Andrea De Silva</td>
                    <td>Official</td>
                    <td>5 Days</td>
                    <td>Pending</td>
                    <td><input type="button" name="expand" value="Expand Details" /></td>
                </tr>
                <tr class="alt">
                    <td>212</td>
                    <td>Mr. Madusha Karunaratne</td>
                    <td>Other</td>
                    <td>2 Days</td>
                    <td>Pending</td>
                    <td><input type="button" name="expand" value="Expand Details" /></td>
                </tr>
                <tr>
                    <td> 123 </td>
                    <td> Mr. Priyan Fernando </td>
                    <td> Official</td>
                    <td> 1 Day</td>
                    <td> Pending </td>
                    <td> <input type="button" name="expand" value="Expand Details" /> </td>
                </tr>
            </table>

            <br />
            <br />

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

