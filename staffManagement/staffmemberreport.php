<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/30/14
 * Time: 12:32 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();

error_reporting(0);

if(isset($_GET["id"]))
{
    $StaffId=$_GET["id"];
}else{
    $StaffId="";
}

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

        .title
        {
            position: absolute;
            left: 205px;
            top: 150px;
            text-align: center;

        }


        .stafftable
        {
            position: absolute;
            left: 125px;
            top:300px;
            width: 600px;
        }



    </style>


</head>
<body>

<table class="title">

    <tr>
        <td><h3>D.S.Senanayake College</h3></td>
    </tr>

    <tr>
        <td><h4> Gregory's Road, Colombo 07, Sri Lanka.</h4></td>
    </tr>

    <tr>
        <td><h3>Staff Member Report</h3></td>
    </tr>

</table>

<form method="get">

    <img id="flag" src="/images/abc.jpg"/>



<table class="stafftable">

    <?php

    $result = getStaffMember($StaffId);

    $i = 1;


    if (!isFilled($result))
    {
        echo "<style> .stafftable{display: none} </style>";
        echo "<tr><td colspan='2'>There are no Requests.</td></tr>";
        //sendNotification("There are no records to show.");
    }
    else
    {
        foreach($result as $row){

            $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

            echo $top;
            echo "<td style='font-weight: bold'> Staff ID </td>";
            echo "<td style='text-align: left'> $row[0] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold; width: 50px' >Name With Initials </td>";
            echo "<td style='text-align: left'> $row[1] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Date of Birth </td>";
            echo "<td style='text-align: left'> $row[2] </td>";
            echo "</tr>";

            if($row[3] == 1)
            {
                $gender = "Male";
            }
            else if($row[3] == 2)
            {
                $gender = "Female";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Gender </td>";
            echo "<td style='text-align: left'> $gender </td>";
            echo "</tr>";

            if($row[4] == 1)
            {
                $nationalityRace= "Sinhala";
            }
            else if($row[4] == 2)
            {
                $nationalityRace = "Sri lankan Tamil";
            }
            else if($row[4] == 3)
            {
                $nationalityRace = "Indian Tamil";
            }
            else if($row[4] == 4)
            {
                $nationalityRace= "Sri lankan Muslim";
            }
            else if($row[4] == 5)
            {
                $nationalityRace= "other";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Race </td>";
            echo "<td style='text-align: left'>$nationalityRace</td>";
            echo "</tr>";

            if($row[5] == 1)
            {
                $religion= "Buddhism";
            }
            else if($row[5] == 2)
            {
                $religion = "Hinduism";
            }
            else if($row[5] == 3)
            {
                $religion = "Islam";
            }
            else if($row[5] == 4)
            {
                $religion= "Catholic";
            }
            else if($row[5] == 5)
            {
                $religion= "Christanity";
            }
            else if($row[5] == 6)
            {
                $religion= "Other";
            }
            echo "<tr>";
            echo "<td style='font-weight: bold'> Religion </td>";
            echo "<td style='text-align: left'> $religion </td>";
            echo "</tr>";

            if($row[6] == 1)
            {
                $civilStatus = "Married";
            }
            else if($row[6] == 2)
            {
                $civilStatus= "Not married";
            }
            else if($row[6] == 3)
            {
                $civilStatus= "Widow";
            }
            else if($row[6] == 4)
            {
                $civilStatus= "Other";
            }
            echo "<tr>";
            echo "<td style='font-weight: bold'> Civil Status </td>";
            echo "<td style='text-align: left'> $civilStatus </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> NIC Number </td>";
            echo "<td style='text-align: left'> $row[7] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Postal Address </td>";
            echo "<td style='text-align: left'> $row[8] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Contact Number </td>";
            echo "<td style='text-align: left'> $row[9] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Date Appointed as a Teacher/Principal </td>";
            echo "<td style='text-align: left'> $row[10] </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Date Joined To this School </td>";
            echo "<td style='text-align: left'> $row[11] </td>";
            echo "</tr>";

            if($row[12] == 1)
            {
                $employmentStatus= "Full Time";
            }
            else if($row[12] == 2)
            {
                $employmentStatus= "Part Time";
            }
            else if($row[12] == 3)
            {
                $employmentStatus = "Fulltime_Released to other school";
            }
            else if($row[12] == 4)
            {
                $employmentStatus= "Fulltime_Brought from other school";
            }
            else if($row[12] == 5)
            {
                $employmentStatus= "On Contract  Government";
            }
            else if($row[12] == 6)
            {
                $employmentStatus= "Paid From School fees ";
            }
            else if($row[12] == 7)
            {
                $employmentStatus= "Other Government Department";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Employement Status </td>";
            echo "<td style='text-align: left'> $employmentStatus </td>";
            echo "</tr>";

            if($row[13] == 1)
            {
                $medium= "Sinhala";
            }
            else if($row[13] == 2)
            {
                $medium= "Tamil";
            }
            else if($row[13] == 3)
            {
                $medium = "English";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Medium </td>";
            echo "<td style='text-align: left'> $medium </td>";
            echo "</tr>";

            if($row[14] == 1)
            {
                $positionInSchool= "Principal";
            }
            else if($row[14] == 2)
            {
                $positionInSchool= "Acting Principal";
            }
            else if($row[14] == 3)
            {
                $positionInSchool = "Deputy principal";
            }
            else if($row[14] == 4)
            {
                $positionInSchool= "Acting Deputy principal";
            }
            else if($row[14] == 5)
            {
                $positionInSchool= "Assistant principal";
            }
            else if($row[14] == 6)
            {
                $positionInSchool= "Acting Assistant principal";
            }
            else if($row[14] == 7)
            {
                $positionInSchool= "Teacher";
            }


            echo "<tr>";
            echo "<td style='font-weight: bold'>Position in School</td>";
            echo "<td style='text-align: left'>$positionInSchool</td>";
            echo "</tr>";

            if($row[15] == 1)
            {
                $section= "Primary Multiple";
            }
            else if($row[15] == 2)
            {
                $section= "Primary English";
            }
            else if($row[15] == 3)
            {
                $section = "Primary Second Language";
            }
            else if($row[15] == 4)
            {
                $section= "Secondary Science Maths";
            }
            echo "<tr>";
            echo "<td style='font-weight: bold'>Section</td>";
            echo "<td style='text-align: left'>$section</td>";
            echo "</tr>";

            if($row[16] == 1)
            {
                $subjectMostTaught= "Science";
            }
            else if($row[16] == 2)
            {
                $subjectMostTaught= "English";
            }
            else if($row[16] == 3)
            {
                $subjectMostTaught= "Physics";
            }
            else if($row[16] == 4)
            {
                $subjectMostTaught= "Mechanics";
            }
            else if($row[16] == 5)
            {
                $subjectMostTaught= "Chemistry";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Subject Most Taught </td>";
            echo "<td style='text-align: left'> $subjectMostTaught </td>";
            echo "</tr>";

            if($row[17] == 1)
            {
                $subjectSecondMostTaught= "Science";
            }
            else if($row[17] == 2)
            {
                $subjectSecondMostTaught= "English";
            }
            else if($row[17] == 3)
            {
                $subjectSecondMostTaught= "Physics";
            }
            else if($row[17] == 4)
            {
                $subjectSecondMostTaught= "Mechanics";
            }
            else if($row[17] == 5)
            {
                $subjectSecondMostTaught= "Chemistry";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Subject Second Most Taught </td>";
            echo "<td style='text-align: left'> $subjectSecondMostTaught </td>";
            echo "</tr>";

            if($row[18] == 1)
            {
                $serviceGrade= "SriLanka Education Administrative ServiceI";
            }
            else if($row[18] == 2)
            {
                $serviceGrade= "SriLanka Education Administrative ServiceII";
            }
            else if($row[18] == 3)
            {
                $serviceGrade= "SriLanka Education Administrative ServiceIII";
            }
            else if($row[18] == 4)
            {
                $serviceGradet= "SriLanka Principal ServiceI";
            }
            else if($row[18] == 5)
            {
                $serviceGrade= "SriLanka Principal ServiceII";
            }

            echo "<tr>";
            echo "<td style='font-weight: bold'> Service Grade </td>";
            echo "<td style='text-align: left'> $serviceGrade </td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td style='font-weight: bold'> Salary </td>";
            echo "<td style='text-align: left'> $row[19] </td>";
            echo "</tr>";
        }
    }
    ?>
</table>
</form>
</body>
</html>



