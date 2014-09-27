<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 9/26/14
 * Time: 8:15 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
include("timetableClass.php");
ob_start();

$lang = $_COOKIE["language"];

$classroom = "";
$class = "";

error_reporting(0);//Temporarily turn of all errors

if (isset($_GET["getTimetable"]))
{
    $myTime = new Timetable();
    $class = $_GET["classroom"];

    $myTime->grade = "";
    $myTime->class = "";

    $arrClassroom = getGradeAndClass( $class );
    if( (isFilled($arrClassroom[0])) && (isFilled($arrClassroom[1])) ){
        $myTime->grade = $arrClassroom[0];
        $myTime->class = $arrClassroom[1];
    }
    $classroom = $myTime->grade . " " . $myTime->class;

    $myTime->getTimetableClassFromDB();
}


?>
    <html>
    <head>
        <link rel="stylesheet" href="timetable.css">
        <style>
            .viewTable{
                position: relative;
                border-collapse: collapse;
                left:25px;
                max-width: 750px;
                display: <?php echo $tableViewTable ?>;
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
        <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
        <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
        <script src="<?php echo PATHFRONT ?>/common.js"></script>
        <script src="timetable.js"></script>

        <script>
            $(document).ready(function() {

                var i = 0;

                $(".subject").on("click", function(e){ //Write substitute code
                    var position = $(this).attr("id");
                    console.log(position);
                });
        </script>

    </head>
    <body>



    <h1><?php echo getLanguage("timetable", $lang) ?></h1>

    <form method="get">
        <table id="info">
            <tr>
                <td><label><?php echo getLanguage("class",$lang)?></td>
                <td><input type="text" class="text1" name="classroom" value="<?php echo $classroom?>" /></td>
                <td><input type="submit" class="text1" name="getTimetable" value="Submit" /></td>
                <td><a href="<?php echo PATHFRONT . "/TimeTable/TimetableReportTeacherWise.php" . "?staffID=" . $currentStaffId ?>" target="_blank" > Print Timetable</a></td></tr>
            </tr>
        </table>
        <table id="edit">
            <!--            <tr><td><input id="btnMakeEditable" type="button" name="btnMakeEditable" value="Edit Timetable"></td>-->

        </table>
    </form>


    <form name="frmTimetable" onsubmit="return classValidation()" method="post">

        <table class="timetable" >
            <tr>
                <th class="time"><?php echo getLanguage("time",$lang)?></th>
                <th><?php echo getLanguage("monday",$lang)?></th>
                <th><?php echo getLanguage("tuesday",$lang)?></th>
                <th><?php echo getLanguage("wednesday",$lang)?></th>
                <th><?php echo getLanguage("thursday",$lang)?></th>
                <th><?php echo getLanguage("friday",$lang)?></th>
            </tr>

            <?php
            $timeArray = array("07.50-08.30", "08.30-09.10", "09.10-09.50", "09.50-10.30", "10.50-11.30", "11.30-12.10", "12.10-12.50", "12.50-01.30" );
            $colourArray = array("#f69988", "#f48fb1", "#ce93d8", "#b39ddb", "#9fa8da", "#afbfff", "#81d4fa", "#80deea", "#80cbc4", "#72d572", "#c5e1a5",
                "#e6ee9c", "#ffcc80", "#fff59d", "#ffe082"); //15

            $subjectColour = array();


            for($i = 0; $i < 8; $i++){

                if(($i == 4)){ //Interval
                    $intervalRow = "\t<tr class=interval>\t<td>10.30-10.50</td> \t<td colspan=\"5\" >" . "INTERVAL" . "</td>\t</tr>\n";
                    echo $intervalRow;
                }

                for($x = 0; $x < 6; $x++){
                    $thisCell = "";
                    if($x == 0){
                        $thisCell = "\t<tr>\t ";
                        $thisCell .= "<td class='time'>".$timeArray[ $i ] ."</td>";
                    }
                    else{ //Normal rows are here.
                        $number= ($i + (8 * ($x - 1) ));
                        $thisCell = "";

                        $subject = $myTime->slot[$number]->Subject;

                        $currColour = $colourArray[(rand(0,14))];
                        while ( in_array($currColour, $subjectColour) )
                        {
                            $currColour = $colourArray[(rand(0,14))];
                        }

                        if( trim($subject) == ""){
                            $subjectColour[$subject] = "#dedede";
                        }
                        if ($subjectColour[$subject] == ""){
                            $subjectColour[$subject] = $currColour;
                        }
                        else{
                            $currColour = $subjectColour[$subject];
                        }

                        $thisCell .= "\t<td class='subject' style='background-color:$subjectColour[$subject];'  id=\"" . $number . "\">";
                        $thisCell .= "<textarea id='subject_$number' name='subject_$number' readonly style='background-color:$subjectColour[$subject];'>" . $subject . "</textarea>";

                        if ($x % 5 == 0)
                            $thisCell .= "\t</tr>\n";
                    }
                    echo $thisCell;
                }
            }
            ?>
        </table>

        <br/>
        <br/>
        <form method="post">
            <table class="viewTable">
                <tr>
                    <th>Staff ID</th>
                    <th>Teacher's Name</th>
                    <th>Main Subject</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
                <?php
                $rowcount = 0;
                if (isFilled($freeTeachersSet)){

                    foreach($freeTeachersSet as $row){
                        echo ( $rowcount % 2 == 0 ? "<tr>" : "<tr class='alt'>");
                        echo "<tr>";
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        echo "<td>" . $row[3] . "</td>";
                        $date = date("y/m/d");
                        echo "<td><input type = button value='Confirm' name='Confirm' onclick='confirmSubstitution( $currentStaffId , $Grade , $Class , $Day , $Position , $date  , $row[0] )' > <td>";
                        echo "</tr>";
                        $rowcount++;
                    }



                }
                ?>
            </table>
        </form>
        </table>
    </form>


    </form>
    </body>
    </html>
<?php

$fullPageHeight = 900;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Timetable";


$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>