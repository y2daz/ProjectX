<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 9/26/24
 * Time: 7:02 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
include(THISROOT . "/common.php");
ob_start();

/*if(isset($_GET["staffId"])){
    $StaffId = $_GET[ "staffId" ];
}else{
    $StaffId = "";
}*/

$StaffId = isset( $_GET[ "staffId" ] ) ? $_GET[ "staffId" ] : "" ;
$startDate = isset( $_GET[ "startDate" ] ) ? $_GET[ "startDate" ] : "" ;
$endDate = isset( $_GET[ "endDate" ] ) ? $_GET[ "endDate" ] : "" ;

$dDaysOnPage = 37;
$dDay = 1;//Sets weekend
$dYear = getConfigData( "currentYear" );

$staffMember = getStaffMember( $StaffId );
$staffMember = $staffMember[0];
$stfName = $staffMember[1];

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <style type="text/css">
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
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
            opacity: 1;
        }

        .days:hover {
            background:#9F0;
            border-color:#000;
            cursor: pointer;
        }
        .day6 {
            background:#DEDEDE;
        }
        .day7 {
            background:#DEDEDE;
        }
        .monthName {
            text-align:left;
            vertical-align:middle;
        }
        .monthName div {
            padding-left:10px;
        }
        .holiday {
            background-color: #bed9ff;
        }
        .dutyLeave{
            background-color: #ffa726;
        }
        .medicalLeave{
            background-color: #ff4d51;
        }
        .otherLeave{
            background-color: #d0ff7f;
        }
        .publicHoliday {
            background-color: #2baf2b;
        }

        h1 {
            text-align:center;
        }
        .button{
            left:100px;
        }

        #legend{
            position: relative;
            left: 745px;
            min-width: 200px;
            display: block;
            border:1px #005e77 solid;
            /*border-collapse: collapse;*/
        }
        #legend th{
            background-color: #005e77;
            color: white;
        }
        #legend td{
            border: none;
            border-collapse: collapse;
        }
        #legend .colourCol{
            /*width: 15px;*/
            /*height: 30px;*/
            padding-top:10px;
            padding-bottom:10px;
            padding-left:0px;
            padding-right:0px;
            vertical-align:top;
            text-align:center;
            min-width:15px;
            border: 1px #005e77 solid;
            al
        }
        #legend .type{
            padding-left: 20px;
        }
        #sbtTable{
            min-width: 800px;
            align-content: center;
            text-align: center;
        }

    </style>
</head>
<body>

    <h1>Visual Leave Report for <?php echo $stfName; ?></h1>

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
            return ( $dayNum == 0 ? 7 : $dayNum );
        }

        $leaveData = getLeave( $StaffId, $startDate, $endDate, "startDate" );

        function organiseFullLeaveData( $leaveData ){
            /**
             * WHERE $leaveData is result of getLeave( $staffId, $startDate, $endDate, "startDate" );
             *
             * Returns
             * ARRAY {
             *      { [startDate1] , [endDate1], [NoOfDuty1], [NoOfMedical1], [NoOfOther1] }
             *      { [startDate2] , [endDate2], [NoOfDuty2], [NoOfMedical2], [NoOfOther2] }
             *      { [startDate3] , [endDate3], [NoOfDuty3], [NoOfMedical3], [NoOfOther3] }
             *      .
             *      .
             *      .
             *      { [startDateX] , [endDateX], [NoOfDutyX], [NoOfMedicalX], [NoOfOtherX] }
             *      }
             */

            $result = array();
            $i = 0;

            foreach( $leaveData as $row ){
                $result[ $i ][ 0 ] = $row[ 6 ]; //startDate
                $result[ $i ][ 1 ] = $row[ 7 ]; //endDate
                $result[ $i ][ 2 ] = $row[ 4 ]; //NoOfDuty
                $result[ $i ][ 3 ] = $row[ 3 ]; //NoOfMedical
                $result[ $i++ ][ 4 ] = $row[ 2 ]; //NoOfOther
            }
            //Prevent access array with index out of bounds
            $result[ $i ][ 0 ] = NULL;
            $result[ $i ][ 1 ] = NULL;
            $result[ $i ][ 2 ] = NULL;
            $result[ $i ][ 3 ] = NULL;
            $result[ $i ][ 4 ] = NULL;
//            echo "<pre>" . var_export( $result ) . "</pre>";
            return $result;
        }

        $leaveData = organiseFullLeaveData( $leaveData );
        $leaveDataCounter = 0;

        $holidaysArr = getHolidays($dYear);
        $hDayCounter = 0; //Holiday counter

        $noOfDuty = 0;
        $noOfMedical = 0;
        $noOfOther = 0;

        $colouring = FALSE;

        for ($mC=1;$mC<=12;$mC++)
        { //mc is Month, dDay is digit of day
            $currentDT = mktime(0, 0, 0, $mC, $dDay, $dYear);
            echo "<tr><td class='monthName'><div>" . date("F", $currentDT) . "</div></td>";
            $daysInMonth = date("t", $currentDT);
            echo InsertBlankTd( FriendlyDayOfWeek( date( "w", $currentDT ) ) - 1 );

            for ($i = 1; $i <= $daysInMonth; $i++) {
                $exactDT = mktime(0, 0, 0, $mC, $i, $dYear);
                $formattedDate = date("d/m/Y", $exactDT); /*$i . "/$mC" . "/$dYear";*/

                $leaveSDate = date_format( date_create( $leaveData[ $leaveDataCounter ][ 0 ] ), 'd/m/Y' );
                $leaveEDate = date_format( date_create( $leaveData[ $leaveDataCounter ][ 1 ] ), 'd/m/Y' );
//                echo $leaveSDate . "<br />";

                if( $colouring == TRUE){
                    if( strcmp( $formattedDate, $leaveEDate ) == 0 ){
                        $colouring = FALSE;
                        $class = "";
                        $leaveDataCounter++;
                    }

                    if( $noOfDuty > 0 ){
                        $noOfDuty--;
                        $class = "dutyLeave";
                    }
                    elseif( $noOfMedical > 0 ){
                        $noOfMedical--;
                        $class = "medicalLeave";
                    }
                    elseif( $noOfOther > 0 ){
                        $noOfOther--;
                        $class = "otherLeave";
                    }
                    else{
                        $class = "otherLeave";
                    }

                }
                elseif( strcmp( $formattedDate, $leaveSDate ) == 0 ){
                    $colouring = TRUE;
                    $noOfDuty = $leaveData[ $leaveDataCounter ][2];
                    $noOfMedical = $leaveData[ $leaveDataCounter ][3];
                    $noOfOther = $leaveData[ $leaveDataCounter ][4];

                    //MORE STUFF

                    if( $noOfDuty > 0 ){
                        $noOfDuty--;
                        $class = "dutyLeave";
                    }
                    elseif( $noOfMedical > 0 ){
                        $noOfMedical--;
                        $class = "medicalLeave";
                    }
                    elseif( $noOfOther > 0 ){
                        $noOfOther--;
                        $class = "otherLeave";
                    }
                    else{
                        $class = "otherLeave";
                    }

                }else{
                    $class = "";
                }



                if( strcmp( $formattedDate, $holidaysArr[ $hDayCounter ] ) == 0 ){
                    $class .= " holiday";
                    $hDayCounter++;
                }

                echo "\t\t<td class='" . $class. " days day" . FriendlyDayOfWeek(date("w",$exactDT)) . "' name=\"" . $formattedDate . "\"  >$i</td>\n";
            }

            echo InsertBlankTd($dDaysOnPage - $daysInMonth - FriendlyDayOfWeek(date("w",$currentDT)) + 1);
            echo "</tr>\n\n";
        }
        ?>
    </table>

    <br />

    <table id="legend">
        <tr>
            <th colspan="11">Legend</th>
        </tr>
        <tr>
            <td class="holiday">
                <div class="colourCol">22</div>
            </td>
            <td>
                School Holiday
            </td>
        </tr>
        <tr>
            <td class="dutyLeave">
                <div class="colourCol">22</div>
            </td>
            <td>
                Duty Leave
            </td>
        </tr>
        <tr>
            <td class="medicalLeave">
                <div class="colourCol">22</div>
            </td>
            <td>
                Medical Leave
            </td>
        </tr>
        <tr>
            <td class="otherLeave">
                <div class="colourCol">22</div>
            </td>
            <td>
                Other Leave
            </td>
        </tr>
    </table>

</body>
</html>