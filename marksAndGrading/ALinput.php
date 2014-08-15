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

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
<head>
<style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->


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
        left:30px;
        top:20px;
    }
    input.button1 {
        position:relative;
        font-weight:bold;
        font-size:20px;
        left:50px;
        top:20px;
    }



</style>
    </head>


<body>

<div id="main">

    <h1>G.C.E A/L Results Sheet</h1>
<tr>
    <td>Index Number</td>
    <td><input type="text" value=""></td>
    <td>Name</td>
    <td><input type="text" value="" </td>
    <td>Year</td>
    <td><input type=text" value=""</td>
</tr>
<h2></h2>

<table   border="1px solid black" >


    <tr>
        <th>Subject</th>
        <th>Grade</th>
        <th>Medium</th>

    </tr>
    <tr>
        <td><input type="text" value="">
        <td><select type="text" value="">

                <option>--</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>S</option>
                <option>F</option>
                <td><select type="text" value="">

                        <option>--</option>
                        <option>S</option>
                        <option>E</option>
                        <option>T</option>
                    </select>
    </tr>
    <tr>
        <td><input type="text" value="">
        <td><select type="text" value="">

                <option>--</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>S</option>
                <option>F</option>
                <td><select type="text" value="">

                        <option>--</option>
                        <option>S</option>
                        <option>E</option>
                        <option>T</option>
                    </select>
    </tr>

    <tr>
        <td><input type="text" value="">
        <td><select type="text" value="">

                <option>--</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>S</option>
                <option>F</option>
                <td><select type="text" value="">

                        <option>--</option>
                        <option>S</option>
                        <option>E</option>
                        <option>T</option>
                    </select>
    </tr>

    <tr>

        <td>General English</td>
        <td><select type="text" value="">

                <option>--</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>S</option>
                <option>F</option>
                <td><select type="text" value="">

                        <option>--</option>

                        <option>E</option>

                    </select>
    </tr>

    <tr>

        <td>Common General Test</td>
        <td><select type="text" value="">

                <option>--</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>S</option>
                <option>F</option>
                <td><select type="text" value="">

                        <option>--</option>
                        <option>S</option>
                        <option>E</option>
                        <option>T</option>
                    </select>
    </tr>

</table>
    <form>
    <h3></h3>
    <tr class="alt">

        <td>Z-Score</td>
        <td><input type="text" value="">
        </td>
    </tr>

    <tr class="alt">

        <td>Inland Rank</td>
        <td><input type="text" value="">
        </td>
    </tr>

    <tr class="alt">

        <td>District Rank</td>
        <td><input type="text" value="">
        </td>
    </tr>
        </form>


    <tr>
    <td></td>

    <td><input class="button" type="submit" value="Submit"></td>




    <td><input class="button1" type="reset" value="Reset"></td>



</tr>
</div>

</body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>