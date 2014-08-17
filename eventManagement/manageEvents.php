<?php
/**
 * Created by PhpStorm.
 * User: Manoj
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
include(THISROOT . "/dbAccess.php");
ob_start();

?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>
    <h1>Manage Events</h1>

    <h3>Event Manager List</h3>
    <div class="table" id="table">
        <table border="1">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Contact No</th>
                <th scope="col"></th>
            </tr>
            <tr>
                <td>Chathuranga Liyanage</td>
                <td>0777123456</td>
                <td>
                    <input type="button" name="delete" id="button1" value="Delete" />
                </td>
            </tr>
            <tr>
                <td>Madusha Mendis</td>
                <td>0712345678</td>
                <td>
                    <input type="button" name="button" id="button2" value="Delete" />
                </td>
            </tr>
            <tr>
                <td>Dulip Rathnayake</td>
                <td>0112789456</td>
                <td>
                    <input type="button" name="button" id="button3" value="Delete" />
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>
                    <input type="button" name="button" id="button4" value="Add New Manager" /></center>
                </td>
            </tr>

        </table>
    </div>

    <div class="table" id="table" style="position:relative; top:40px; width:1600px;height:auto">
        <h3>Transaction Log</h3>
        <table width="500" border="1">
            <tr>
                <th scope="col" >ID</th>
                <th scope="col" >Date</th>
                <th scope="col" >Type</th>
                <th scope="col" >Amount</th>
                <th scope="col" >Description</th>

            </tr>
            <tr>
                <td>e1t1</td>
                <td>22/7/2014</td>
                <td>Income</td>
                <td>12,000</td>
                <td>&nbsp;</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t2</td>
                <td>24/7/2014</td>
                <td>Income</td>
                <td>11,000</td>
                <td>&nbsp;</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t3</td>
                <td>24/7/2014</td>
                <td>Income</td>
                <td>45</td>
                <td>&nbsp;</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t4</td>
                <td>27/7/2014</td>
                <td>Expenditure</td>
                <td>4000</td>
                <td>&nbsp;</td>

            </tr>
            <tr style="width:150px;height:30px" >
                <td><center>
                        <input type="submit" name="button" id="button" value="Add Transaction" />
                    </center>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

            </tr>

        </table>
    </div>

    <div class="table1" id="table1" style="position:relative; top:120px; 300px;height:auto;">
        <span>Total Recieved : </span><span id="totalReceived"> 23045</span>
    </div>
    <div class="table1" id="table1" style="position:relative; top:120px;width:300px;height:auto;">
        <span>Total Spent : </span><span id="totalspent"> 4000</span>
    </div>

    <div>
        <input type="button" name="button" id="button8" value="Print Transaction Report" style="position:relative; top:150px; left: 0px"/>
    </div>

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 900;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>