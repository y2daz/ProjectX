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



table, th, td {
                border: 1px solid black;

            }
            table{
                text-align: left;
            }
            form{
                text-align: left;
            }


            th{
                width: 1300px;
                text-align: center;
            }

            td {
                width: 150px;
                text-align: left;
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





            <h1>Term Test Results Sheet</h1>

    <form>

        <table class="insert" cellspacing="0">
            <tr>
                <td>Grade</td>
                <td><input type="text" value="">


            </tr>
            <tr class="alt">
                <td>Class</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr>
                <td>Teacher's Name</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr class="alt">
            <tr>
                <td>Subject</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr class="alt">
            <tr>
                <td>Year</td>
                <td><input type="text" value=""></td>
            </tr>
            <tr class="alt">
                <td>Term</td>
                <td><input type="text" value=""</td>
            </tr>
            </table>
        </form>

            <h1></h1>
            <h1></h1>

            <table   border="1px solid black" >


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


            <tr>
                <td></td>

                <td><input class="button" type="submit" value="Submit"></td>




                <td><input class="button1" type="reset" value="Reset"></td>








            </tr>






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