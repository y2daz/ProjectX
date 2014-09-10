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

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            #general{
                /*width:50%;*/
                height:auto;
                text-align: center;
            }
            #eventTable{
                position: relative;
                left:25px;
                width:750px;
                border:1px solid #005e77;
                border-collapse: collapse;
            }
            #eventTable .alt{
                background-color: #bed9ff;
            }
            #eventTable td{
                padding: 5px;
            }
            #eventTable #eventName{
                width:200px;
            }
            #eventTable #description{
                width:300px;
            }
            #eventTable th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
            }
            input.button {
                position:relative;
                font-weight:bold;
                font-size:15px;
                width: 500px;

            }

        </style>
    </head>

    <?php
    $eventName = getLanguage("eventName ", $_COOKIE["language"]);
    $date = getLanguage("date", $_COOKIE["language"]);
    $description = getLanguage("description ", $_COOKIE["language"]);
    $eventList = getLanguage("eventList ", $_COOKIE["language"]);
    $manage = getLanguage("manage ", $_COOKIE["language"]);
    $addnewEvent = getLanguage("addnewEvent ", $_COOKIE["language"]);
     ?>

    <body>
        <div class="" id="general" style="">

            <h1><?php echo $eventList ?></h1>
            <table id="eventTable">
                <tr>
                    <th><?php echo $eventName ?></th>
                    <th><?php echo $date ?></th>
                    <th><?php echo $description ?></th>
                    <th></th>
                    <!--<span class="table" style="width:570px;height:auto">-->
                </tr>
                <?php
                $result = getAllEvents();
                $i = 1;

                foreach($result as $row){
                    $top = "<form method='post' action='manageEvents.php'>";
                    $top .= ($i++ % 2 == 0)? "<tr class=\"alt\"><td class=\"\">" : "<tr><td class=\"\">";
                    echo $top;
                    echo "$row[1]" . "<input name=eventID value=$row[0] hidden=hidden/>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td><input name=\"manage" . "\" type=\"submit\" value=\" $manage \"  /> </td> ";
                    echo "</td></tr></form>";
                }
                ?>

<!--                <tr>-->
<!--                    <td>Prize Giving</td>-->
<!--                    <td>07/07/2015</td>-->
<!--                    <td>Prize giving ceremony for primary grades</td>-->
<!--                    <td><span class="table" style="width:570px;height:auto">-->
<!--                    <input type="button" name="manage1" id="manage1" value="Manage" />-->
<!--                    </span>-->
<!--                    </td>-->
<!--                </tr>-->
<!--                <tr>-->
<!--                    <td>Sports Meet</td>-->
<!--                    <td>07/09/2014</td>-->
<!--                    <td>Inter house secondary grades sports meet</td>-->
<!--                    <td><span class="table" style="width:570px;height:auto">-->
<!--                    <center><input type="button" name="manage2" id="manage2" value="Manage" /></center>-->
<!--                    </span>-->
<!--                    </td>-->
<!--                </tr>-->
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td><span class="table" style="width:100px;height:auto">
                    <input type="button" name="$addnewEvent" id="button" value="<?php echo $addnewEvent ?>" onClick="window.location = 'addEvent.php';"/>
                </span>
                    </td>
                </tr>



                <!--<tr style="width:150px;height:30px">-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td><span class="table" style="width:570px;height:auto">-->
                <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                <!--</span>-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr style="width:150px;height:30px">-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td><span class="table" style="width:570px;height:auto">-->
                <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                <!--</span>-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr style="width:150px;height:30px">-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td>&nbsp;</td>-->
                <!--<td><span class="table" style="width:570px;height:auto">-->
                <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                <!--</span>-->
                <!--</td>-->
                <!--</tr>-->
            </table>
            </form>
<!--            </form>-->

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