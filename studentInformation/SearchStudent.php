<?php
/**
 * Created by PhpStorm.
 * User: Madhushan
 * Date: 19/07/14
 * Time: 17:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

//error_reporting(0);

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
    <?php
    $language = $_COOKIE['language'];
    $AdmissionNo =  getLanguage('AdmissionNo', $language);
    $nameWithInitials =  getLanguage('nameWithInitials', $language);
    $dateOfBirth =  getLanguage('dateOfBirth', $language);
    $nationalityRace =  getLanguage('nationalityRace', $language);
    $religion =  getLanguage('religion', $language);
    $Medium =  getLanguage('Medium', $language);
    $Address =  getLanguage('Address', $language);
    $Grade = getLanguage('grade',$language);
    $Class = getLanguage('class',$language);
    $sinhala =  getLanguage('sinhala', $language);
    $srilankantamil =  getLanguage('srilankantamil', $language);
    $indiantamil =  getLanguage('indiantamil', $language);
    $srilankanmuslim =  getLanguage('srilankanmuslim', $language);
    $other =  getLanguage('other', $language);
    $sinhala =  getLanguage('sinhala', $language);
    $tamil =  getLanguage('tamil', $language);
    $english =  getLanguage('english', $language);
    $buddhism =  getLanguage('buddhism', $language);
    $hinduism =  getLanguage('hindusm', $language);
    $islam =  getLanguage('islam', $language);
    $catholic =  getLanguage('catholic', $language);
    $christianity =  getLanguage('christianity', $language);
    $other =  getLanguage('other', $language);
    $generalInformation = getLanguage("generalInformation", $language);
    $submit =  getLanguage('submit', $language);
    $SearchandViewStudentDetails = getLanguage('SearchandViewStudentDetails', $language);
    $gradeclass =getLanguage('gradeclass', $language);
    $update =  getLanguage('update', $language);
    $search = getlanguage('search', $language);
    $expand = getLanguage('expand', $language);
    $delete = getLanguage('delete',$language);

    ?>
<body>
    <h1><?php echo getLanguage('SearchandViewStudentDetails', $language)?>  </h1>
    <br />
    <!--<h3>Search by</h3>-->

    <form method="GET">

        <table id="info">
            <tr>
                <td colspan="1"><span id="selection"><?php echo getlanguage('searchby', $language)?>: </span>
                    <input type="text" class="text1" name="value" id="value" value=""/>
                </td>
                <td ><input class="button" name="search" type="submit" value=<?php echo getLanguage('search', $language)?>></td>
            </tr>
            <tr><td></td><td>&nbsp;</td></tr>
            <tr>
                <td><input type="RADIO" name="Choice" value="AdmissionNo" checked/><?php echo getLanguage('AdmissionNo', $language)?></td>
                <td><input type="RADIO" name="Choice" value="NamewithInitials"  /><?php echo getLanguage('nameWithInitials', $language)?></td>
                <td><input type="RADIO" name="Choice" value="Class" /><?php echo getLanguage('class', $language)?></td>
            </tr>

        </table>
    </form>
    <br />

    <form method="post">
        <table class="viewTable">
            <tr>
                <th><?php echo getLanguage('AdmissionNo', $language)?></th>
                <th><?php echo getLanguage('nameWithInitials', $language)?></th>
                <th><?php echo getLanguage('dateOfBirth', $language)?></th>
                <th><?php echo getLanguage('gradeclass', $language)?></th>
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
        <td><?php echo getLanguage('AdmissionNo',$language)?></td>
        <td > <input type = "text" name="AdmissionNo"  value="<?php echo $admissionNo?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getLanguage('nameWithInitials', $language)?> </td>
        <td > <input type = "text" name="NamewithInitials" value="<?php echo $NamewithInitials?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getLanguage('dateOfBirth', $language)?></td>
        <td > <input type = "text" name="DateofBirth" value="<?php echo $DateofBirth?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getLanguage('nationalityRace', $language)?></td>
        <td > <input type = "text" name="NationalityRace" value="<?php echo $NationalityRace?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getLanguage('religion', $language)?></td>
        <td><input type = "text" name="Religion" value="<?php echo $Religion?>"/></td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getLanguage('Medium', $language)?></td>
        <td > <input type = "text" name="Medium" value="<?php echo $Medium?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getlanguage('Address', $language)?></td>
        <td > <input type = "text" name="Address" value="<?php echo $Address?>"/> </td>
        <td></td>
    </tr>
    <tr>
        <td><?php echo getlanguage('grade',$language)?></td>
        <td > <input type = "text" name="Grade" value="<?php echo $Grade?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo getlanguage('class',$language)?></td>
            <td > <input type = "text" name="Class" value="<?php echo $Class?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo getLanguage('house',$language)?></td>
            <td ><input type = "text" name="House" value="<?php echo $House?>"/> </td>
            <td></td>
        </tr>
                <tr>
            <td> <input type="Submit" value=<?php echo getLanguage('update', $language)?> name="Submit" /> </td>

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

    if(isset($_GET["Choice"]))
    {
        if($_GET["Choice"] == "Class")
        {
            $displayButton = "block";
        }
        else
        {
            $displayButton = "none";
        }
    }
    else
    {
        $displayButton = "none";
    }



    ?>

    <input style="position:absolute; left: 590px; top: 90px; display: <?php echo $displayButton ?>" type="button" name="button" id="button8" value="Generate Student Report"  onClick="window.location = 'studentReport.php?Grade=<?php echo $Grade ?>&Class=<?php echo $Class ?>'" style=position:relative; top :100px; left: 0px; width:150"/>



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

