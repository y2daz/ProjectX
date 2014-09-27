<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/14
 * Time: 9:46 AM
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
$line1 = "Student information Report";
$line2 = "D.S Senanayake College Colombo 7";

$column0Header = "Grade";
$column1Header = "Class";
$column2Header = "Admission Number";
$column3Header = "Student Name";

/*LANGUAGE
 *
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Report</title>

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
        h1,h3{
            text-align: center;
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
            /*text-align: center;*/
            position: relative;
            margin: 0 auto;
            clear: both;
        }
        .report .center{
            text-align: center;
            max-width: 100px;
        }

        .secret td{
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
        }

        #col_0{
            max-width: 50px;
            min-width: 50px;
            padding-left: 10px;
            padding-right: 10px;
        }
        #col_1{
            max-width: 50px;
            min-width: 50px;
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
            max-width: 250px;
            min-width: 150px;
            padding-left: 10px;
            padding-right: 10px;
        ;
        }
        /*.rotate { *//*http://css-tricks.com/snippets/css/text-rotation/ *//*
            *//* Safari *//*
            -webkit-transform: rotate(-90deg);
            *//* Firefox *//*
            -moz-transform: rotate(-90deg);
            *//* IE *//*
            -ms-transform: rotate(-90deg);
            *//* Opera *//*
            -o-transform: rotate(-90deg);
            *//* Internet Explorer *//*
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

            *//*vertical-align: top;*//*
        }*/
        #PrintButton{
            position: absolute;
            top: 100px;
            left :40px;
            font-size: 1.5em;
        }
    </style>
</head>

<body>

<h1><?php echo $line1 ?></h1>
<h3><?php echo $line2 ?></h3>

<table class="report">
    <tr class="secret">

    </tr>
    <tr></tr>
    <tr class="headerRow">
        <td id="col_0"><?php echo $column0Header ?></td>
        <td id="col_1"><?php echo $column1Header ?></td>
        <td id="col_2"><?php echo $column2Header ?></td>
        <td id="col_3"><?php echo $column3Header ?></td>

    </tr>


    <?php

    $result = getAllStudents();

    if ($result == null)
    {
        echo "<tr><td colspan='37'>There are no records to show.</td></tr>";
    }
    else
    {
        foreach($result as $row){
            echo "<tr>\n";
            echo "<td>$row[0]</td>";
            echo "<td>$row[1]</td>";
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