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
$currentStudent="";

if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    $operation = UpdateStudent($_POST["AdmissionNo"], strtoupper($_POST
        ["NamewithInitials"]), $_POST["DateofBirth"], ($_POST["NationalityRace"]),
        ($_POST["Religion"]), $_POST["Medium"], strtoupper($_POST["Address"]), $_POST
        ["Grade"], $_POST["Class"], $_POST["House"]);

    if ($operation == 1)
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



$tableDetails = "none";
$tableViewTable = "none";
$fullPageHeight = 600;

if (isset($_GET["search"]))
{
    $currentStudent = null;

    if (isset($_GET["Choice"]))
    {
        $currentStudent = searchStudent($_GET["value"]);
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

//    var_dump($result);

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
                left:50px;
                max-width: 600px;
                display: <?php echo $tableViewTable ?>;
            }
            .viewTable th{
                width: 300px;
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
    <h1> Search and View Student Details </h1>
    <br />
    <!--<h3>Search by</h3>-->

    <form method="GET">

        <table id="info">
            <tr>
                <td colspan="2"><span id="selection">Search by : </span>
                    <input type="text" class="text1" name="value" value="">
                </td>
                <td><input class="button" name="search" type="submit"
                           value="Search"></td>
            </tr>
            <tr><td></td><td>&nbsp;</td></tr>
            <tr>
                <td><input type="RADIO" name="Choice" value="AdmissionNumber"
                           checked />Admission Number</td>
                <td><input type="RADIO" name="Choice" value="Name"  />Name with
                    Initials</td>
                <td><input type="RADIO" name="Choice" value="Medium"  />Medium</td>
                <td><input type="RADIO" name="Choice" value="Grade"  />Grade</td>
                <td><input type="RADIO" name="Choice" value="Class"  />Class</td>
                <td><input type="RADIO" name="Choice" value="House"  />House</td>
            </tr>

        </table>
    </form>
    <br />

    <form method="post">
        <table class="viewTable">
            <tr>
                <th>Admisson Number</th>
                <th>Name with Initials</th>
                <th></th>
                <th></th>
            </tr>
            <?php

            $res = $currentStudent;

            $i = 1;

            if (!isFilled($res))
            {
                $res = getAllStudents();

            }

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
                    echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"SearchStudent.php?expand=" . $row[0] . "\" /> </td> ";

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
        <td > <input type = "text" name="staffid"  value="<?php echo $admissionNo?>"/> </td>
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
            <td>Grade</td>
            <td > <input type = "text" name="Grade" value="<?php echo $Grade?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td> Class </td>
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

