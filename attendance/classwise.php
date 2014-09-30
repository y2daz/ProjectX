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
        $gradeAndclass="";
        $dateFromtxt="දින සිට";
        $dateTotxt="දින දක්වා";
        $SubmitBtn="තහවුරු  කරන්න";
    }
    else
    {
        $gradeAndclass="Grade And class";
        $dateFromtxt="Date From";
        $dateTotxt="Date To";
        $SubmitBtn="Generate";
    }

    if(isset($_GET["getAttendence"])){
        $classroom =$_GET["studentGrade"];
        $startDate=$_GET["dateFrom"];
        $endDate=$_GET["dateTo"];


        $arrClassroom = getGradeAndClass( $classroom );

        $grade = $arrClassroom[0];
        $class = $arrClassroom[1];

        $studentList = getAttendanceReport( $startDate, $endDate, $grade, $class );
        //$attendenceArray =(""$startDate, : $endDate, $grade, $class);

//        echo "<pre>";
//        print_r($studentList);
//        echo "</pre>";
//        if($studentList == null )
//        {
//            sendNotification("No free teachers.");
//        }
//        else
//        {
//            sendNotification("Teachers available for .");
//        }
//

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
                /*Right:-335px;*/
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
            #link{
                position: relative;
                top: 26px;
                left: 140px;
            }
        </style>
    </head>


    <body>
        <h1>Class-wise Attendance Report</h1>

        <form method="GET">

            <table class="insert" cellspacing="0">
<!--                <tr><th>Class-wise Report</th></tr>-->
                <tr>
                    <td><?php echo $gradeAndclass ?></td>
                    <td><input name="studentGrade" type="text" value=""required="true"></td>

                </tr>
                <tr>
                    <td><?php echo $dateFromtxt ?></td>
                    <td><input name="dateFrom" type="date" value=""></td>
                    <td><?php echo $dateTotxt ?></td>
                    <td><input name="dateTo" type="date" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="button" type="submit" name="getAttendence" value="<?php echo $SubmitBtn?>"></td>
                    <td><a id="link"
                           href="<?php echo PATHFRONT . "/Attendance/reportClass.php" . "?grade=" . $_GET["studentGrade"] . "&dateFrom=" . $_GET["dateFrom"] ."&dateTo=" . $_GET["dateTo"] ?>"
                           target="_blank" > Print Report</a></td>
                    <td></td>
                </tr>
            </table>
        </form>
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
        <br />
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
$fullPageHeight = 600+ $rowcount*20;
$footerTop = $fullPageHeight +100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "Class-wise Report";
//Apply the template
include("../Master.php");
?>