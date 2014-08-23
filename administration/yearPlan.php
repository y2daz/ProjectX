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


/*Calendar was created with reference to
http://www.opal-creations.co.uk/blog/free-scripts-and-code/php-linear-year-view-calendar*/

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");
ob_start();


$dDaysOnPage = 37;
$dDay = 1;//Sets weekend
$dYear = date("Y");


if (isFilled($_POST[0]))
{
    echo insertHolidays($dYear, $_POST);
}

?>
<html>
    <head>
        <script>
            $(document).ready(function(){
                    $('.day1, .day2, .day3, .day4, .day5').click(function(){  //Only allows selecting of weekdays
                        this.classList.toggle("selected");
                    });

                }
            )

        </script>
        <script src="yearPlan.js"></script>

        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

    .currentDay {
        background:#FFC;
        color:red;
        font-weight: 600;
    }
    #calendar {
        border-collapse:collapse;
        border:1px #005e77 solid;
    }
    #calendar th{
        background-color: #005e77;
        color: white;
    }
    #calendar td {
        padding-top:10px;
        padding-bottom:10px;
        padding-left:2px;
        padding-right:2px;
        vertical-align:top;
        text-align:center;
        min-width:15px;
    }

    .days:hover {
        background:#9F0;
        border-color:#000;
    }
    .day6 {
        background:#ECECEC;
    }
    .day7 {
        background:#ECECEC;
    }
    .monthName {
        text-align:left;
        vertical-align:middle;
    }
    .monthName div {
        padding-left:10px;
    }
    .selected {
        background-color: #bed9ff;
    }



    h1 {
        text-align:center;
    }

    .button{
        left:100px;
    }

        </style>
    </head>
  <body>
  <h1>Year Plan</h1>

    <table id="calendar" border="1">
        <tr>
            <th><?php echo $dYear; ?></th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
            <th>S</th>
            <th>M</th>
            <th>T</th>
            <th>W</th>
            <th>T</th>
            <th>F</th>
            <th>S</th>
            <th>S</th>
            <th>M</th>
            <th>T</th>
        </tr>



    <?php

        function InsertBlankTd($numberOfTdsToAdd) {
            $tdString = "";
            for($i = 1; $i <= $numberOfTdsToAdd; $i++) {
                $tdString .= "<td></td>";
            }
            return $tdString;
        }

        function FriendlyDayOfWeek($dayNum) //Converts Sunday to 7
        {
            if ($dayNum == 0)
            {
                return 7;
            }
            else
            {
                return $dayNum;
            }
        }

        for ($mC=1;$mC<=12;$mC++)
        { //mc is Month, dDay is digit of day
            $currentDT = mktime(0, 0, 0, $mC, $dDay, $dYear);
            echo "<tr><td class='monthName'><div>" . date("F", $currentDT) . "</div></td>";
            $daysInMonth = date("t", $currentDT);
            echo InsertBlankTd(FriendlyDayOfWeek(date("w", $currentDT)) - 1);

            for ($i = 1; $i <= $daysInMonth; $i++) {
                $exactDT = mktime(0, 0, 0, $mC, $i, $dYear);
//                if ($i==date("d") && date("m",$currentDT) == date("m")) //Look for today (Not important to us)
//                {
//                    $class="currentDay";
//                }
//                else
//                {
                    $class = "";
//                }
                echo "<td class='" . $class. " days day" . FriendlyDayOfWeek(date("w",$exactDT)) . "' name=\"" . $i . "/$mC" . "/$dYear\"  >$i</td>";
            }

            echo InsertBlankTd($dDaysOnPage - $daysInMonth - FriendlyDayOfWeek(date("w",$currentDT)) + 1);
            echo "</tr>";
        }
    ?>
            </table>
            </body>
        </html>

    <br />
    <input type="button" class="button" name="Update" value="Update" onclick="submitYearPlan();">

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>