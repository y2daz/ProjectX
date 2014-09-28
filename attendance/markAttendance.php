<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
    include(THISROOT . "/dbAccess.php");
    require_once(THISROOT . "/common.php");
    require_once(THISROOT . "/formValidation.php");
    error_reporting(E_ERROR | E_PARSE);
    ob_start();

    if($_COOKIE["language"] == 1)
    {
        $gradeandclass = "පන්තිය සහ වසර";
        $week = "සතිය";
        $markAttendance ="පැමිණීම සටහන් කිරීම";
    }
    else{
        $gradeandclass = "Grade and Class";
        $week = "Week";
        $markAttendance ="Mark Attendance";
    }

$arrGradeAndClass = array();
$arrGradeAndClass[0] = "";
$arrGradeAndClass[1] = "";
$attendanceDisplay = "none";
$classDateDisplay = "block";

    if (isset($_POST["submit"])) //User has clicked the submit button
    {
        $workingWeekArr = explode("-W", $_GET["week"]);
        $workingWeek = $workingWeekArr[1];

        $thisYear = date('Y');

        $monday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-1"));
        $tuesday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-2"));
        $wednesday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-3"));
        $thursday= date('Y-m-d', strtotime("$thisYear-W$workingWeek-4"));
        $friday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-5"));

        $classArr =  getGradeAndClass( $_POST["classroom"] );

        $result = getClassOfStudents( $classArr[0], $classArr[1] );

        $admissionNoArr = array();
        $dateArr = array();
        $presentArr = array();

        $i = 0;

        foreach($result as $row){
            for($x = 0; $x < 5; $x++){
                $admissionNoArr[$i] = $row[0];
                $dateArr[$i] = ($x == 0? $monday : ($x == 1? $tuesday : ($x == 2? $wednesday : ($x == 3? $thursday : $friday ))));

                if( isset( $_POST["box"][ $row[$i] ] ) ){
                    $presentArr[$i] = '1';
                }
                else{
                    $presentArr[$i] = '0';
                }
                $i++;
            }
        }
        echo "<pre>";
        print_r($dateArr);
        echo "</pre>";
        echo "<pre>";
        print_r($_POST["box"]);
        echo "</pre>";


//        $operation = markAttendance( $admissionNoArr, $dateArr, $presentArr);
        echo $operation;

        if ($operation == true)
        {
            sendNotification("Successfully added.");
        }
        else
        {
            sendNotification( "Error adding attendance details." );
//            print_r($_POST["box"]);
        }
    }

if (isset($_GET["Grade"])){

    $arrGradeAndClass = getGradeAndClass($_GET["Grade"]);

    if (isFilled($arrGradeAndClass[0]) && isFilled($arrGradeAndClass[1]) ){  //Insert proper check class logic
        $attendanceDisplay = "block";
        $classDateDisplay = "none";
//        sendNotification("There are students in that class");

        $workingWeekArr = explode("-W", $_GET["week"]);
        $workingWeek = $workingWeekArr[1];

        $thisYear = date('Y');
//            $weekNum = 40;
//
        $monday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-1"));
        $tuesday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-2"));
        $wednesday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-3"));
        $thursday= date('Y-m-d', strtotime("$thisYear-W$workingWeek-4"));
        $friday = date('Y-m-d', strtotime("$thisYear-W$workingWeek-5"));

        $class = $arrGradeAndClass[0] . " " .$arrGradeAndClass[1];

//            echo $workingWeek;
    }
    else{
        sendNotification("There are no students in that class");
    }
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
            #classDate{
                position:relative;
                left:30px;
<!--                display: --><?php //echo $classDateDisplay?><!--;-->
            }
            #attendance{
                position: relative;
                top:0px;
                left:30px;
                border-collapse: collapse;
                min-width: 750px;
                display: <?php echo $attendanceDisplay?>;
            }
            #attendance #tHeader{
                font-weight: 600;
                color:white;
                background-color: #005e77;
                padding: 2px 5px 2px 5px;
                /* Safari */
                /*-webkit-transform: rotate(-45deg);*/
                /* Firefox */
                /*-moz-transform: rotate(-45deg);*/
                /* IE */
                /*-ms-transform: rotate(-45deg);*/
                /* Opera */
                /*-o-transform: rotate(-45deg);*/
                /* Internet Explorer */
                /*filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=1);*/
            }
            #attendance td{
                padding: 4px 10px 4px 10px;
            }
            #attendance tr.alt{
                background-color: #bed9ff;
            }
            #attendance td.disabled{
                background-color: #ececec;
            }
            input.button {
                position:relative;
                /*font-weight:bold;*/
                /*font-size:15px;*/
                Right: -450px;
                left: 300px;
                display: <?php echo $attendanceDisplay?>;
                }
        </style>
        <script>

            $(document).ready( function(){

                Date.prototype.getWeek = function () { return $.datepicker.iso8601Week(this); }

                var today = new Date();

//                $("#week").val( today.getWeek() );
//                $("#week").val( today.getFullYear() + "-W" + today.getWeek() );


            });

        </script>
    </head>
    <body>

        <h1>Keep Attendance</h1>

        <form method="get">
            <table id="classDate">
                <tr><td>Grade and class</td>
                    <td><input type="text" name="Grade" value="<?php echo ( isset($_GET["Grade"])? $_GET["Grade"] : "" ) ?>" required></td></tr>
                <tr><td><br/></td></tr>
                <tr><td>Week</td>
                    <td><input id="week" name="week" type="week" value="<?php echo ( isset($_GET["week"])? $_GET["week"] : "" ) ?>" required/></td></tr>
                <tr><td colspan="2">&nbsp;</td> </tr>
                <tr><td></td><td><input type="submit" name="sbtGetStudent" value="Mark Attendance"/></td></tr>
            </table>
        </form>
        <br />
        <br />
        <form method="post">
            <input type="text" name="classroom" value="<?php echo $class ?>" hidden="hidden" />
            <input type="text" name="week" value="<?php echo ( isset($_GET["week"])? $_GET["week"] : "" ) ?>" hidden="hidden" />
        <table id="attendance">
            <tr id="tHeader">
                <th>Admission No</th><th>Name</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th>
            </tr>

            <?php
                $i = 0;
//                $noOfStudents = 40;
//                getGradeAndClass("1  MA");

                $result = getClassOfStudents( $arrGradeAndClass[0] , $arrGradeAndClass[1]);

                //Finding holidays
                $holidayArr = array();

            $holidayArr[0] = isHoliday($monday);
            $holidayArr[1] = isHoliday($tuesday);
            $holidayArr[2] = isHoliday($wednesday);
            $holidayArr[3] = isHoliday($thursday);
            $holidayArr[4] = isHoliday($friday);

                //Finding holidays


                if (isFilled($result)){
                    foreach ($result as $row)
                    {
                        $admissionNo = $row[0];
                        $studentName = $row[1];

                        if ($i % 2 == 1)
                        {
                            echo "<tr class=\"alt\"><td>$admissionNo</td> <td>$studentName</td>";
                        }
                        else{
                            echo "<tr><td>$admissionNo</td> <td>$studentName</td>";
                        }

                        for($x = 0; $x < 5; $x++)
                        {
                            $dayDate = ($x == 0? $monday : ($x == 1? $tuesday : ($x == 2? $wednesday : ($x == 3? $thursdayh : $friday ))));

                            if ( $holidayArr[$x] ) //Insert holiday logic
                            {
                                $cBox = "<td class=\"disabled\"></td>";
                            }
                            else
                            {
                                $cBox = "<td><input type=\"checkbox\" name=\"box[$admissionNo][$dayDate]\" checked />";
                            }
                            echo $cBox;
                        }
                        echo "</tr>";
                        $i++;
                    }
                }
            ?>

        </table>
        <br />
        <table>
            <tr>
                <td></td>
                <td><input name="submit" class="button" type="submit" value="Submit"></td>
            </tr>
        </table>
        </form>
    </body>
</html>
<?php
    //Assign all Page Specific variables
    $fullPageHeight = 600 + ($i * 30);
    $footerTop = $fullPageHeight + 100;

    $pageContent = ob_get_contents();
    ob_end_clean();
    $pageTitle= "Attendance";
    //Apply the template
    include("../Master.php");
?>

