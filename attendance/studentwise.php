<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();
error_reporting(0);
$arrClassroom="";

    if($_COOKIE["language"] == 1)
    {
        $addmissionNumber="ඇතුලත්විමෙ අංකය";
        $studentName="ශිෂ්‍යාගේ නම";
        $dateFrom="දින සිට";
        $dateTo="දින දක්වා";
        $SubmitBtn="තහවුරු  කරන්න";
    }
    else
    {
        $addmissionNumber="Addmission Number";
        $studentName="Student Name ";
        $dateFrom="Date From";
        $dateTo="Date To";
        $SubmitBtn="Generate";

    }

if(isset($_GET["getAttendence"])){
    $classroom =$_GET["admissionNo"];
    $startDate=$_GET["dateFrom"];
    $endDate=$_GET["dateTo"];


    $arrClassroom = getGradeAndClass( $classroom );

    $admissionNo = $arrClassroom[0];
    //$class = $arrClassroom[1];

    $studentList = getAttendanceReport2( $startDate, $endDate, $admissionNo );
}

?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                text-align: center;
            }
            .insert{
                position:absolute;
                left:40px;
                top:80px;
            }
            .insert th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
            }
            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }
            .insert input{
                font-weight:bold;
                font-size:15px;
            }
            .insert td{
                padding:10px;
            }
            .viewTable{
                position: relative;
                border-collapse: collapse;
                left:25px;
                max-width: 750px;
            }
            .viewTable th{
                width: 300px;
                font-weight: 600;
                color:white;
                background-color: #005e77;
            }
            .viewTable tr.alt{
                background-color: #bed9ff;
            }
            .viewTable td{
                padding: 4px;
                min-width: 60px;
                text-align: center;
            }
            .viewTable .alt{
                background-color: #bed9ff;
            }
        </style>
    </head>
    <body>
        <h1>Student-wise Attendance Report</h1>

        <form method="GET">

            <table class="insert" cellspacing="0">
                <!--<tr><th>Student-wise Report</th><th></th></tr>-->
                <tr>
                    <td><?php echo $addmissionNumber ?></td>
                    <td><input name="admissionNo" type="text" value="" required="true"></td>
                   <!-- <td>Student Name</td>
                    <td><input id="nameWithInitials" type="text" value=""></td>-->
                </tr>
                <tr>
                    <td>Date from</td>
                    <td><input name="dateFrom" type="date" value=""></td>
                    <td>Date To</td>
                    <td><input name="dateTo" type="date" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="button" type="submit" name="getAttendence" value="<?php echo $SubmitBtn?>"></td>
                </tr>
            </table>
        </form>

        <form method="post">
            <table class="viewTable">
                <tr>
                    <th>Admission Number</th>
                    <th>Name</th>
                    <th>Present Days</th>
                    <th>No of school Days</th>
                    <th></th>
                </tr>
                <?php
                $rowcount = 0;
                if (isFilled($studentList)){

                    foreach($studentList as $row){
                        echo ( $rowcount % 2 == 0 ? "<tr>" : "<tr class='alt'>");
                        echo "<tr>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td id='replacementName_$row[0]' >" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        // $date = date("y/m/d");
//                    echo "<td><input id='confirm_$row[0]' class='confirm' type='button' value='Confirm' name='Confirm_  $row[0]' </td>";
                        echo "</tr>";
                        $rowcount++;
                    }



                }

                ?>
                </table>
            </form>
    </body>
</html>
<?php
//Assign all Page Specific variables
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "Student-wise Report";
//Apply the template
include("../Master.php");
?>






