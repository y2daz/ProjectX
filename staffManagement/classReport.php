<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/11/14
 * Time: 4:45 PM
 */


session_start();

require_once("../dbAccess.php");
require_once("../common.php");

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

if(!isFilled($_COOKIE['language']))
{
    setcookie('language', '0'); //where 0 is English and 1 is Sinhala
}
if(!isFilled($_SESSION["user"]))
{
    header("Location: " . PATHFRONT . "/Menu.php");
}
if(isset($_GET["logout"]))
{
    $_SESSION["user"] = NULL;
    header("Location: " . PATHFRONT . "/Menu.php");
}


$result = getAllStaff();

/*LANGUAGE
 *
 * */
$line1 = "Class Teacher Allocation";
$line2 = "D.S Senanayake College";
$line3 = "Gregory's Road, Colombo 7";


$column0Header = "Grade and Class";
$column1Header = "Class";
$column2Header = "Teacher ID";
$column3Header = "Teacher Name";

/*LANGUAGE
 *
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Class Report</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

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
            /*border: 5pxxx solid black;*/
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
        h4{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 380pt;

        }
        .report{

            position: relative;
            margin: 0 auto;
            clear: both;
        }
        .report .center1{
            text-align: center;
            max-width: 100px;
        }

        .secret td{
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
        }
        .report td{
            padding: 5px 10px 5px 10px;
        }

        #col_0{
            max-width: 130px;
            min-width: 130px;
            padding-left: 10px;
            padding-right: 10px;
        }

        #col_2{
            max-width: 150px;
            min-width: 100px;
            padding-left: 8px;
            padding-right: 8px;
        }
        #col_3{
            max-width: 240px;
            min-width: 240px;
        }

        #PrintButton{
            position: absolute;
            top: 100px;
            left :40px;
            font-size: 1.5em;
        }
    </style>
</head>

<body>




<form method="get">
    <table id="info">
        <tr>
        <th>
            <img id="flag" src="/images/abc.jpg"/>


    </table>
</form>

<h3><?php echo $line2 ?></h3>
<h5><?php echo $line3 ?></h5>
<h2><?php echo $line1 ?></h2>





<table class="report">
    <tr class="secret">

    </tr>
    <tr></tr>
    <tr class="headerRow">
        <td id="col_0"><?php echo $column0Header ?></td>
<!--        <td id="col_1">--><?php //echo $column1Header ?><!--</td>-->
        <td id="col_2"><?php echo $column2Header ?></td>
        <td id="col_3"><?php echo $column3Header ?></td>

    </tr>


    <?php

    $result = getAllClassroom();

    if ($result == null)
    {
        echo "<tr><td colspan='5'>There are no records to show.</td></tr>";
    }
    else
    {
        foreach($result as $row)
        {
            echo "<tr>\n";
            echo "<td>$row[0] $row[1]</td>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[3]</td>";
            echo "</tr>\n";
        }
    }


    ?>

</table>
<button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>

<br />

</body>
</html>