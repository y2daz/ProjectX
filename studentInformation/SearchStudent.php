<?php
/**
 * Created by PhpStorm.
 * User: Madhushan
 * Date: 19/07/14
 * Time: 17:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");



ob_start();

$result = null;



$currentStudent="";


if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    $operation = UpdateStudent($_POST["AdmissionNo"], $_POST["NamewithInitials"], $_POST["DateofBirth"], $_POST["NationalityRace"],($_POST["Religion"]), $_POST["Medium"], $_POST["Address"],
        $_POST["Grade"], $_POST["Class"], $_POST["House"]);

    if ($operation == true)
    {
        sendNotification("Student Details successfully updated.");
    }
    else
    {
        sendNotification("Error updating information.");
    }
}
if( isset($_GET["AdmissionNo"]) )
{
    $admissionNo = $_GET["AdmissionNo"];

}
elseif(isset($_GET["Class"]))
{
    $Class = $_GET["Class"];
}

$tableDetails = "none";
$tableViewTable = "none";
$fullPageHeight = 600;

if (isset($_GET["search"]))
{
    $currentStudent = null;

    if ($_GET["Choice"] == "AdmissionNo")
    {
        $currentStudent = searchStudent($_GET["value"]);
    }
    else if($_GET["Choice"] == "Class")
    {
        $currentStudent = SearchStudentbyclass($_GET["value"]);
        //echo $_GET["value"];
    }
    else if($_GET["Choice"] == "NamewithInitials")
    {
        $currentStudent = SearchStudentByName($_GET["value"]);
    }

    $tableDetails= "none";
    $tableViewTable= "block";

}

$admissionNo = "";
$NamewithInitials ="";
$DateofBirth = "";
$NationalityRace = "";
$Religion = "";
$Medium ="";
$Address = "";
$Grade ="";
$Class ="";
$House ="";

if (isset($_GET["expand"]))
{
    $result = getStudent($_GET["expand"]);

    //echo var_dump($result);

    foreach($result as $row) //
    {
        $admissionNo = $row[0];
        $NamewithInitials =$row[1];
        $DateofBirth = $row[2];
        $NationalityRace = $row[3];
        $Religion = $row[4];
        $Medium =$row[5];
        $Address = $row[6];
        $Grade = $row[7];
        $Class =$row[8];
        $House = $row[9];
    }

    $fullPageHeight = 1200;

    $tableDetails= "block";
    $tableViewTable= "none";
}
else
{
    $admissionNo = "";
    $NamewithInitials ="";
    $DateofBirth = "";
    $NationalityRace = "";
    $Religion = "";
    $Medium ="";
    $Address = "";
    $Grade ="";
    $Class ="";
    $House ="";
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
                left:25px;
                /*min-width: 100px;*/
                min-width: 400px;
                /*max-width: 750px;*/
                display: <?php echo $tableViewTable ?>;
            }
            .viewTable th{
                min-width: 100px;
                font-weight: 600;
                color:white;
                background-color: #005e77;
            }
            .viewTable tr.alt{
                background-color: #bed9ff;
            }
            .viewTable td{
                padding-left: 4px;
                padding-right: 4px;
                min-width: 60px;
                text-align: center;
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
        <script src="studentinformation.js"></script>
    </head>
<body>
    <h1> Search and View Student Details </h1>
    <br />
    <!--<h3>Search by</h3>-->

    <form method="GET">

        <table id="info">
            <tr>
                <td colspan="1"><span id="selection">Search : </span>
                    <input type="text" class="text1" name="value" id="value" value=""/>
                </td>
                <td ><input class="button" name="search" type="submit" value="Search"></td>
            </tr>
            <tr><td></td><td>&nbsp;</td></tr>
            <tr>
                <td><input type="RADIO" name="Choice" value="AdmissionNo" checked/>By Admission Number</td>
                <td><input type="RADIO" name="Choice" value="NamewithInitials"  />Name with Initials</td>
<!--                <td><input type="RADIO" name="Choice" value="Medium"  />Medium</td>-->
<!--                <td><input type="RADIO" name="Choice" value="Grade"  />Grade</td>-->
                <td><input type="RADIO" name="Choice" value="Class" />By Class</td>
<!--                <td><input type="RADIO" name="Choice" value="House"  />House</td>-->
            </tr>

        </table>
    </form>
    <br />

    <form method="post">
        <table class="viewTable">
            <tr>
                <th>Admisson Number</th>
                <th>Name with Initials</th>
                <th>Date of Birth</th>
                <th>Grade and Class</th>
                <th></th>
                <th></th>
            </tr>
            <?php

            $res = $currentStudent;

            $i = 1;

            if (isFilled($res))
            {
                foreach($res as $row)
                {
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" :
                        "<tr><td>";
                    echo $top;
                    echo "$row[0]";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td><input name=\"getParentsDetails" . "\" type=\"submit\" value=\"Get Parent Details\" formaction=\"SearchParentsDetailsForm.php?id=" . $row[0] . "\" /> </td> ";
                    echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"SearchStudent.php?expand=" . $row[0] . "\" /> </td> ";

                    echo "</td></tr>";
                }
            }
            else{
                echo "<tr>";
                echo "<td colspan='5'>There are no records to show</td>";
                echo "</tr>";
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

<form method="post">
    <table class="details" align="center">
    <tr>
        <td> Admission Number </td>
        <td > <input type = "text" name="AdmissionNo"  value="<?php echo $admissionNo?>"/> </td>
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
        <td>Nationality/Race </td>
        <td > <input type = "text" name="NationalityRace" value="<?php echo $NationalityRace?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td> Religion </td>
        <td > <input type = "text" name="Religion" value="<?php echo $Religion?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td> Medium  </td>
        <td > <input type = "text" name="Medium" value="<?php echo $Medium?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td>Address  </td>
        <td > <input type = "text" name="Address" value="<?php echo $Address?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td>Grade</td>
        <td > <input type = "text" name="Grade" value="<?php echo $Grade?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td>Class</td>
            <td > <input type = "text" name="Class" value="<?php echo $Class?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> House </td>
            <td > <input type = "text" name="House" value="<?php echo $House?>"/> </td>
            <td></td>
        </tr>
                <tr>
            <td> <input type="Submit" value="Update" name="Submit" /> </td>

        </tr>
    </table>

    <?php

    if(isset($_GET["value"]))
    {
        $arrGradeClass = getGradeAndClass( $_GET["value"] );

        $Grade = $arrGradeClass[0];
        $Class = $arrGradeClass[1];
    }
    else
    {
        $Grade = "";
        $Class = "";
    }

//    echo $Grade;
//    echo $Class;

    ?>

    <?php

    if($_GET["Choice"] == "Class")
    {
        $displayButton = "block";
    }
    else
    {
        $displayButton = "none";
    }

    ?>

    <input style="display: <?php echo $displayButton ?>" type="button" name="button" id="button8" value="Generate Student Report"  onClick="window.location = 'studentReport.php?Grade=<?php echo $Grade ?>&Class=<?php echo $Class ?>'" style=position:relative; top :100px; left: 0px; width:150"/>



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

