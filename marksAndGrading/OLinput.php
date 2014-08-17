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
                left:50px;
                top:20px;
            }
            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:100px;
                top:20px;
            }
        </style>
    </head>

    <body>
        <h1>G.C.E O/L Results Sheet</h1>
        <table>
            <tr>
                <td>Index Number</td>
                <td><input type="text" value=""></td>
                <td>Name</td>
                <td><input type="text" value="" </td>
                <td>Year</td>
                <td><input type=text" value=""</td>
            </tr>
        </table>

        <br />

        <table>
            <tr>
                <th>Subject</th>
                <th>Grade</th>
            </tr>
            <tr>
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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
                <td><input type="text" value=""></td>
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

        <table>
            <tr>
                <td><!--Blank td aligns the below buttons to the middle --></td>
                <td><input class="button" type="submit" value="Submit"></td>
                <td><input class="button1" type="reset" value="Reset"></td>
            </tr>
        </table>

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