﻿<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 19/07/14
 * Time: 17:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");




ob_start();

if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    $operation = updateStaffMember($_POST["staffID"], strtoupper($_POST["NamewithInitials"]), $_POST["DateofBirth"], strtoupper($_POST["Gender"]), ($_POST["NationalityRace"]), ($_POST["Religion"]),($_POST["CivilStatus"]),strtoupper($_POST["NICNumber"]), strtoupper($_POST["MailDeliveryAddress"]), $_POST["ContactNumber"], $_POST["DateAppointedasTeacherPrincipal"], $_POST["DatejoinedthisSchool"], strtoupper($_POST["EmploymentStatus"]),strtoupper($_POST["Medium"]), strtoupper($_POST["PositioninSchool"]), strtoupper($_POST["Section"]), strtoupper($_POST["SubjectMostTaught"]), $_POST["SubjectSecondMostTaught"], $_POST["ServiceGrade"], $_POST["Salary"], $_POST["HighestEducationalQualification"], $_POST["HighestProfessionalQualification"], $_POST["CourseofStudy"]);

    if ($operation == 1)
    {
        sendNotification("Name with Initials successfully updated.");
    }
    elseif ($operation == 2)
    {
        sendNotification("Date of Birth successfully updated.");
    }
    elseif ($operation == 3)
    {
        sendNotification("Gender successfully updated.");
    }
    elseif ($operation == 4)
    {
        sendNotification("Nationality/Race successfully updated.");
    }
    elseif ($operation == 5)
    {
        sendNotification("Religion successfully updated.");
    }
    elseif ($operation == 6)
    {
        sendNotification("CivilStatus successfully updated.");
    }
    elseif ($operation == 7)
    {
        sendNotification("NIC number successfully updated.");
    }
    elseif ($operation == 8)
    {
        sendNotification("Mail Delivery Address successfully updated.");
    }
    elseif ($operation == 9)
    {
        sendNotification("Contact number successfully updated.");
    }
    elseif ($operation == 10)
    {
        sendNotification("Date Appointed as Teacher/principal successfully updated.");
    }
    elseif ($operation == 11 )
    {
        sendNotification("Date joined this School successfully updated.");
    }
    elseif ($operation == 12)
    {
        sendNotification("Employement Status successfully updated.");
    }
    elseif ($operation == 13)
    {
        sendNotification("Medium successfully updated.");
    }
    elseif ($operation == 14)
    {
        sendNotification("Position in school successfully updated.");
    }
    elseif ($operation == 15)
    {
        sendNotification("Section successfully updated.");
    }
    elseif ($operation == 16)
    {
        sendNotification("Subject Most taught successfully updated.");
    }
    elseif ($operation == 17)
    {
        sendNotification("Subject Second Most taught successfully updated.");
    }
    elseif ($operation == 18)
    {
        sendNotification("Service Grade successfully updated.");
    }
    elseif ($operation == 19)
    {
        sendNotification("Salary  successfully updated.");
    }
    elseif ($operation == 20)
    {
        sendNotification("Subject Most taught successfully updated.");
    }
    elseif ($operation == 21)
    {
        sendNotification("Highest Educational Qualification successfully updated.");
    }
    elseif ($operation == 22)
    {
        sendNotification("Highest Professional Qualification successfully updated.");
    }
    elseif ($operation == 23)
    {
        sendNotification("Course of Study successfully updated.");
    }
    else
    {
        sendNotification("Error updating information.");
    }
}
if( isset($_GET["staffID"]) )
{
    $staffID = $_GET["staffID"];

}

if (isset($_GET["delete"]))
{
    $operation = deleteStaff($_GET["delete"]);
    sendNotification($operation);
}

$tableDetails = "none";
$tableViewTable = "none";
$fullPageHeight = 600;

if (isset($_GET["search"]))
{
    $currentStaffMembers = null;

    if (isset($_GET["Choice"]))
    {
        $currentStaffMembers = searchStaff($_GET["query"]);
    }
    else
    {
        $currentStaffMembers = getAllStaff();
    }
    $tableDetails= "none";
    $tableViewTable= "block";
}
else
{
    $currentStaffMembers = getAllStaff();
}

if (isset($_GET["expand"]))
{
    $result = getStaffMember($_GET["expand"]);

    $i = 0;

    foreach($result as $row)
    {
        $staffid = $row[$i++];
        $NamewithInitials = $row[$i++];
        $DateofBirth = $row[$i++];
        $Gender = $row[$i++];
        $NationalityRace = $row[$i++];
        $Religion = $row[$i++];
        $CivilStatus = $row[$i++];
        $NICNumber = $row[$i++];
        $MailDeliveryAddress = $row[$i++];
        $ContactNumber = $row[$i++];
        $DateAppointedasTeacherPrincipal = $row[$i++];
        $DateJoinedthisSchool = $row[$i++];
        $EmploymentStatus = $row[$i++];
        $Medium = $row[$i++];
        $PositioninSchool = $row[$i++];
        $Section = $row[$i++];
        $SubjectMostTaught = $row[$i++];
        $SubjectSecondMostTaught = $row[$i++];
        $ServiceGrade = $row[$i++];
        $Salary = $row[$i++];
        $HighestEducationalQualification = $row[$i++];
        $HighestProfessionalQualification = $row[$i++];
        $CourseofStudy = $row[$i++];
    }

    $fullPageHeight = 1200;

    $tableDetails= "block";
    $tableViewTable= "none";
}
else
{
    $staffid="";
    $NamewithInitials ="";
    $DateofBirth = "";
    $Gender = "";
    $NationalityRace = "";
    $Religion ="";
    $CivilStatus = "";
    $NICNumber = "";
    $MailDeliveryAddress ="";
    $ContactNumber = "";
    $DateAppointedasTeacherPrincipal ="";
    $DateJoinedthisSchool = "";
    $EmploymentStatus = "";
    $Medium ="";
    $PositioninSchool ="";
    $Section ="";
    $SubjectMostTaught ="";
    $SubjectSecondMostTaught ="";
    $ServiceGrade ="";
    $Salary ="";
    $HighestEducationalQualification = "";
    $HighestProfessionalQualification ="";
    $CourseofStudy = "";
}

?>
<html>
<head>
    <style type=text/css>

        h1{
            text-align: center;
        }
        h3{
            position: relative;
            left:50px;
        }
        #info{
            position: relative;
            left: 40px;
        }
        .viewTable{
            position: relative;
            border-collapse: collapse;
            left:50px;
            max-width: 875px;
            display: <?php echo $tableViewTable ?>;
        }
        .viewTable th{
            font-weight: 600;
            color:white;
            background-color: #005e77;
        }
        .viewtable tr{
        }
        .viewTable tr.alt{
            background-color: #bed9ff;
        }
        .viewTable td{
            padding-left: 10px;
            padding-right: 10px;
            min-width: 60px;
        }
        .details {
            /*position: relative;*/
            /*top:50px;*/
            width:500px;
            height:150px;
            display: <?php echo $tableDetails ?>
        }
        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:15px;
            right:-150px;
            top:100px;
        }
    </style>
</head>
<body>
<h1> Search and View Staff Details </h1>
<br />
<!--<h3>Search by</h3>-->

<form method="GET">

    <table id="info">
        <tr>
            <td colspan="2"><span id="selection">Search by : </span>
             <input type="text" class="text1" name="query" value="">
            </td>
            <td><input class="button" name="search" type="submit" value="Search"></td>
        </tr>
        <tr><td></td><td>&nbsp;</td></tr>
        <tr>
            <td><input type="RADIO" name="Choice" value="Staffid" checked />Staff ID</td>
            <td><input type="RADIO" name="Choice" value="Name"  />Name</td>
            <td><input type="RADIO" name="Choice" value="nicnumber" />NIC Number</td>
            <td><input type="RADIO" name="Choice" value="contactnumber" />Contact Number</td>
        </tr>

    </table>
</form>
    <br />

<form method="post">
    <table class="viewTable">
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Nic Number</th>
            <th>Contact Number</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            $result = $currentStaffMembers;

            $i = 1;

            if (!isFilled($result))
            {
                $result = getAllStaff();
            }

            if (isFilled($result))
            {
                foreach($result as $row)
                {
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" : "<tr><td>";
                    echo $top;
                    echo "$row[0]";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"searchStaffDetails.php?expand=" . $row[0] . "\" /> </td> ";
                    echo "<td><input name=\"Delete"  . "\" type=\"submit\" value=\"Delete\" formaction=\"searchStaffDetails.php?delete=" . $row[0] . "\" /> </td> ";
                    echo "</td></tr>";
                }
            }

            if (isset($_GET["search"]))
            {
                $fullPageHeight = ( 600 + ($i * 18) );
            }

        ?>
    </table>
</form>
    <br />
    <br />

<form>
    <table class="details" align="center">
        <tr>
            <td> Staff ID </td>
            <td > <input type = "text" name="staffid" readonly value="<?php echo $staffid?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Name with Initials </td>
            <td > <input type = "text" name="NamewithInitials" value="<?php echo $NamewithInitials?>"/> </td>
            <td></td>
        </tr>



        <tr>
            <td> Date of Birth  </td>
            <td > <input type = "text" name="DateofBirth" value="<?php echo $DateofBirth?>"/> </td>
            <td></td>
        </tr>

        <tr>
            <td> Gender </td>
            <td>
                <input type="radio" name="gender" value="1" <?php echo $temp = ( $Gender == 1 ? "checked" : "") ; ?> />Male
                <input type="radio" name="gender" value="2" <?php echo $temp = ( $Gender != 1 ? "checked" : "") ; ?> />Female
            </td>
            <td></td>
        </tr>

        <tr>
            <td>Natinality/Race </td>
            <td > <input type = "text" name="NationalityRace" value="<?php echo $NationalityRace?>"/> </td>
            <td></td>
        </tr>


        <tr>
            <td> Religion </td>
            <td > <input type = "text" name="Religion" value="<?php echo $Religion?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Civil Status  </td>
            <td > <input type = "text" name="CivilStatus" value="<?php echo $CivilStatus?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>NIC Number  </td>
            <td > <input type = "text" name="NICNumber" value="<?php echo $NICNumber?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>Mail Delivery Address</td>
            <td > <input type = "text" name="MailDeliveryAddress" value="<?php echo $MailDeliveryAddress?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>Contact Number </td>
            <td > <input type = "text" name="ContactNumber" value="<?php echo $ContactNumber?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>Date Appointed as Teacher/principal</td>
            <td > <input type = "text" name="$DateAppointedasTeacherPrincipal" value="<?php echo $DateAppointedasTeacherPrincipal?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Date joined this school  </td>
            <td > <input type = "text" name="DateJoinedthisSchool " value="<?php echo $DateJoinedthisSchool?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Employement status </td>
            <td > <input type = "text" name="EmployementStatus" value="<?php echo $EmploymentStatus?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Medium </td>
            <td > <input type = "text" name="Medium" value="<?php echo $Medium?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Position in school  </td>
            <td > <input type = "text" name="PositioninSchool" value="<?php echo $PositioninSchool?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Section  </td>
            <td > <input type = "text" name="Section" value="<?php echo $Section?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Subject Most taught  </td>
            <td > <input type = "text" name="SubjectMostTaught" value="<?php echo $SubjectMostTaught?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>  Subject Second Most taught </td>
            <td > <input type = "text" name="SubjectSecondMostTaught" value="<?php echo $SubjectSecondMostTaught?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>  Service Grade  </td>
            <td > <input type = "text" name="ServiceGrade" value="<?php echo $ServiceGrade?>" /> </td>
            <td></td>
        </tr>
        <tr>
            <td>  Salary</td>
            <td > <input type = "text" name="Salary" value="<?php echo $Salary?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Highest Educational Qualification  </td>
            <td > <input type = "text" name="HighestEducationalQualification" value="<?php echo $HighestEducationalQualification?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Highest Professional Qualification  </td>
            <td > <input type = "text" name="HighestProfessionalQualification" value="<?php echo $HighestProfessionalQualification?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Course of Study </td>
            <td > <input type = "text" name="CourseofStudy" value="<?php echo $CourseofStudy?>"/> </td>
            <td></td>
        </tr>

        <tr>
            <td> <input type="Submit" value="Update" name="Submit" /> </td>

        </tr>
    </table>

    <br />
    <br />

    <!--<table align="center">
        <tr>
            <td> <input type="button" value="Approve"> </td>
            <td > <input type="button" value="Reject">  </td>
        </tr>
    </table>-->

</form>
</body>
</html>
<?php
//Assign all Page Specific variables
//$fullPageHeight = 1300 + ($i * 18);
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "newsearchStaffdetails";
//Apply the template
include("../Master.php");
?>

