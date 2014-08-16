<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
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

            /*
            ADD YOUR CSS HERE
            */

    h1 {
        text-align:center;
    }
    .insert{
        position:absolute;
        left:80px;
        top:80px;
    }
    th{
        text-align:center;
        color:white;
        background-color:#005e77;
        height:30px;
        padding:5px;
    }
    td {
        padding:5px;
    }
    input.button {
        position:relative;
        font-weight:bold;
        font-size:15px;
        Right:-335px;
        top:20px;
    }

    #timetable {
        position: relative;
        top: 280px;
        left: 100px;
    }

    #timetable, #timetable th, #timetable td {
        border: 1px solid black;
    }

    #timetable  th{
        width: 130px;
    }

    #timetable  td {
        width: 130px;
        text-align: center;
    }

    #timetable  tr{
        height: 10px;
    }
    table {
        border-spacing:0px;
    }
    td 	{
        padding:10px;
    }




        </style>
    </head>
    <body>

    <div id="main">



        <h1>View Attendance</h1>

        <form>

            <table class="insert">
                <tr><th>View Attendance details</th><th></th></tr>
                <tr class="alt">
                <tr>

                    <td>Student Name</td>
                    <td><input name="studentName" type="text" value=""/></td>
                    <td>Admission Number</td>
                    <td><input name="admissionNumber" type="text" value=""/></td>

                </tr>

                <tr class="alt">


                <tr>

                    <td>Date from</td>
                    <td><input name="dateFrom" type="date" value=""></td>
                    <td>Date to</td>
                    <td><input name="dateTo" type="date" value=""></td>
                </tr>


                <tr>
                    <td></td>

                    <td><input class="button" type="button" value="Search"></td>


                </tr>


            </table>

            <table id="timetable" >
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Status</th>
                    <th>Details</th>
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

                <tr><td ></td>
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
        </form>
    </div>




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