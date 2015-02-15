<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/11/14
 * Time: 4:45 PM
 */

require_once("../dbAccess.php");
require_once("../common.php");

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Attendance System') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */


if(!isFilled($_SESSION["user"]))
{
    header("Location: " . PATHFRONT . "/Menu.php");
}

if(isset($_GET["logout"]))
{
    $_SESSION["user"] = NULL;
    header("Location: " . PATHFRONT . "/Menu.php");
}

if( !isset( $_GET["date"] ) ){
    header("Location: " . PATHFRONT . "/Menu.php");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Absentees List</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>
    <link href="<?php echo PATHFRONT ?>/Styles/common.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <script>
        function printPage(){
            console.log("printing");
            window.print();
            console.log("printing");
        }
    </script>
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        h2,h3,h5,h4{
            text-align: center;
        }
        #flag {
            position: relative;
            top: -10px;
            left:205pt;
            /*border: 5px solid black;*/
            width: 120px;
            height: 120px;
        }
        .report{
        }
        .report, .report th, .report td{
            /*text-align: justify;*/
            border: 1px solid black;
            border-collapse: collapse;
            max-height: 300px;


        }
        .report .headerRow{
            height:50px;
        }
        .report{
            position: relative;
            margin: 0 auto;
            clear: both;
        }
        .report td{
            padding: 5px 10px 5px 10px;
        }

    </style>
</head>
<body>
    <h1>Staff Absentees List</h1>
    <h3><?php echo 'Generated on ' . strftime( "%d/%m/%Y %l:%M:%S %p", time() ) ?></h3>
    <h2>Staff Members Absent on <?php echo strftime( "%d/%m/%Y", strtotime( $_GET["date"] ) ) ?></h2>

    <table class="report">
        <tr class="secret">
        </tr>
        <tr></tr>
        <tr class="headerRow">
            <td id="">Signature No</td>
            <td id="">Name with Initials</td>
            <td id="">Medium</td>
        </tr>

        <?php

        $result = getAbsenteesList( $_GET[ "date" ] );

        if ($result == null)
        {
            echo "<tr><td colspan='5'>Attendance has not been taken for that date.</td></tr>";
        }
        else
        {
            $firstRow = $result[0];

            $currentSection = -1;
            $allSections = getFormOptions('section', 1);
            $sectionArr = array();
            $mediumArray = array( 'S', 'T', 'E' );
            $i = 0;
            foreach( $allSections as $section ){
                $sectionArr[ $i ] = $section[ 1 ];
                $i++;
            }

//            echo $sectionArr[1];

            foreach($result as $row)
            {
                if( $currentSection != $row[5] ){
                    $currentSection = $row[5];
                    echo "<tr><td colspan='6' class='left'>&nbsp;&nbsp;&nbsp;&nbsp;" . $sectionArr[ $row[ 5 ] - 1 ] . "</td> </tr>";
                }
                echo "<tr>\n<td class='right'>";
                echo "$row[1]</td><td>";
                echo "$row[2]</td><td class='center'>";
                echo $mediumArray[ $row[3] - 1 ] . "</td>";
                echo "\n</tr>";
            }
        }

        ?>

    </table>

    <br />

    <input id="PrintButton" class="printButton" type="button" value="Print Report" />

</body>
</html>