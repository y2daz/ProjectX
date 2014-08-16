<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
session_start();

/*CHANGE THIS ACCORDING TO WHAT HEIGHT YOU WANT*/
$fullPageHeight = 1400;

$footerTop = $fullPageHeight + 50;

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script src="../jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../Styles/main.css">

    <style type=text/css>

        #main{ height:<?php echo "$fullPageHeight" . "px";?> }
        #footer{ top:<?php echo "$footerTop" . "px";?> }


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

    <script>

        $(document).ready(function () {
            $('#nav > li > a').click(function(){
                if ($(this).attr('class') != 'active'){
                    $('#nav li ul').slideUp(300);
                    $(this).next().slideToggle(300);
                    $('#nav li a').removeClass('active');
                    $(this).addClass('active');
                }
                else{
                    $('#nav li ul').slideUp(300);
                    $('#nav li a').removeClass('active');
                }
            });
        });


    </script>


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


<!-- DO NOT EDIT FOLLOWING -->


<div id="header">

</div>

<div id="footer">
    <div id="aboutus">
        <p> ABOUT US</p>
        <span>We're pretty amazing.</span>


    </div>
</div>

<div id="language">
    <ul><a href="/PHP/New%20folder/Template.php?lang=1">සිංහල</a> | <a href="/PHP/New%20folder/Template.php?lang=0">English</a></ul>
</div>

<div id="nav">
    <li><a>Notices</a>
        <ul>

        </ul>

    <li><a>Staff Management</a>
        <ul>
            <li><a href="#">Register Staff Member</a><hr /></li>
            <li><a href="#">Search Staff Member</a></li>
        </ul>
    </li>
    <li><a>Leave Management</a>
        <ul>
            <li><a href="#">Apply for Leave</a><hr /></li>
            <li><a href="#">Approve Leave</a><hr /></li>
            <li><a href="#">View Leave History</a></li>
        </ul>
    </li>
    <li><a>Timetables</a>
        <ul>
            <li><a  href="#">Create Timetable by Teacher</a><hr /></li>
            <li><a  href="#">Create Timetable by Class</a><hr /></li>
            <li><a  href="#">Substitute Period by Teacher</a><hr /></li>
            <li><a  href="#">Substitute Period by Class</a></li>
        </ul>
    </li>
    <li><a>Substitute Teacher</a>
        <ul>

        </ul>
    <li><a>Event Management</a>
        <ul>
            <li><a  href="#">View Event List</a><hr /></li>
            <li><a  href="#">Manage Events</a></li>
        </ul>
    </li>
    <li><a>Attendance</a>
        <ul>
            <li><a  href="#">Year plan </a><hr /></li>
            <li><a  href="#">Keep Attendance</a><hr /></li>
            <li><a  href="#">View Attendance</a><hr /></li>
            <li><a  href="#">Reports</a></li>
        </ul>

    </li>
    <li><a>Marks and Grading</a>
        <ul>

        </ul>

    </li>
    <li><a>Administrative Task</a>
        <ul>

        </ul>

    </li>




</div>





</body>
</html>