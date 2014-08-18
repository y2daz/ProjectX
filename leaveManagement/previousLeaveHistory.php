<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);

ob_start();




?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            /*
            ADD YOUR CSS HERE
            */

        </style>

        <script src="leave.js">



        </script>

    </head>
    <body>

        <h1 align="center"> Generate Report </h1>

        <?php echo "<script>  </script>" ?>

        <br>
        <br>

        <form>

            <table align="center">

                <tr>
                    <td>
                        <input type="radio" name="radiobutton" value="View All" id="r0" onchange="GenerateReport()" checked>View All
                        <input type="radio" name="radiobutton" value="StaffID" id="r1" onchange="GenerateReport()">By Staff ID
                        <input type="radio" name="radiobutton" value="Date" id="r2" onchange="GenerateReport()">By Date
                        <input type="radio" name="radiobutton" value="Approved" id="r3" onchange="GenerateReport()">By Approved
                        <input type="radio" name="radiobutton" value="Rejected" id="r4" onchange="GenerateReport()">By Rejected
                        <input type="radio" name="radiobutton" value="Status" id="r5" onchange="GenerateReport()">By Status
                    </td>

            </table>

            <br>
            <br>

            <table align="center">

                <tr>
                    <td align="center" colspan="2"><span id="selection">View All </span><input type="text" class="text1" name="SearchBy" value="">
                </tr>

            </table>

            <br>
            <br>

            <table align="center">
                <td align="center"><input type="button" name="generatereport" value="Generate Report"</td>
            </table>

            <br>
            <br>



            <table align="center" style="width: 700px" border="1">

                <tr>
                    <td>Staff ID</td>
                    <td>Name</td>
                    <td>Requested Date</td>
                    <td>Leave Type</td>
                    <td>Status </td>
                </tr>

                <tr>
                    <td> SID001 </td>
                    <td> Mrs. Andrea Gunaratne </td>
                    <td>7/26/2014 11:55 AM </td>
                    <td> Maternity Leave </td>
                    <td>Pending</td>


                </tr>

                <tr>
                    <td> SID001 </td>
                    <td> Mrs. Andrea Gunaratne </td>
                    <td> 7/05/2014 12.00 AM </td>
                    <td> Short Leave </td>
                    <td> Approved </td>


                </tr>

                <tr>
                    <td> SID001 </td>
                    <td> Mrs. Andrea Gunaratne </td>
                    <td> 01/15/2014 10.00 AM </td>
                    <td> Short Leave </td>
                    <td> Rejected </td>

                </tr>



            </table>

            <br>
            <br>

        </form>

    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Generate Leave Report";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>