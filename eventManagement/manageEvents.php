<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 8/16/14
 * Time: 10:02 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

?>
<html>
<head>
    <style type=text/css>
<!--        #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--        #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

        #general{
            /*width:50%;*/
            height:auto;
            text-align: center;
        }
        #Manager{
            position: relative;
            left:25px;
            width:750px;
            border:1px solid #005e77;
            border-collapse: collapse;
        }
#transaction{
    position: relative;
    left:25px;
    width:750px;
    border:1px solid #005e77;
    border-collapse: collapse;
}
        #Manager td{
            padding: 5px;
        }
        #Manager #name{
            width:200px;
        }
        #Manager #contact{
            width:300px;
        }

        #transaction #id{
            width:200px;
        }
        #transaction #date{
            width:200px;
        }
        #transaction #type{
            width:200px;
        }
        #transaction #amount{
            width:200px;
        }
        #transaction #description{
            width:200px;
        }

        #Manager th{
            color:white;
            background-color: #005e77;
            height:30px;
            padding:5px;
        }

        #transaction th{
            color:white;
            background-color: #005e77;
            height:30px;
            padding:5px;

        }



 </style>

</head>
<body>
<div  id="general" style="">

    <h1>Manage Events</h1>

        <h3>Event Manager List</h3>
    <table id="Manager">
        <tr>
            <th id="name">Name</th>
            <th id="contact">Contact No</th>
            <th></th>


            <!--<span class="table" style="width:570px;height:auto">-->
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
                <input type="button" name="button" id="button4" value="Add New Manager" />
            </td>
        </tr>
        </table>

        </div>


<div>

        <h3>Invitees List</h3>

<span>No Of Invitees : </span><span id="invitees"> 0</span> <br />
    <input type="button" name="button" id="button9" value="View Invitees List"/>
</div>





<div  id="general" style="">



    <h3>Transaction Log</h3>
    <table id="transaction">
        <tr>
            <th id="id">ID</th>
            <th id="date">Date</th>
            <th id="type">Type</th>
            <th id="amount">Amount</th>
            <th id="description">Description</th>


            <!--<span class="table" style="width:570px;height:auto">-->
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


<br />

<span>Total Recieved : </span><span id="totalReceived"> 23045</span> <br />
<span>Total Spent : </span><span id="totalspent"> 4000</span>

<div>
    <input type="button" name="button" id="button8" value="Print Transaction Report" style="position:relative; top:150px; left: 0px"/>
</div>


    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>