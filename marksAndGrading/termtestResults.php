﻿<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 27/07/14
 * Time: 07:26
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();
//error_reporting(E_ERROR | E_PARSE);



if (isset($_POST["submit"]))
{


    $AdmissionNoVar =$_POST["AdmissionNumber"];
    $SubjectVar = $_GET["Subject"];
    $TermVar = $_GET["Term"];
    $MarkVar = $_POST["marks"];
    $RemarksVar = $_POST["remarks"];


    $operation =  insertTermTestMarks($AdmissionNoVar, $SubjectVar, $TermVar, $MarkVar, $RemarksVar);


//    echo $AdmissionNoVar . "<br />";
//    echo $SubjectVar. "<br />";
//    echo $TermVar . "<br />";
//    echo $MarkVar . "<br />";
//    echo $RemarksVar . "<br />";



    if($operation){
        sendNotification("Insert successful.");
    }
    else{
        sendNotification("Error inserting marks.");
    }
}


if(isset($_GET["gradeAndClass"]))
{
    $arrGradeAndClass = getGradeAndClass($_GET["gradeAndClass"]);
    $Grade = $arrGradeAndClass[0];
    $Class = $arrGradeAndClass[1];
}
else
{
    $Grade = "";
    $Class = "";
}

    $TeacherName = getStaffMember( $_GET["staffId"] );
    $TeacherName = $TeacherName[0][1];

if(isset($_GET["Subject"]))
{
    $Subject = $_GET["Subject"];
}
else
{
    $Subject = "";
}

if(isset($_GET["Year"]))
{

    $Year = $_GET["Year"];
}
else
{
    $Year = "";
}

if(isset($_GET["Term"]))
{
    $Term = $_GET["Term"];
}
else
{
    $Term = "";
}


//echo $Grade;
//echo $Class;
//echo $TeacherName;
//echo $Subject;
//echo  $Year;
//echo $Term;

if($_COOKIE['language'] == 0)
{
    $termtestresults= "Term Test Results";
    $admissionnumber = "Admission Number";
    $grade="Grade";
    $class = "Class";
    $teachername = "Teacher's Name";
    $subject="Subject";
    $year="Year";
    $term="Term";
    $marks="Marks";
    $remarks="Remarks";
    $name="Name";
    $submit="Submit";
    $reset="Reset";
}
else
{

    $term="වාරය";
    $year = "වර්ෂය";
    $subject="විෂය";
    $grade="ශ්‍රේණිය";
    $class="පංතිය";
    $admissionnumber ="ඇතුලත්වීමේ අංකය";
    $teachername="ගුරුවරයාගේ නම";
    $termtestresults="වාර විභාග ප්‍රතිඵල සටහන";
    $marks="ලකුණු";
    $remarks="අදහස්";
    $name="නම";
    $submit="යොමු කරන්න";
    $reset="නැවත පිහිටුවන්න";

}

?>

<html>
<head>
<style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->



        h1{
            text-align: center;
            background-color: #005e77;
            color: #ffffff;
        }
        #details .title{
            background-color: #005e77;
            color: white;
            padding: 2px 10px 2px 10px;
        }

        #marks{
            text-align: left;
            position: relative;
            top:0px;
            left:30px;
            border-collapse: collapse;
            min-width:750px;
        }
        #marks th{
            font-weight: 600;
            color:white;
            background-color: #005e77;
            padding: 2px 5px 2px 5px;
        }
        #marks td{
            padding: 2px 5px 2px 5px;

        }
        #marks tr.alt{
            background-color: #bed9ff;
                }

        form{
            text-align: left;
            }


        input.button {
            position:relative;
            font-weight:bold;
            font-size:20px;
            left:200px;
            bottom:20;
        }

        </style>
    </head>
    <body>

    <form method="post">
        <h1><?php echo $termtestresults ?></h1>

        <table id="details" class="insert" cellspacing="0">

            <tr>
                <td class="title"><?php echo $grade ?></td>
                <td><input type="text" id="grade" name="grade" value="<?php echo $Grade ?>" readonly></td>
            </tr>
            <tr>
                <td class="title"><?php echo $class ?></td>
                <td><input type="text" value="<?php echo $Class ?>" readonly></td>
            </tr>
            <tr>
                <td class="title"><?php echo $teachername ?></td>
                <td><input type="text" value="<?php echo $TeacherName ?>" readonly></td>
            </tr>

            <tr>
                <td class="title"><?php echo $subject ?></td>
                <td><input type="text" value="<?php echo $Subject ?> " readonly></td>
            </tr>

            <tr>
                <td class="title"><?php echo $year ?></td>
                <td><input type="text" value="<?php echo $Year ?>" readonly></td>
            </tr>
            <tr>
                <td class="title"><?php echo $term ?></td>
                <td><input type="text" value="<?php echo $Term ?>" readonly></td>
            </tr>
            </table>


            <h1></h1>
            <h1></h1>

    <table id="marks">
        <tr id="tHeader">

        <tr>
            <th><?php echo $admissionnumber ?></th>
            <th><?php echo $name ?></th>
            <th><?php echo $marks ?></th>
            <th><?php echo $remarks ?></th>
        </tr>

        <?php
        $result = SearchStudentbyclass($Grade. " " . $Class);
        $i = 1;


        if (!isFilled($result))
        {
            echo "<tr><td colspan='6'>There are no records to show.</td></tr>";
        }
        else
        {
            foreach($result as $row){
                $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                echo $top;
                echo "<td>$row[0]</td>";
                echo "<td>$row[1]</td>";
                echo "<td><input type='text' name='marks' value=''></td>";
                echo "<td><input type='text' name='remarks' value=''/> ";
                echo "<input hidden=hidden type='text' name='AdmissionNumber' value='" . $row[0] . "' /></td>";
                echo "</tr>";
            }



        }
        ?>




    </table>
    <input name="submit" class="button" type="submit" value="<?php echo $submit ?>">
    </form>


    </body>
</html>

<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Term Test Results";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>
