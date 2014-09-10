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
include(THISROOT . "/rtdbAccess.php");
ob_start();

if (isset($_POST["addevent"])) //user has clicked the button to apply leave
{
    $operation = insertEvent($_POST["eventid"], $_POST["eventname"], $_POST["eventdescription"], $_POST["eventlocation"], 0/*Stauts is always 0 when entering*/, $_POST["eventdate"],  $_POST["eventcreator"], $_POST["starttime"], $_POST["endtime"]);
}



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

    <?php
    $eventid = getLanguage("eventid ", $_COOKIE["language"]);
    $name = getLanguage("name ", $_COOKIE["language"]);
    $description = getLanguage("description ", $_COOKIE["language"]);
    $location = getLanguage("location ", $_COOKIE["language"]);
    $eventtype = getLanguage("eventtype ", $_COOKIE["language"]);
    $status = getLanguage("status ", $_COOKIE["language"]);
    $date = getLanguage("date", $_COOKIE["language"]);
    $eventcreator = getLanguage("eventcreator", $_COOKIE["language"]);
    $starttime = getLanguage("starttime", $_COOKIE["language"]);
    $endtime = getLanguage("endtime", $_COOKIE["language"]);
    $addevent = getLanguage("saveevent", $_COOKIE["language"]);
    ?>

    <body>

    <h1 align="center">Add Event</h1>

    <br>
    <br>

    <form method="POST">

        <table align="center">

            <tr>
                <td><?php echo $eventid ?></td>
                <td><input type="text" name="eventid" required="true"></td>
            </tr>

            <tr>
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
                <td><?php echo $eventcreator ?></td>
                <td><input type="text" name="eventcreator" required="true"/></td>
            </tr>
            <tr>
                <td><?php echo $starttime ?></td>
                <td><input type="time" name="starttime" required="true"/> </td>

            </tr>

            <tr>
                <td><?php echo $endtime ?></td>
                <td><input type="time" name="endtime" required="true"/></td>
            </tr>

        </table>

        <br>
        <br>

        <table align="center">

            <tr>
                <td>
                    <input type="submit" name="addevent" value="<?php echo $addevent ?>" align="center">
                </td>
            </tr>

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