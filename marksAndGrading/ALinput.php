<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

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
    $inlandrank="Island Rank";
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
    $inlandrank="දිවයින් ස්ථානය";
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

<form>
    <h1><?php echo $gcealresultssheet ?></h1>

    <table>
    <tr>
        <td><?php echo $indexno ?></td>
        <td><input type="text" value="" readonly></td>
        <td><?php echo $admissionnumber ?></td>
        <td><input type="text" value="" readonly> </td>
        <td><?php echo $year ?></td>
        <td><input type=text" value="" readonly></td>
    </tr>
    </table>

    <br />

    <table>
        <tr>
            <th><?php echo $subject ?></th>
            <th><?php echo $grade ?></th>
        </tr>
        <tr>
            <td><input type="text" value="" readonly></td>
            <td><select type="text" value="">
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
            <td><input type="text" value="" readonly></td>
            <td><select type="text" value="">
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
            <td><input type="text" value="" readonly></td>
            <td><select type="text" value="">
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
            <td><select type="text" value="">

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
            <td><input type="text" value="" maxlength="3" required="true">

            </td>
        </tr>
    </table>

        <br />

        <table>
                <tr>
                    <td><?php echo $zscore ?></td>
                    <td><input type="text" value="" required="true">
                    </td>
                </tr>
                <tr>
                    <td><?php echo $inlandrank ?></td>
                    <td><input type="text" value="" required="true">
                    </td>
                </tr>
                <tr>
                    <td><?php echo $districrank ?></td>
                    <td><input type="text" value="" required="true">
                    </td>
                </tr>
        </table>




            <input class="button" type="submit" value="<?php echo $submit ?>">
            <input class="button1" type="reset" value="<?php echo $reset ?>">
            </form>

</body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>