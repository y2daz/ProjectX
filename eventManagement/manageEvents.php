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
        #Manager #id{
            width:300px;
        }
        #Manager #name{
            width:400px;
        }
        #Manager #contact{
            width:300px;
        }
        #Manager #space{
            width:500px;
        }

        #Manager #staffid{
            width:500px;
        }

        #Manager #button1{
           width:150px;
        }

        #Manager #button2{
           width:150px;
        }

        #Manager #button3{
           width:150px;
        }

        #Manager #button4{
           width:150px;
        }

        #transaction td{
            max-width:200px;
        }
        #transaction input{
            max-width:200px;
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
<?php
$manageEvents = getLanguage("manageEvents ", $_COOKIE["language"]);
$managerList = getLanguage("managerList", $_COOKIE["language"]);
$eventid = getLanguage("eventid ", $_COOKIE["language"]);
$managerName = getLanguage("managerName ", $_COOKIE["language"]);
$contactNumber = getLanguage("contactNumber ", $_COOKIE["language"]);
$delete = getLanguage("delete ", $_COOKIE["language"]);
$invitees = getLanguage("invitees ", $_COOKIE["language"]);
$noofInvitees = getLanguage("noofInvitees ", $_COOKIE["language"]);
$viewInvitees = getLanguage("viewInvitees ", $_COOKIE["language"]);
$tlog = getLanguage("tlog ", $_COOKIE["language"]);
$tid = getLanguage("tid ", $_COOKIE["language"]);
$date = getLanguage("date ", $_COOKIE["language"]);
$type = getLanguage("type ", $_COOKIE["language"]);
$amount = getLanguage("amount ", $_COOKIE["language"]);
$description = getLanguage("description ", $_COOKIE["language"]);
$trecieved = getLanguage("trecieved ", $_COOKIE["language"]);
$tspent = getLanguage("tspent ", $_COOKIE["language"]);
$staffID = getLanguage("staffID ", $_COOKIE["language"]);

?>
<body>

<form class="manage">

    <div  id="general" style="">

        <h1><?php echo $manageEvents ?></h1>

        <h3><?php echo $managerList ?></h3>
        <table id="Manager">
            <tr>

                <th id="staffid"><?php echo $staffID ?></th>
                <th id="name"><?php echo $managerName ?></th>
                <th id="contact"><?php echo $contactNumber ?></th>
                <th id="space"></th>


                <!--<span class="table" style="width:570px;height:auto">-->
            </tr>

            <tr>
                <td>10</td>
                <td>Amritha</td>
                <td>0756489326</td>
                <td>
                    <input type="button" name=<?php echo $delete ?> id="button1" value=<?php echo $delete ?> />
                </td>
            </tr>

            <tr>
                <td>4</td>
                <td>Madusha </td>
                <td>0711701236</td>
                <td>
                    <input type="button" name="button" id="button2" value=<?php echo $delete ?> />
                </td>
            </tr>
            <tr>
                <td>9</td>
                <td>niruthi</td>
                <td>0112968756</td>
                <td>
                    <input type="button" name="button" id="button3" value=<?php echo $delete ?> />
                </td>
            </tr>
            <tr>
                <td><input type="text" name="textbox" value=""></td>
                <td><input type="text" name="textbox" value=""></td>
                <td><input type="text" name="textbox" value=""></td>
                <td>
                    <input type="button" name="button" id="button4" value="Add New Manager" />
                </td>
            </tr>
        </table>

    </div>


    <h3><?php echo $invitees ?></h3>

    <span><?php echo $noofInvitees ?> </span><span id="invitees"> 0</span> <br />
    <input type="button" name="button" width = "150px" id="button9" value=<?php echo $viewInvitees ?>  onClick="window.location = 'newinviteeslist.php';"/>





    <div  id="general" style="">



        <h3><?php echo $tlog ?></h3>
        <table id="transaction">
            <tr>
                <th id="id"><?php echo $tid ?></th>
                <th id="date"><?php echo $date ?></th>
                <th id="type"><?php echo $type ?></th>
                <th id="amount"><?php echo $amount ?></th>
                <th id="description"><?php echo $description ?></th>


                <!--<span class="table" style="width:570px;height:auto">-->
            </tr>

            <tr>
                <td>e1t1</td>
                <td>22/7/2014</td>
                <td>Income</td>
                <td>12,000</td>
                <td>From Students</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t2</td>
                <td>24/7/2014</td>
                <td>Income</td>
                <td>11,000</td>
                <td>From OBA</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t3</td>
                <td>24/7/2014</td>
                <td>Income</td>
                <td>45</td>
                <td>For Transports</td>

            </tr>
            <tr style="width:100px;height:30px">
                <td>e1t4</td>
                <td>27/7/2014</td>
                <td>Expenditure</td>
                <td>4000</td>
                <td>For Decorations</td>

            </tr>
            <tr style="width:150px;height:30px" >

                </td>
                <td><input type="text" name="textbox1" value=""></td>
                <td><input type="text" name="textbox2" value=""></td>
                <td><input type="text" name="textbox3" value=""></td>
                <td><input type="text" name="textbox4" value=""></td>
                <td><input type="text" name="textbox1" value=""></td>

            </tr>

        </table>
        <input type="submit" name="button" id="button" value="Add Transaction" />
    </div>


    <br />

    <span><?php echo $trecieved ?> </span><span id="totalReceived"> 23045</span> <br />
    <span><?php echo $tspent ?></span><span id="totalspent"> 4000</span>

    <div>
        <input type="button" name="button" id="button8" value="Print Transaction Report" style="position:relative; top:150px; left: 0px"/>
    </div>

</form>




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