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

$startDate = isset( $_GET[ "startDate" ] ) ? $_GET[ "startDate" ] : "" ;
$endDate = isset( $_GET[ "endDate" ] ) ? $_GET[ "endDate" ] : "" ;

?>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

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
            <td><h3>Staff Leave Report</h3></td>
        </tr>
        <tr>
            <td><h3>From <?php echo $startDate?> to <?php echo $endDate?> </h3></td>
        </tr>
    </table>

    <img id="flag" src="/images/abc.jpg"/>


   <table class="leaveTable2">

        <th>Staff IDn</th>
        <th>Name</th>
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

        $startDate = date_format( date_create( $startDate ), 'Y-m-d' );
        $endDate = date_format( date_create( $endDate ), 'Y-m-d' );

        $result = getStaffLeave( $startDate, $endDate );

        $i = 1;

        if ( !isset( $result ) ){
            echo "<tr><td colspan='10'>There is no leave data for this period.</td></tr>";
        }
        else{
            foreach($result as $row){
                echo "<tr>";
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td>$row[4]</td>";
                echo "<td>$row[3]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[5]</td>";
                echo '</tr>';

            }
        }
        ?>


    </table>

</body>


</html>



