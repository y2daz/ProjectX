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

if (isset($_POST["submit"]))
{

    $indexNo=$_POST["indexNo"];
    $admissionNo=$_POST["admissionNo"];
    $Year=$_POST["year"];
    $Subject1 = $_POST["subject_1"];
    $Grade1 = $_POST["grade_1"];
    $Subject2 = $_POST["subject_2"];
    $Grade2 = $_POST["grade_2"];
    $Subject3 = $_POST["subject_3"];
    $Grade3 = $_POST["grade_3"];
    $GeneralEnglish=$_POST["generalEnglish"];
    $CommonGenaralTest=$_POST["commongeneraltest"];
    $ZScore=$_POST["zScore"];
    $DistrictRank=$_POST["districRank"];
    $IslandRank=$_POST["IsLandRank"];

    $operation = insertALMarks($admissionNo, $indexNo, $Year, $Subject1, $Subject2, $Subject3, $Grade1, $Grade2, $Grade3, $GeneralEnglish, $CommonGenaralTest, $ZScore, $IslandRank, $DistrictRank);

    if($operation==true){
        sendNotification("Insert successful.");
    }
    else{
        sendNotification("Error inserting marks.");
    }
}

?>
<?php

    if($_COOKIE['language'] == 0)
    {
    $indexno = "Index Number";
    $admissionnumber = "Admission Number";
    $year = "Year";
    $subject="Subject";
    $grade="Garde";
    $generalenglish="General English";
    $commongeneraltest="Common General Test";
    $zscore="Z-Score";
    $islandrank="Inland Rank";
    $districrank="District Rank";
    $gcealresultssheet="G.C.E A/L Results Sheet";
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
    $generalenglish="සාමාන්‍ය ඉංග්‍රීසි";
    $commongeneraltest="සාමාන්‍ය පොදු පරීක්ෂණය";
    $zscore="Z ලකුණ";
    $islandrank="දිවයින් ස්ථානය";
    $districrank="දිස්ත්‍රික් ස්ථානය";
    $gcealresultssheet="අ.පො.ස. උසස් පෙළ විභාග ප්‍රතිඵල  සටහන";
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
            }
            table, th, td {
                border: 0px solid black;

            }
            th{
                width: 1000px;
                text-align:left;
            }

            td {
                width: 10px;
                text-align:left;
            }

            tr{
                height: 20px;
            }
            input.button {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:200px;
                top:40px;
            }
            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:280px;
                top:40px;
            }
        </style>
    </head>
<body>

<form method="post">
    <h1><?php echo $gcealresultssheet ?></h1>

    <table>
    <tr>
        <td><?php echo $indexno ?></td>
        <td><input name="indexNo" type="text" value="" ></td>
        <td><?php echo $admissionnumber ?></td>
        <td><input name="admissionNo" type="text" value="" > </td>
        <td><?php echo $year ?></td>
        <td><input name="year" type=text" value="" ></td>
    </tr>
    </table>

    <br />

    <table>
        <tr>
            <th><?php echo $subject ?></th>
            <th><?php echo $grade ?></th>
        </tr>
        <tr>
            <td><input name="subject_1"type="text" value="" ></td>
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
            <td><input name="subject_2" type="text" value="" ></td>
            <td><select name="grade_2"  type="text" value="">
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
            <td><input name="subject_3" type="text" value="" ></td>
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
            <td><?php echo $generalenglish ?></td>
            <td><select name="generalEnglish" type="text" value="">

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
            <td><?php echo $commongeneraltest?></td>
            <td><input name="commongeneraltest" type="text" value="" maxlength="3">

            </td>
        </tr>
    </table>

        <br />

        <table>
                <tr>
                    <td><?php echo $zscore ?></td>
                    <td><input name="zScore" type="text" value="" >
                    </td>
                </tr>
                <tr>
                    <td><?php echo $islandrank ?></td>
                    <td><input name="IsLandRank" type="text" value="" >
                    </td>
                </tr>
                <tr>
                    <td><?php echo $districrank ?></td>
                    <td><input name="districRank" type="text" value="" >
                    </td>
                </tr>
        </table>




            <input name="submit" class="button" type="submit" value="<?php echo $submit ?>">
            <input class="button1" type="reset" value="<?php echo $reset ?>">
            </form>

</body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "A Level Marks Input";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>