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

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


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
    </head>
    <body>

    <div id="main">

        <h1 align="center"> Previous Leave History </h1>

        <br>
        <br>

        <form>

            <table align="center" style="width: 300px">

                <tr>

                    <td> Staff ID :</td>
                    <td><input type="text" name="StaffID" </td>



                </tr>

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



    </div>

    </body>
    </html>

<?php

    //Change these to what you want
    $fullPageHeight = 600;
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Template";
    //Only change above

    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");

?>