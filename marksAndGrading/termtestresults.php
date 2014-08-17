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

    <form>
        <h1>Term Test Results</h1>

        <table id="details" class="insert" cellspacing="0">

            <tr>
                <td class="title">Grade</td>
                <td><input type="text" value="" readonly></td>



            </tr>
            <tr>
                <td class="title">Class</td>
                <td><input type="text" value="" readonly></td>
            </tr>
            <tr>
                <td class="title">Teacher's Name</td>
                <td><input type="text" value="" readonly></td>
            </tr>

            <tr>
                <td class="title">Subject</td>
                <td><input type="text" value="" readonly></td>
            </tr>

            <tr>
                <td class="title">Year</td>
                <td><input type="text" value="" readonly></td>
            </tr>
            <tr>
                <td class="title">Term</td>
                <td><input type="text" value=""readonly></td>
            </tr>
            </table>
        </form>

            <h1></h1>
            <h1></h1>

    <table id="marks">
        <tr id="tHeader">

                <tr>
                    <th>Admission Number</th>
                    <th>Name</th>
                    <th>Marks</th>
                    <th>Remarks</th>

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

                <td><input class="button" type="submit" value="Submit"></td>

                <td><input class="button1" type="reset" value="Reset"></td>
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