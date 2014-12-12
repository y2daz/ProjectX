<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 9/26/14
 * Time: 7:02 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
include(THISROOT . "/common.php");
ob_start();

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Leave Approval') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */

/*if(isset($_GET["staffId"])){
    $StaffId = $_GET[ "staffId" ];
}else{
    $StaffId = "";
}*/

$StaffId = isset( $_GET[ "staffId" ] ) ? $_GET[ "staffId" ] : "" ;
$startDate = isset( $_GET[ "startDate" ] ) ? $_GET[ "startDate" ] : "" ;
$endDate = isset( $_GET[ "endDate" ] ) ? $_GET[ "endDate" ] : "" ;

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo PATHFRONT ?>/Styles/common.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <style type="text/css">
        #flag {
            position: absolute;
            left: 290px;
            top:10px;
            width: 120px;
            height: 120px;
        }
        .title{
            position: absolute;
            left: 205px;
            top: 150px;
            text-align: center;
        }
        .leaveTable{
            position: absolute;
            left:58px;
            top: 290px;
            width: 250px;
        }
        .leaveTable2{
            position: absolute;
            left: 45px;
            top: 350px;
        }
        .leaveTable2 td{
            text-align: center;
        }
        .leaveTable2 th{
            width: 100px;
        }
        .right{
            text-align: right;
        }
        .strong{
            font-weight: 700;
        }
    </style>
</head>
<body>

    <table class="title">
        <tr>
            <td><h3>D.S.Senanayake College</h3></td>
        </tr>
        <tr>
            <td><h4>Gregory's Road, Colombo 07, Sri Lanka.</h4></td>
        </tr>
        <tr>
            <td><h3>Individual Staff Leave Report</h3></td>
        </tr>
    </table>

    <img id="flag" src="/images/abc.jpg"/>


    <table class="leaveTable">

        <?php

        $result = getStaffMember( $StaffId, true );

        $i = 1;


        if ( isset( $result ) ){
            foreach($result as $row){

                $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                echo $top;
                    echo "<td> Staff ID</td>";
                    echo "<td> " . getStaffNo( $row[0] ) . "</td>";
                echo "</tr>";

                echo "<tr>";
                    echo "<td> Name </td>";
                    echo "<td> $row[1] </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>

    <table class="leaveTable2">

        <th>Date Leave Begun</th>
        <th>Date Assumed Duty</th>
<!--        <th>-->
<!--            <table>-->
<!--                <tr>-->
<!--                    <th colspan="3"> Days taken </th>-->
<!--                </tr>-->
<!--                <tr>-->
        <th> No of Duty</th>
        <th> No of Medical</th>
        <th> No of Casual</th>
<!--                </tr>-->
<!--            </table>-->
<!--        </th>-->
        <th>Total</th>


        <?php

        $result = getLeave( $StaffId, $startDate, $endDate, NULL, true );

        $i = 0;
        $totalLeave = 0;

        if ( !isset( $result ) ){
            echo "<tr><td colspan='10'>There are no Leave Requests.</td></tr>";
        }
        else{
            foreach($result as $row){
                echo "<tr>";
                echo "<td>$row[6]</td>";
                echo "<td>$row[7]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>" . ( $row[2] + $row[3] ) . "</td>";
                echo "</tr>\n";
                $totalLeave += ( $row[2] + $row[3] );
                echo ( ++$i % 5 == 0 ? "<tr><td colspan='7'>&nbsp;</td></tr>\n" : "" );
            }
            echo ( $i % 5 == 0 ? "" : "<tr colspan='7'><td>&nbsp;</td></tr>\n" );
            echo "<tr><td colspan='4' class='right'></td> <td class='strong'>Total taken:</td>  <td>$totalLeave</td></tr>\n";
        }
        ?>


    </table>

    <input id="PrintButton" class="printButton" type="button" value="Print Report" />

</body>
</html>



