<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 27/07/14
 * Time: 07:26
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();


if($_COOKIE['language'] == 0)
{
    $termtestresults= "Term Test Results";
    $admissionnumber = "Admission Number";
    $grade="Grade";
    $class = "Class";
    $teachername = "Teacher's Name";
    $subject="Subject";
    $year="Year";
    $term="Term";
    $marks="Marks";
    $remarks="Remarks";
    $name="Name";
    $submit="Submit";
    $reset="Reset";
}
else
{

    $term="වාරය";
    $year = "වර්ෂය";
    $subject="විෂය";
    $grade="ශ්‍රේණිය";
    $class="පංතිය";
    $admissionnumber ="ඇතුලත්වීමේ අංකය";
    $teachername="ගුරුවරයාගේ නම";
    $termtestresults="වාර විභාග ප්‍රතිඵල සටහන";
    $marks="ලකුණු";
    $remarks="අදහස්";
    $name="නම";
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
        #details .title{
            background-color: #005e77;
            color: white;
            padding: 2px 10px 2px 10px;
        }

        #marks{
            text-align: left;
            position: relative;
            top:0px;
            left:30px;
            border-collapse: collapse;
            min-width:600px;
        }
        #marks th{
            font-weight: 600;
            color:white;
            background-color: #005e77;
            padding: 2px 5px 2px 5px;
        }
        #marks td{
            padding: 2px 5px 2px 5px;

        }
        #marks tr.alt{
            background-color: #bed9ff;
                }

        form{
            text-align: left;
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
        <h1><?php echo $termtestresults ?></h1>

        <table id="details" class="insert" cellspacing="0">

            <tr>
                <td class="title"><?php echo $grade ?></td>
                <td><input type="text" id="grade" name="grade" value=""readonly></td>



            </tr>
            <tr>
                <td class="title"><?php echo $class ?></td>
                <td><input type="text" value="" readonly></td>
            </tr>
            <tr>
                <td class="title"><?php echo $teachername ?></td>
                <td><input type="text" value="" readonly></td>
            </tr>

            <tr>
                <td class="title"><?php echo $subject ?></td>
                <td><input type="text" value="" readonly></td>
            </tr>

            <tr>
                <td class="title"><?php echo $year ?></td>
                <td><input type="text" value="" readonly></td>
            </tr>
            <tr>
                <td class="title"><?php echo $term ?></td>
                <td><input type="text" value=""readonly></td>
            </tr>
            </table>
        </form>

            <h1></h1>
            <h1></h1>

    <table id="marks">
        <tr id="tHeader">

                <tr>
                    <th><?php echo $admissionnumber ?></th>
                    <th><?php echo $name ?></th>
                    <th><?php echo $marks ?></th>
                    <th><?php echo $remarks ?></th>

                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>


                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>



                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>



                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

            </table>

<table>
            <tr>
                <td></td>

                <td><input class="button" type="submit" value="<?php echo $submit ?>"></td>

                <td><input class="button1" type="reset" value="<?php echo $reset ?>"></td>
            </tr>
</table>
    </body>
</html>

<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>