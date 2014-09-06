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



if($_COOKIE['language'] == 0)
{
    $indexno = "Index Number";
    $admissionnumber = "Admission Number";
    $year = "Year";
    $subject="Subject";
    $grade="Garde";
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
               }
            table, th, td {
                border: 0px solid black;

            }
            th{
                width: 1300px;
                text-align: center;
            }

            td {
                width: 150px;
                text-align: center;
            }
            tr{
                height: 10px;
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
        <h1><?php echo $gceolresultssheet ?></h1>
        <table>
            <tr>
                <td><?php echo $indexno ?></td>
                <td><input type="text" value="" readonly></td>
                <td><?php echo $admissionnumber ?></td>
                <td><input type="text" value="" readonly></td>
                <td><?php echo $year ?></td>
                <td><input type=text" value=""readonly></td>
            </tr>
        </table>

        <br />

        <table>
            <tr>
                <th><?php echo $subject ?></th>
                <th><?php echo $grade ?></th>
            </tr>
            <tr>
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
                <td><input type="text" value=""readonly></td>
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
        </table>

        <br />


            <tr>
                <td><!--Blank td aligns the below buttons to the middle --></td>
                <td><input class="button" type="submit" value="<?php echo $submit ?>"></td>
                <td>  <input class="button1" type="reset"  value="<?php echo $reset ?>"></td>
            </tr>


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