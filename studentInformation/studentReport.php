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

error_reporting(0);

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


$result =getAllStudents();

/*LANGUAGE
 *
 * */
$line1 = "Student Details Report";
$line2 = "D.S Senanayake College";
$line3 = "Gregory's Road, Colombo 7";
$line4 = "තමාට පෙර රට";

$column0Header = "Grade and Class";
$column1Header = "Date of Birth";
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

        #col0{
            max-width: 250px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;
        }
        #col1{
            width: 200px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: left;
        }
        #col2{
            max-width: 150px;
            min-width: 100px;
            padding-left: 8px;
            padding-right: 8px;
            text-align: center;
        }
        #col3{
            max-width: 100px;
            min-width: 100px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;

        }

        #col4{
            width: 100px;
            padding-left: 10px;
            padding-right: 10px;
            text-align: center;;
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

<h2><?php echo $line1 ?></h2>


<form method="get">
    <table id="info">
        <tr>
        <th>
            <img id="flag" src="/images/dslogo.jpg"/>


    </table>
</form>

<h3><?php echo $line2 ?></h3>
<h5><?php echo $line3 ?></h5>

<!--<h4>--><?php //echo $line4 ?><!--</h4>-->
<table class="report">
    <tr class="secret">

    </tr>
    <tr></tr>
    <tr class="headerRow">
        <th id="col0">Admission No</th>
        <th id="col1">Name With Initials</th>
        <th id="col2">Date Of Birth</th>
        <th id="col3">Grade</th>
        <th id="col4">Class</th>

    </tr>


    <?php



    $result = studentReport($_GET["Grade"],$_GET["Class"]);
    $i = 1;

    if ($result == null)
    {
        echo "<tr><td colspan='4'>There are no records to show.</td></tr>";
    }
    else
    {
        foreach($result as $row){
            $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td class=\"searchEmail\">" : "<tr><td class=\"searchEmail\">";
            echo $top;
            echo "$row[0]";
            echo "<td id='col1'>$row[1]</td>";
            echo "<td id='col2'>$row[2]</td>";
            echo "<td id='col3'>$row[3]</td>";
            echo "<td id='col4'>$row[4]</td>";

//                    echo "<td><input name=\"Reset\" type=\"button\" value=\"Reset\" onclick=\"resetPassword('" . $row[0] . "');\" /> </td> ";

            echo "</tr>";

            //                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
            //                            post(document.URL, params, "post");
        }
    }
    ?>
</table>
<button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>

<br />

</body>
</html>