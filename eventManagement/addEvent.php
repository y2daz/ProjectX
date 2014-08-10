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
        <h1>Add New Event</h1>
        <form onsubmit="" name="thisForm" method="post">
            <table class="general" cellspacing="0">
                <tr><th></th><th></th></tr>
                <tr>

                </tr>
                <tr class="alt">
                    <td><?php echo $eventid?></td>
                    <td><input type="Event Id" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $name?></td>
                    <td><input type="Name" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $description?></td>
                    <td><input type="Description" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $location?></td>
                    <td><input type="Location" value=""></td>
                    <td><?php echo $eventtype?></td>
                    <td><select name="Event Type" value="">
                            <option><?php echo $prizegiving?></option>
                            <option><?php echo $sportmeet?></option>
                            <option><?php echo $teacherday?></option>
                            <option></option>
                        </select></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $status?></td>
                    <td><input type="Status" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $date?></td>
                    <td><input type="Date" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $eventcreator?></td>
                    <td><input type="Event Creator" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $starttime?></td>
                    <td><input type="Start Time" value=""></td>
                </tr>
                <tr class="alt">
                    <td><?php echo $endtime?></td>
                    <td><input type="End Time" value=""></td>
                </tr>

                <td><input class="button" type="Button" name="addManager" value=<?php echo $addmanager?>></td>
                <td><input class="button" type="Button" name="saveEvent" value=<?php echo $saveevent?>></td>
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