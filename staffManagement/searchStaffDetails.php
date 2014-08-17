﻿<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 19/07/14
 * Time: 17:04
 */
require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

ob_start();

if (isset($_GET["delete"]))
{
    deleteStaff($_GET["delete"]);

}

if (isset($_GET["expand"]))
{
    $result = getStaffMember($_GET["expand"]);

    $i = 0;

    echo "1<br />";

    echo count($result);

    $i = 0;
    foreach($result as $row)
    {
        echo "<br />";

        $staffid = $row[$i++];
        $NamewithInitials =$row[$i++];
        $DateofBirth = $row[$i++];
        $Gender = $row[$i++];
        $NationalityRace = $row[$i++];
        $Religion =$row[$i++];
        $CivilStatus = $row[$i++];
        $NICNumber = $row[$i++];
        $MailDeliveryAddress =$row[$i++];
        $ContactNumber = $row[$i++];
        $DateAppointedasTeacherPrincipal =$row[$i++];
        $DateJoinedthisSchool = $row[$i++];
        $EmploymentStatus = $row[$i++];
        $Medium =$row[$i++];
        $PositioninSchool =$row[$i++];
        $Section =$row[$i++];
        $SubjectMostTaught =$row[$i++];
        $SubjectSecondMostTaught =$row[$i++];
        $ServiceGrade =$row[$i++];
        $Salary =$row[$i++];
        $HighestEducationalQualification = $row[$i++];
        $HighestProfessionalQualification =$row[$i++];
        $CourseofStudy = $row[$i++];

    }

    echo "<br />1";
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
}
else
{
    $currentStaffMembers = getAllStaff();
}




?>
<html>
<head>
    <style type=text/css>
<!--        #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--        #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

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
            height:150px
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
            <td><input type="RADIO" name="Choice" value="Staffid"/>Staff ID</td>
            <td><input type="RADIO" name="Choice" value="Name"  >Name</td>
            <td><input type="RADIO" name="Choice" value="nicnumber"/>NIC Number</td>
            <td><input type="RADIO" name="Choice" value="contactnumber"  >Contact Number</td>
        </tr>

    </table>
</form>
    <br />

<form method="post">
    <table class="viewTable" align="center">
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

            foreach($result as $row){
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



        ?>
<!--        <tr>-->
<!--            <td>SIDXXX</td>-->
<!--            <td>Mrs. Andrea De Silva</td>-->
<!--            <td>578695412v</td>-->
<!--            <td>0719658712</td>-->
<!--            <td><input type="button" name="expand" value="Expand Details" /></td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
<!--        <tr class="alt">-->
<!--            <td>SIDXXX</td>-->
<!--            <td>Mr. Madusha Karunaratne</td>-->
<!--            <td>642531789v</td>-->
<!--            <td>0772596314</td>-->
<!--            <td><input type="button" name="expand" value="Expand Details" /></td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td> SIDXXX </td>-->
<!--            <td> Mr. Priyan Fernando </td>-->
<!--            <td> 702358964v</td>-->
<!--            <td> 0774239651 </td>-->
<!--            <td> <input type="button" name="expand" value="Expand Details" /> </td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
    </table>
</form>
    <br />
    <br />

<form>
    <table class="details" align="center">
        <tr>
            <td> Staff ID </td>
            <td > <input type = "text" name="staffid" readonly value="<?php echo $staffid?>"/> </td>
        </tr>


        <tr>
            <td> Name with Initials </td>
            <td > <input type = "text" name="NamewithInitials" value="<?php echo $NamewithInitials?>"/> </td>
        </tr>



        <tr>
            <td> Date of Birth  </td>
            <td > <input type = "text" name="DateofBirth" value="<?php echo $DateofBirth?>"/> </td>
        </tr>

        <tr>
            <td> Gender </td>
            <td > <input type = "text" name="Gender" value="<?php echo $Gender?>"/> </td>
        </tr>

        <tr>
            <td>Natinality/Race </td>
            <td > <input type = "text" name="NationalityRace" value="<?php echo $NationalityRace?>"/> </td>
        </tr>

        <tr>
            <td> Religion </td>
            <td > <input type = "text" name="Religion" value="<?php echo $Religion?>"/> </td>
        </tr>
        <tr>
            <td> Civil Status  </td>
            <td > <input type = "text" name="CivilStatus" value="<?php echo $CivilStatus?>"/> </td>
        </tr>
        <tr>
            <td>NIC Number  </td>
            <td > <input type = "text" name="NICNumber" value="<?php echo $NICNumber?>"/> </td>
        </tr>
        <tr>
            <td>Mail Delivery Address</td>
            <td > <input type = "text" name="MailDeliveryAddress" value="<?php echo $MailDeliveryAddress?>"/> </td>
        </tr>
        <tr>
            <td>Contact Number </td>
            <td > <input type = "text" name="ContactNumber" value="<?php echo $ContactNumber?>"/> </td>
        </tr>
        <tr>
            <td>Date Appointed as Teacher/principal</td>
            <td > <input type = "text" name="$DateAppointedasTeacherPrincipal" value="<?php echo $DateAppointedasTeacherPrincipal?>"/> </td>
        </tr>
        <tr>
            <td> Date joined this school  </td>
            <td > <input type = "text" name="DateJoinedthisSchool " value="<?php echo $DateJoinedthisSchool?>"/> </td>
        </tr>
        <tr>
            <td> Employement status </td>
            <td > <input type = "text" name="EmployementStatus" value="<?php echo $EmploymentStatus?>"/> </td>
        </tr>
        <tr>
            <td> Medium </td>
            <td > <input type = "text" name="Medium" value="<?php echo $Medium?>"/> </td>
        </tr>
        <tr>
            <td> Position in school  </td>
            <td > <input type = "text" name="PositioninSchool" value="<?php echo $PositioninSchool?>"/> </td>
        </tr>
        <tr>
            <td> Section  </td>
            <td > <input type = "text" name="Section" value="<?php echo $Section?>"/> </td>
        </tr>
        <tr>
            <td> Subject Most taught  </td>
            <td > <input type = "text" name="SubjectMostTaught" value="<?php echo $SubjectMostTaught?>"/> </td>
        </tr>
        <tr>
            <td>  Subject Second Most taught </td>
            <td > <input type = "text" name="SubjectSecondMostTaught" value="<?php echo $SubjectSecondMostTaught?>"/> </td>
        </tr>
        <tr>
            <td>  Service Grade  </td>
            <td > <input type = "text" name="ServiceGrade" value="<?php echo $ServiceGrade?>" /> </td>
        </tr>
        <tr>
            <td>  Salary</td>
            <td > <input type = "text" name="Salary" value="<?php echo $Salary?>"/> </td>
        </tr>
        <tr>
            <td> Highest Educational Qualification  </td>
            <td > <input type = "text" name="HighestEducationalQualification" value="<?php echo $HighestEducationalQualification?>"/> </td>
        </tr>
        <tr>
            <td> Highest Professional Qualification  </td>
            <td > <input type = "text" name="HighestProfessionalQualification" value="<?php echo $HighestProfessionalQualification?>"/> </td>
        </tr>
        <tr>
            <td> Course of Study </td>
            <td > <input type = "text" name="CourseofStudy" value="<?php echo $CourseofStudy?>"/> </td>
        </tr>


        <td><input class="button1" name="newStaff" type="submit" value="UPDATE"></td>
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
$fullPageHeight = 1300 + ($i * 18);
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "searchViewStaffdetails";
//Apply the template
include("../Master.php");
?>

