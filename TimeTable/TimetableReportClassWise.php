<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 9/17/14
 * Time: 1:32 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
include("timetableClass.php");
ob_start();

$lang = $_COOKIE["language"];

error_reporting(0);//Temporarily turn of all errors

if(!isFilled($_GET["classroom"]))
{
    header("Location: " . PATHFRONT . "/TimeTable/timetableClasswise.php");
}
else{
    $classroom = $_GET["classroom"];
    $myTime = new Timetable();
    $arrClassroom = getGradeAndClass( $classroom );
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
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <link rel="stylesheet" href="TimetableReport.css">
    <!--    <script src="timetable.js"></script>-->
    <style type="text/css">
        #flag {
            position: relative;
            top: 10px;
            left: 15px;
            /*border: 5px solid black;*/
            width: 120px;
            height: 120px;
        }
    </style>

    <script>
    </script>
</head>
<body>

<h1><?php echo getLanguage("timetable", $lang) ?></h1>

<!--    <h2>--><?php //echo getLanguage("chooseOption", $lang) ?><!--</h2>-->
<form method="get">
    <table id="info">
        <tr>
            <th>
                <img id="flag" src="/images/dslogo.jpg"/>
            </th>
            <th id="schoolName"><h1>D.S. Senanayake College</h1></th>
        </tr>
        <tr>
            <td colspan="3" id="teacherName">Class <?php echo $classroom;?></td>
        </tr>
    </table>
</form>



<form name="frmTimetable" method="post">
    <input name="staffId" value="<?php echo $currentStaffId?>" hidden="hidden"/>


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
//        $colourArray = array("#f69988", "#f48fb1", "#ce93d8", "#b39ddb", "#9fa8da", "#afbfff", "#81d4fa", "#80deea", "#80cbc4", "#72d572", "#c5e1a5",
//            "#e6ee9c", "#ffcc80", "#fff59d", "#ffe082"); //15

//        $subjectColour = array();


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

//                    $currColour = $colourArray[(rand(0,14))];
//                    while ( in_array($currColour, $subjectColour) )
//                    {
//                        $currColour = $colourArray[(rand(0,14))];
//                    }

//                    if( trim($subject) == ""){
//                        $subjectColour[$subject] = "#dedede";
//                    }
//                    if ($subjectColour[$subject] == ""){
//                        $subjectColour[$subject] = $currColour;
//                    }
//                    else{
//                        $currColour = $subjectColour[$subject];
//                    }

                    $thisCell .= "\t<td class='subject' id=\"" . $number . "\">";
                    $thisCell .= "<textarea id='subject_$number' name='subject_$number'>" . $subject . "</textarea>";

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

    </table>

</form>

</body>
</html>