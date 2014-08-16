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

?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

body {
    font-family:"Calibri";
    color:#009;
}
.currentDay {
    background:#FFC;
    color:red;
}
table {
    border-collapse:collapse;
    border:1px #009 solid;
}
td {
    height:60px;
    vertical-align:top;
    text-align:center;
    width:30px;
}
.days:hover {
    background:#9F0;
    border-color:#000;
}
.day6 {
    background:#ECECFF;
}
.day7 {
    background:#ECECFF;
}
.monthName {
    text-align:left;
    vertical-align:middle;
}
.monthName div {
    padding-left:10px;
}

    h1 {
        text-align:center;
    }

        </style>
    </head>
  <body>
<?php
$dDaysOnPage = 37;
$dDay = 1;
if ($_REQUEST['year'] <> "") { $dYear = $_REQUEST['year']; } else { $dYear = date("Y"); }
?>

    <table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
            <th><?php echo $dYear; ?></th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
            <th>We</th>
            <th>Th</th>
            <th>Fr</th>
            <th>Sa</th>
            <th>Su</th>
            <th>Mo</th>
            <th>Tu</th>
        </tr>

    <?php

        function FriendlyDayOfWeek($dayNum) {
        // converts the sunday to 7
        // This function can be removed in php 5 by - date("N"),
        // just remove function calls below and replace by swapping date("w" for date("N"
        if ($dayNum == 0){ return 7; } else { return $dayNum; }
        }

        for ($mC=1;$mC<=12;$mC++) {
        $currentDT = mktime(0,0,0,$mC,$dDay,$dYear);
        echo "<tr><td class='monthName'><div>".date("F",$currentDT)."</div></td>";
        $daysInMonth = date("t",$currentDT);

        echo InsertBlankTd(FriendlyDayOfWeek(date("w",$currentDT))-1);

        for ($i=1;$i<=$daysInMonth;$i++) {
        $exactDT = mktime(0,0,0,$mC,$i,$dYear);
        if ($i==date("d")&&date("m",$currentDT)==date("m")) { $class="currentDay"; } else { $class = ""; }
        echo "<td class='".$class." days day".FriendlyDayOfWeek(date("w",$exactDT))."'>".$i."</td>";
        }

        echo InsertBlankTd($dDaysOnPage - $daysInMonth - FriendlyDayOfWeek(date("w",$currentDT))+1);
        echo "</tr>";
        }
        ?>
            </table>
            </body>
        </html>
        <?php
        function InsertBlankTd($numberOfTdsToAdd) {
        for($i=1;$i<=$numberOfTdsToAdd;$i++) {
        $tdString .= "<td></td>";
        }
        return $tdString;
        }
?>


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