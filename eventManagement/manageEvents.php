<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 8/16/14
 * Time: 10:02 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once("../formValidation.php");
require_once("../dbAccess.php");
require_once(THISROOT . "/common.php");
//include(THISROOT . "/formValidation.php");


ob_start();

error_reporting(E_ERROR | E_PARSE);

$result = null;

if(isset($_POST["eventID"]))
{
    $eventID = $_REQUEST["eventID"];
}
else
{
    $eventID = "";
}

//echo $eventID;

if(isset($_POST["delete"]))
{
    $StaffIDtoDelete = $_POST["delete"];

    echo $StaffIDtoDelete;
}

//if (isset($_POST["addManager"])){
//
//    echo ($_POST["newManagerID"]);
//
//    $operation = insertManager($eventID, $_POST["newManagerID"]);
//
//    if ($operation == true){
//        sendNotification("Manager added");
//    }
//    else{
//        sendNotification("Error adding manager");
//    }
//}

if (isset($_POST["addTransaction"]))
{
    if(is_numeric($_POST["tAmount"]))
    {
        $operation = insertTransaction($eventID, $_POST["tDate"], $_POST["tType"], $_POST["tAmount"], $_POST["tDescription"]);

        if($operation)
        {
            sendNotification("Transaction added");
        }
        else
        {
            sendNotification("Error");
        }
    }
    else
    {
        sendNotification("Error adding transaction");
    }



}


if (isset($_POST["editEvent"]))
{
//    echo "<pre>";
//    print_r($_POST);
//    echo "</pre>";

    $operation = editEvent( $_POST["eventname"], $_POST["eventdescription"], $_POST["eventlocation"], $_POST["eventdate"], $_POST["starttime"], $_POST["endtime"], $_POST["eventID"]);

    if ($operation){
        sendNotification("Event Details Edited");
    }
    else{
        sendNotification("Error Editing Event Details");
    }
}


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
        #transaction{
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
        /*#Manager td{*/
            /*padding: 5px;*/
        /*}*/
        /*#Manager #id{*/
            /*width:300px;*/
        /*}*/
        /*#Manager #name{*/
            /*width:400px;*/
        /*}*/
        /*#Manager #contact{*/
            /*width:300px;*/
        /*}*/
        /*#Manager #space{*/
            /*width:500px;*/
        /*}*/

        /*#Manager #staffid{*/
            /*width:500px;*/
        /*}*/

        /*#Manager #button1{*/
           /*width:150px;*/
        /*}*/

        /*#Manager #button2{*/
           /*width:150px;*/
        /*}*/

        /*#Manager #button3{*/
           /*width:150px;*/
        /*}*/

        /*#Manager #button4{*/
           /*width:250px;*/
        /*}*/

        #transaction td{
            max-width:200px;
        }
        #transaction input{
            max-width:200px;
        }

        /*#Manager th{*/
            /*color:white;*/
            /*background-color: #005e77;*/
            /*height:30px;*/
            /*padding:5px;*/
        /*}*/

        #transaction th{
            color:white;
            background-color: #005e77;
            height:30px;
            padding:5px;

        }
        #eventDetais{
            text-align: left;
            position: absolute;
            left: 20px;
            top: 600px;
        }

        input.#button8{
            position:absolute;
            left:100px;
            top:1400px;
        }
    </style>

</head>
<?php
$manageEvents = getLanguage("manageEvents ", $_COOKIE["language"]);
$managerList = getLanguage("managerList", $_COOKIE["language"]);
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
$addManager = getLanguage("addManager ", $_COOKIE["language"]);
$addTransaction = getLanguage("addTransaction ", $_COOKIE["language"]);
$printTransction = getLanguage("printTransction ", $_COOKIE["language"]);
$name = getLanguage("name ", $_COOKIE["language"]);
$description = getLanguage("description ", $_COOKIE["language"]);
$location = getLanguage("location ", $_COOKIE["language"]);
$eventtype = getLanguage("eventtype ", $_COOKIE["language"]);
$status = getLanguage("status ", $_COOKIE["language"]);
$date = getLanguage("date", $_COOKIE["language"]);
$starttime = getLanguage("starttime", $_COOKIE["language"]);
$endtime = getLanguage("endtime", $_COOKIE["language"]);

?>
<body>
<!---->
<!--   <div  id="general" style="">-->
<!---->
       <h1 align="center"><?php echo $manageEvents ?></h1>
<!---->
<!--        <h3>--><?php //echo $managerList ?><!--</h3>-->
<!---->
<!--        <form method="post">-->
<!---->
<!--            <input name="eventID" value="--><?php //echo $eventID ?><!--" hidden="hidden" />-->
<!--            <input name="manage" value="Manage" hidden="hidden" />-->
<!---->
<!--        <table id="Manager">-->
<!--            <tr>-->
<!---->
<!--                <th id="staffid">--><?php //echo $staffID ?><!--</th>-->
<!--                <th id="name">--><?php //echo $managerName ?><!--</th>-->
<!--                <th id="contact">--><?php //echo $contactNumber ?><!--</th>-->
<!--                <th id="space"></th>-->
<!---->
<!---->
<!--                <!--<span class="table" style="width:570px;height:auto">-->
<!--            --><?php
//            $result = getEventManagers($eventID);
//            $i = 1;
//
//            if ($result == null)
//            {
//                echo "<tr><td colspan='4'>There are no records to show.</td></tr>";
//            }
//            else
//            {
//                foreach($result as $row){
//                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td class=\"searchEmail\">" : "<tr><td class=\"searchEmail\">";
//                    echo $top;
//                    echo "$row[0]";
//                    echo "<td>$row[1]</td>";
//                    echo "<td>$row[2]</td>";
////                    echo "<td><input name=\"Reset\" type=\"button\" value=\"Reset\" onclick=\"resetPassword('" . $row[0] . "');\" /> </td> ";
//                    echo "<td><input name=\"Delete\" type=\"button\" value=\"Delete\" onclick=\"post(document.URL, {'delete' : '" . $row[0] . "' }, 'post');\" /> </td> ";
//                    echo "</tr>";
//
//                    //                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
//                    //                            post(document.URL, params, "post");
//                }
//            }
//            ?>
<!---->
<!--            <tr>-->
<!--                <td><input type="text" name="newManagerID" value="" required="true"></td>-->
<!--                <td >-->
<!--                    <input type="submit" name="addManager" id="button4" value="--><?php //echo $addManager ?><!--" />-->
<!--                </td>-->
<!--                <td></td>-->
<!--                <td></td>-->
<!--            </tr>-->
<!--        </table>-->
<!--           </form>-->
<!--    </div>-->


<!--    <h3>--><?php //echo $invitees ?><!--</h3>-->
<!---->
<!--    <span>--><?php //echo $noofInvitees ?><!-- </span><span id="invitees"> 0</span> <br />-->
<!--    <input type="button" name="button" width = "150px" id="button9" value="--><?php //echo $viewInvitees ?><!--"  onClick="window.location = 'newinviteeslist.php';"/>-->





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
            <?php
            $result = getEventTransactions($eventID);
            $i = 1;

            if ($result == null)
            {
                echo "<tr><td colspan='4'>There are no records to show.</td></tr>";
            }
            else
            {
                foreach($result as $row){
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td class=\"searchEmail\">" : "<tr><td class=\"searchEmail\">";
                    echo $top;
                    echo "$row[0]";
                    echo "<td>$row[1]</td>";
                    echo "<td>" . ( $row[2] == 0? "Income": "Expenditure") . "</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
//                    echo "<td><input name=\"Reset\" type=\"button\" value=\"Reset\" onclick=\"resetPassword('" . $row[0] . "');\" /> </td> ";
//                    echo "<td><input name=\"Delete\" type=\"button\" value=\"Delete\" onclick=\"post(document.URL, {'delete' : '" . $row[0] . "' }, 'post');\" /> </td> ";
                    echo "</tr>";

                    //                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
                    //                            post(document.URL, params, "post");
                }
            }
            ?>


            <tr style="width:150px;height:30px" >
        <form method="post">
            <input name="eventID" value="<?php echo $eventID ?>" hidden="hidden" />
            <input name="manage" value="Manage" hidden="hidden" />
                <td><input type="submit" name="addTransaction" id="button" value="<?php echo $addTransaction ?>" /></td>
                <td><input type="Date" name="tDate" value=""></td>
                <td><select name="tType">
                       <option value="0">Income</option>
                        <option value="1">Expenditure</option>
                </select></td>
                <td><input type="text" name="tAmount" value="" required="true"></td>
                <td><input type="text" name="tDescription" value="" required="true"></td>
            </form>
            </tr>

        </table>

    </div>


    <br />

    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span><?php echo $trecieved ?>= </span><span id="totalReceived"> <?php echo getIncomes($eventID)?></span> <br />
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <span><?php echo $tspent ?>= </span><span id="totalspent"> <?php echo getExpenses($eventID)?></span>
        <br>
    <br>
    <div>
        &nbsp&nbsp&nbsp&nbsp&nbsp
        <input type="button" name="button" id="button8" value="Generate Event Report "  onClick="window.location = 'EventReport.php?id=<?php echo $eventID ?>';" style="position:relative; left: 0px; width:150"/>

        <input type="button" name="button" id="button9" value="Generate Transaction Report "  onClick="window.location = 'TransactionReport.php?id=<?php echo $eventID ?>';" style="position:relative; left: 0px; width:150"/>

    </div>

         <form method="POST">
            <div  id="general" style="">

                <h1 style="position: absolute; top: 500px; left: 280px;"> Edit Event Details </h1>

                <table id="eventDetais" align="center">


                    <tr>
                        <input name="eventID" value="<?php echo $eventID ?>" hidden="hidden" />
                        <input name="manage" value="Manage" hidden="hidden" />
                        <td><?php echo $name ?></td>
                        <td><input type="text" name="eventname" required="true" /></td>
                    </tr>

                    <tr>
                        <td><?php echo $description ?></td>
                        <td><input type="text" name="eventdescription" required="true"/> </td>
                    </tr>

                    <tr>
                        <td><?php echo $location ?></td>
                        <td><input type="text" name="eventlocation" required="true"/></td>
                    </tr>
                    <tr>
                        <td><?php echo $date ?></td>
                        <td><input type="date" name="eventdate" required="true"/></td>
                    </tr>

                    <tr>
                        <td><?php echo $starttime ?></td>
                        <td><input type="time" name="starttime" required="true"/> </td>

                    </tr>

                    <tr>
                        <td><?php echo $endtime ?></td>
                        <td><input type="time" name="endtime" required="true"/></td>
                    </tr>

                    <tr>
                        <td>
                           <br>
                            <br>
                             <input style="position: relative; left: 80px; top: -20px;" type="submit" name="editEvent" id="button10" value="Edit Event" align="center">
                        </td>
                    </tr>
                </table>
    </div>

<!--             <input type="button" name="delete" value="Delete Event" style="position: absolute; left: 500px; top: 500px;">-->

         </form>



    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Manage Events";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>