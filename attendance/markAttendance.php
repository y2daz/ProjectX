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
    ob_start();

    $arrGradeAndClass = array();
    $arrGradeAndClass[0] = "";
    $arrGradeAndClass[1] = "";
    $attendanceDisplay = "none";
    $classDateDisplay = "block";

    if (isset($_GET["Grade"])){
        $arrGradeAndClass = getGradeAndClass($_GET["Grade"]);

        if (isFilled($arrGradeAndClass[0]) && isFilled($arrGradeAndClass[1]) ){  //Insert proper check class logic
            $attendanceDisplay = "block";
            $classDateDisplay = "none";
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
                display: <?php echo $classDateDisplay?>;
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
    </head>
    <body>

        <h1>Keep Attendance</h1>

        <form method="get">
            <table id="classDate">
                <tr><td>Grade and class</td>
                    <td><input type="text" name="Grade" value=""></td></tr>
                <tr><td><br/></td></tr>
                <tr><td>Week</td>
                    <td><input name="week" type="date"/></td></tr>
                <tr><td colspan="2">&nbsp;</td> </tr>
                <tr><td></td><td><input type="submit" name="sbtGetStudent" value="Mark Attendance"/></td></tr>
            </table>
        </form>
        <br />
        <br />
        <table id="attendance">
            <tr id="tHeader">
                <th>Admission No</th><th>Name</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th>
            </tr>

            <?php
                $i = 0;
//                $noOfStudents = 40;
//                getGradeAndClass("1  MA");

                $result = getClassOfStudents( $arrGradeAndClass[0] , $arrGradeAndClass[1]);

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
                            if ($x == 3) //Insert holiday logic
                            {
                                $cBox = "<td class=\"disabled\"></td>";
                            }
                            else
                            {
                                $cBox = "<td><input type=\"checkbox\" name=\"box" . $i . $x . "\" checked /></td>";
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
        <form method="post">
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

