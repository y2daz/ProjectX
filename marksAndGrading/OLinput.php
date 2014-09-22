<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();
error_reporting(E_ERROR | E_PARSE);


if (isFilled($_POST["submit"])) {

    $prefixSub="subject_";
    $prefixGrade="grade_";

    $indexNo=$_POST["indexNo"];
    $admissionNo=$_POST["admissionNo"];
    $Year=$_POST["year"];

    $subjectArr=array();
    $gradeArr=array();

    for($i=1;$i<=9;$i++){
        $subjectArr[$i-1] = $_POST[ ($prefixSub . $i )];
        $gradeArr[$i-1] = $_POST[ ($prefixGrade . $i )];

    }

    $operation = insertOLMarks($admissionNo,$indexNo,$Year,$subjectArr,$gradeArr);

    if($operation==true){
        sendNotification("Insert successful.");
    }
    else{
        sendNotification("Error inserting marks.");
    }



}


if($_COOKIE['language'] == 0)
{
    $indexno = "Index Number";
    $admissionnumber = "Admission Number";
    $year = "Year";
    $subject="Subject";
    $grade="Grade";
    $gceolresultssheet="G.C.E O/L Results Sheet";
    $submit="Submit";
    $reset="Reset";

}
else
{
    $indexno = "විභාග අංකය";
    $admissionnumber ="ඇතුලත්වීමේ අංකය";
    $year = "වර්ෂය";
    $subject="විෂය";
    $grade="සාමාර්ථය";
    $gceolresultssheet="අ.පො.ස. සාමාන්‍ය පෙළ විභාග ප්‍රතිඵල සටහන";
    $submit="යොමු කරන්න";
    $reset="නැවත පිහිටුවන්න";
}

?>

<html>
<head>
    <style type=text/css>
        <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
        <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->



           h1{
               text-align: center;
               background-color: #005e77;
               color: #ffffff;
           }
            #results {
                border: 0px solid black;
                max-width: 250;

            }
            #results th{
                width: 150px;
                text-align: center;
                background-color: #005e77;
                color: #ffffff;
            }

            #results td {
                width: 20px;
                text-align: center;
            }
            #results tr{
                height: 10px;
                    }
            input.button {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:300px;
                top:40px;

            }
            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:330px;
                top:40px;

            }
        </style>
    </head>

    <body>
        <h1><?php echo $gceolresultssheet ?></h1>

        <form method="post">
        <table>
            <tr class = "alt">
                <td><td><?php echo $indexno ?></td></td>
                <td><td><input name="indexNo" type="text" value="" ></td></td>
                <td><td><?php echo $admissionnumber ?></td></td>
                <td><td><input name="admissionNo" type="text" value="" ></td></td>
                <td><td><?php echo $year ?></td></td>
                <td><td><input name="year" type=text" value=""></td></td>
            </tr>
        </table>

        <br />

        <table id="results" align="center">

            <tr>

                <th>Subject Number</th>
                <th><?php echo $subject ?></th>
                <th><?php echo $grade ?></th>
            </tr>
            <tr>
                <td>1</td>
                <td><input name="subject_1" type="text" value="Mathematics" readonly></td>
                <td><select name="grade_1" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td><input name="subject_2" type="text" value="Science and Technology" readonly></td>
                <td><select name="grade_2" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td><input name="subject_3" type="text" value="English Language" readonly></td>
                <td><select name="grade_3" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td><input name="subject_4" type="text" value="Sinhala Language" readonly></td>
                <td><select name="grade_4" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td><input name="subject_5" type="text" value="Religion" readonly></td>
                <td><select name="grade_5" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>6</td>
                <td><input name="subject_6" type="text" value="History" readonly></td>
                <td><select name="grade_6" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>7</td>
                <td><input name="subject_7" type="text" value=""></td>
                <td><select name="grade_7" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>8</td>
                <td><input name="subject_8" type="text" value=""></td>
                <td><select name="grade_8" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>9   </td>
                <td><input name="subject_9" type="text" value="" ></td>
                <td><select name="grade_9" type="text" value="">
                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                    </select>
                </td>
            </tr>
        </table>

        <br />


            <tr>
                <td><!--Blank td aligns the below buttons to the middle --></td>
                <td><input name="submit" class="button" type="submit" value="<?php echo $submit ?>" ></td>
                <td> <input class="button1" type="reset"  value="<?php echo $reset ?>" ></td>
            </tr>
        </form>


    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Insert O'Level Grades";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>