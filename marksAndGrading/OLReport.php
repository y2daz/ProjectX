<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 9/26/14
 * Time: 7:02 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();
$Value = "";
$Choice = "";

$IndexNo = "";
$AdmissionNo = "";
$name="";
$Year = "";
$Subject="Subject";
$Grade="Grade";




if(isFilled($_GET["value"]))
{
    $Value = $_GET["value"];
}

if(isFilled($_GET["Choice"]))
{
    $Choice = $_GET["Choice"];
}

if (isset($_POST["Update"])) //User has clicked the submit button to add a user
{
    $operation = UpdateOLResults($_POST["Grade"]);

    if ($operation == true)
    {
        sendNotification("Results Updated Successfully");
    }
    else
    {
        sendNotification("Error updating Results.");
    }
}


if (isset($_GET["expand"]))
{
    $result = getOlResults($_GET["expand"]);



    foreach($result as $row) //
    {


        $IndexNo = $row[0];
        $AdmissionNo = $row[1];

        $Year = $row[3];
        $Subject=$row[4];
        $Grade=$row[5];

    }

}
else
{  $IndexNo = "";
    $AdmissionNo="";

    $Year = "";
    $Subject="";
    $Grade="";

}

if (isset($_POST["NewGrade"])){

    $operation = updateOLResults($_POST["IndexNo"], $_POST["Subject"], $_POST["Grade"] );

    if($operation==1){
        sendNotification("Update successful");
    }
    else{
        sendNotification("Error updating grade.");
    }
}



?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>


<!--    <script src="timetable.js"></script>-->
    <style type="text/css">
        #flag {
            position: relative;
            top: -70px;
            left:205pt;
            /*border: 5px solid black;*/
            width: 120px;
            height: 120px;
        }

        #sch{
            position:relative;
            font-size: 24pt;
            text-align: center;
            left:10pt;
            top: 170pt;

        }

        #hd{
            position: relative;
            font-size: 14pt;
            text-align: center;
            bottom: -50px;
            top: -60pt;
            left: 10pt;



        }

        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 170pt;

        }
    </style>

    
</head>
<body>

<h1 id="sch">D.S.Senanayake College</h1>
<h2>Gregory's Road,Colombo 07,Sri Lanka.</h2>
<h1 id="hd">THE GENERAL CERTIFICATE OF EDUCATION</h1>
<h1 id="hd">ORDINARY LEVEL</h1>

<!--    <h2>--><?php //echo getLanguage("chooseOption", $lang) ?><!--</h2>-->
<form method="get">
    <table id="info">
        <tr>
            <th>
                <img id="flag" src="/images/dslogo.jpg"/>


    </table>
</form>

<body>



<form method="get">

    <table class="insert">

        <th>Subject</th>
        <th colspan="2">Grade</th>

        <?php


        if(is_numeric($Value))
        {
            if($Choice == "IndexNo")
            {
                $result = searchOLMarks($Value);
            }
            else if($Choice == "AdmissionNo")
            {
                $result = searchOLbyAdmission($Value);
            }
            else if($Choice == "Year")
            {
                $result = searchOLbyYear($Value);
            }
            if(isFilled($result))
            {
                $i = 1;

                foreach($result as $row){
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                    $IndexNo = $row[0];
                    $AdmissionNo = $row[1];
                    $name=$row[2];
                    $Year = $row[3];

                    echo $top;
                    echo "<td>$row[4]</td>";
                    echo "<td><input class='grade notEditable' name='txt$row[4]' value='$row[5]' readonly/></td>";
                    echo "<td><input class='edit' type='button' name='$row[4]' value='Edit' /></td>";


                    echo "</tr>";
//                                echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"OLinput.php?expand=" . $row[0] . "\" /> </td> ";
                }
            }
            else
            {
                echo "<style> .insert{display: none} </style>";

                sendNotification("No records found");
            }

        }
        else
        {
            echo "<style> .insert{display: none} </style>";

            sendNotification("Invalid search parameter entered");
        }



        ?>

    </table>

    <table class="insert2">

        <tr>
            <td>Index Number</td>
            <td><input type="text" id="IndexNo" name="IndexNo" value="<?php echo $IndexNo ?>" readonly /></td>
        </tr>

        <tr>
            <td>Admission Number</td>
            <td><input type="text" name="AdmissionNo"  value="<?php echo $AdmissionNo ?>" readonly/> </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="Name"  value="<?php echo $name ?>" readonly/> </td>
        </tr>



        <tr>
            <td>Year</td>
            <td><input type="text" name="Year" value="<?php echo $Year ?>" readonly /> </td>
        </tr>







    </table>



</form>


</body>
</html>


