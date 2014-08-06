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
            h3{
                position: relative;
                left:50px;
            }
            .leaveTable{
                position: relative;
            }
            .leaveTable th{
                font-weight: 600;
                color:white;
                background-color: #005e77;
            }
            .leaveTable tr{
            }
            .leaveTable tr.alt{
                background-color: #bed9ff;
            }
            .leaveTable td{
                padding-left: 10px;
                padding-right: 10px;
            }
            .details {
                /*position: relative;*/
                /*top:50px;*/
                width:500px;
                height:150px
            }
        </style>
    </head>
    <body>
        <h1> Approve Leave </h1>
        <br />
        <h3>Pending Leave</h3>
        <form>
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
                    <td>SIDXXX</td>
                    <td>Mrs. Andrea De Silva</td>
                    <td>Short Leave</td>
                    <td>5 Hours</td>
                    <td>Pending</td>
                    <td><input type="button" name="expand" value="Expand Details" /></td>
                </tr>
                <tr class="alt">
                    <td>SIDXXX</td>
                    <td>Mr. Madusha Karunaratne</td>
                    <td>Long Leave</td>
                    <td>5 Days</td>
                    <td>Pending</td>
                    <td><input type="button" name="expand" value="Expand Details" /></td>
                </tr>
                <tr>
                    <td> SIDXXX </td>
                    <td> Mr. Priyan Fernando </td>
                    <td> Short Leave </td>
                    <td> 8 am - 11 am</td>
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

    $pageContent = ob_get_contents();
    ob_end_clean();
    $pageTitle= "Approve Leave";
    //Apply the template
    include("../Master.php");
?>

