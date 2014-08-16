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
include(THISROOT . "/dbAccess.php");
ob_start();

if (isset($_POST["Save"])) //User has clicked the submit button to add a user
{
        $operation = insertUser($_POST["eventid"], $_POST["name"], $_POST["description"], $_POST["location"], $_POST["status"], $_POST["date"], $_POST["eventcreator"], $_POST["starttime"], $_POST["endtime"]);
}

?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            h1 {

                text-align:center;
            }
            /*.general th{*/
                /*align:center;*/
                /*color:white;*/
                /*background-color:#154DC1;*/
                /*height:30px;*/
                /*padding:5px;*/
            /*}*/

            .general td {
                padding:5px;
            }



            input.button {
                position:relative;
                font-weight:bold;
                font-size:12px;
                left:50px;
                top:45px;
                width:150px;

            }

            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:12px;
                right:-300px;
                top:0px;
            }

        </style>
    </head>

    <?php
        $staffManagement = getLanguage("staffManagement", $_COOKIE["language"]);
        $eventid = getLanguage("eventid ", $_COOKIE["language"]);
        $name = getLanguage("name ", $_COOKIE["language"]);
        $description = getLanguage("description ", $_COOKIE["language"]);
        $location = getLanguage("location ", $_COOKIE["language"]);
        $eventtype = getLanguage("eventtype ", $_COOKIE["language"]);
        $status = getLanguage("status ", $_COOKIE["language"]);
        $date = getLanguage("date ", $_COOKIE["language"]);
        $eventcreator = getLanguage("eventcreator ", $_COOKIE["language"]);
        $starttime = getLanguage("starttime ", $_COOKIE["language"]);
        $endtime = getLanguage("endtime ", $_COOKIE["language"]);
        $addmanager = getLanguage("addmanager ", $_COOKIE["language"]);
        $saveevent = getLanguage("saveevent ", $_COOKIE["language"]);
//    $prizegiving="$prizegiving";
//    $sportmeet="Sports Meet";
//    $teacherday="Teacher's Day";
    ?>

    <body>
        <h1>Add New Event</h1>
        <form onsubmit="" name="thisForm" method="post">
            <table class="general" cellspacing="0">
                <tr><th></th><th></th></tr>
                <tr>

                </tr>
                <tr class="alt">
                    <td><?php echo $eventid?></td>
                    <td><input type="Event Id" name="eventid" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $name?></td>
                    <td><input type="Name" name="name" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $description?></td>
                    <td><input type="Description" name="description" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $location?></td>
                    <td><input type="Location" value=""></td>
<!--                    <td>--><?php //echo $eventtype?><!--</td>-->
<!--                    <td><select name="Event Type" value="">-->
<!--                            <option>--><?php //echo $prizegiving?><!--</option>-->
<!--                            <option>--><?php //echo $sportmeet?><!--</option>-->
<!--                            <option>--><?php //echo $teacherday?><!--</option>-->
<!--                            <option></option>-->
<!--                        </select></td>-->
                </tr>
                <tr class="alt">
                    <td><?php echo $status?></td>
                    <td><input type="Status" name="status" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $date?></td>
                    <td><input type="Date" name="date" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $eventcreator?></td>
                    <td><input type="Event Creator" name="eventcreator" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $starttime?></td>
                    <td><input type="Start Time" name="starttime" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $endtime?></td>
                    <td><input type="End Time" name="endtime" value=""></td>
                </tr>

                <td><input class="button" type="Button" name="addManager" value=<?php echo $addmanager?>></td>
                <td><input class="button" type="submit" name="saveEvent" value=<?php echo $saveevent?>></td>
            </table>
        </form>
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