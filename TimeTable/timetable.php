<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
include("timetableClass.php");
ob_start();

$lang = $_COOKIE["language"];

//$_GET["getTimetable"] = $_GET["getTimetable"] | "";

$currentStaffId = "";
$currentStaffName = "";

error_reporting(0);//Temporarily turn of all errors

if (isset($_POST["Submit"]))
{
    $myTime = new Timetable();
    $myTime -> staffId = $_POST["staffId"];

    $prefixSubject = "subject_";
    $prefixClassroom = "classroom_";

    for($i = 0; $i < 40; $i++){
        $subjectArr = array();
        $classArr = array();
        $gradeArr = array();

        $subjectArr[$i] = trim($_POST[ ($prefixSubject . $i) ]);
        $arrClassroom = getGradeAndClass( $_POST[ ($prefixClassroom . $i) ] ) ;

//        $arrClassroom = explode(" ", $arrClassroom);
        if( (isFilled($arrClassroom[0])) && (isFilled($arrClassroom[1])) ){
            $tempGrade = $arrClassroom[0];
            $tempClass = $arrClassroom[1];

            $gradeArr[$i] = $tempGrade;
            $classArr[$i] = $tempClass;

            $myTime -> insertSLot($i, $gradeArr[$i], $classArr[$i], $subjectArr[$i]);
    //        echo $subjectArr[$i] . " _ " . $gradeArr[$i] . "_" .  $classArr[$i] . "<br/>";
        }
        else{
            break;
        }
    }

    if(!$i == 39 ){
        sendNotification("Error: Invalid class entered");
    }
    else{
        $operation = $myTime ->updateTimetableToDB();

        //        echo  $operation;
        if ($operation == true){
            sendNotification("Timetable updated.");
        }else{
            sendNotification("Error updating timetable.");
        }
    }
//        var_dump($myTime);
}

if (isset($_GET["getTimetable"]))
{
    $currentStaffId = $_GET["staffID"];
    $result = getStaffMember($_GET["staffID"]);

    $row = $result[0];
    $currentStaffName = $row[1];

    $myTime = new Timetable();

    $myTime->staffId = "$currentStaffId";
    $myTime->getTimetableFromDB();
}

?>
<html>
    <head>
        <link rel="stylesheet" href="timetable.css">
        <script src="timetable.js"></script>

        <script>
            $(document).ready(function() {

                var i = 0;

//                setInterval(function(){
//                    $("#" + i).toggleClass("animated");
//                    i++;
//                    if(i >= 40)
//                        i=0;
//                }, 100);

                var editable = false;

                $('#btnMakeEditable').on('click', function(e){
                    if (editable == false){
                        $('.classroom input').each( function(i, obj){
                            $(obj)
                                .attr("readonly", false)
                                .closest("div")
                                    .css("opacity",".7");
                        });
                        $('.subject textarea').each( function(i, obj){
                            $(obj)
                                .attr("readonly", false)
                                .css("color", "#101010");
                        });
                        editable = true;
                    }
                    else{
                        $('.classroom input').each( function(i, obj){
                            $(obj)
                                .attr("readonly", true)
                                .closest("div")
                                .css("opacity",".5");
                        });
                        $('.subject textarea').each( function(i, obj){
                            $(obj)
                                .attr("readonly", true)
                                .css("color", "#444444");
                        });
                        editable = false;
                    }
                });

            });
        </script>
    </head>
    <body>

    <h1><?php echo getLanguage("timetable", $lang) ?></h1>

<!--    <h2>--><?php //echo getLanguage("chooseOption", $lang) ?><!--</h2>-->
    <form method="get">
        <table id="info">
            <tr>
                <td><label><?php echo getLanguage("staffId",$lang)?></td>
                    <td><input type="text" class="text1" name="staffID" value="<?php echo $currentStaffId?>" /></td>
                    <td><input type="submit" class="text1" name="getTimetable" value="Get Timetable" /></td>
            </tr>
            <tr><td></td>
                <td colspan="2"><label class="text1"><?php echo $currentStaffName;?></label></td>
            </tr>
        </table>
    </form>


    <form name="frmTimetable" method="post">
        <input name="staffId" value="<?php echo $currentStaffId?>" hidden="hidden"/>


        <table id="edit">
            <tr><td><input id="btnMakeEditable" type="button" name="btnMakeEditable" value="Edit Timetable"></td></tr>
        </table>
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

                $classColour = array();


                for($i = 0; $i < 8; $i++){

                    if(($i == 4)){ //INTERVAL
                        $intervalRow = "\t<tr class=interval>\t<td>10.30-10.50</td> \t<td colspan=\"5\" >" . "INTERVAL" . "</td>\t</tr>\n";
                        echo $intervalRow;
                    }

                    for($x = 0; $x < 6; $x++){
                        $thisCell = "";
                        if($x == 0){
                            $thisCell = "\t<tr>\t";
                            $thisCell .= "<td class='time'>" . $timeArray[ $i ] . "</td>";
                        }
                        else{ //Normal rows are here.
                            $number=($i + (8 * ($x - 1) ));
                            $thisCell = "";

                            $subject = $myTime->slot[$number]->Subject;
                            $class = $myTime->slot[$number]->Grade . " " . $myTime->slot[$number]->Class;

                            $currColour = $colourArray[ (rand(0,14)) ];
                            while ( in_array($currColour, $classColour) )
                            {
                                $currColour = $colourArray[  (rand(0,14)) ];
                            }

                            if( trim($class) == ""){
                                $classColour[$class] = "#dedede";
                            }
                            if ($classColour[$class] == ""){
                                $classColour[$class] = $currColour;
                            }
                            else{
                                $currColour = $classColour[$class];
                            }

                            $classDiv = "<div class='classroom'><input id='classroom_$number' name='classroom_$number' readonly value='" . $class . "' /></div>";

                            $thisCell .= "\t<td class='subject' style='background-color:$currColour;'  id=\"" . $number . "\">" . $classDiv;
                            $thisCell .= "<textarea id='subject_$number' name='subject_$number' readonly style='background-color:$currColour;'>" . $subject . "</textarea></td>";
                            if ($x % 5 == 0){
                                $thisCell .= "\t</tr>\n";
                            }
                        }
                        echo $thisCell;
                    }
                }
            ?>
        </table>

        <br/>
        <br/>
        <table id="submit">
            <tr>
                <td><input type="submit" name="Submit" value="Save Changes" ></td>
            </tr>
        </table>

    </form>

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1200;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Timetable";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>