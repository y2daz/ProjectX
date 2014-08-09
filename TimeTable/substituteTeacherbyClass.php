    <?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
 * edit by : madusha mendis
 */
    session_start();

    $_SESSION['language']=0;

    if(isset($_GET['lang']))
    {
        $_SESSION['language']=$_GET['lang'];
    }
    else
    {
        $_SESSION['language']=0; //where 0 is English and 1 is Sinhala
    }

?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <style type=text/css>

            *{
                font-family: 'Open Sans', sans-serif;
                font-weight: 400;
                /*font-size: 14px;*/
            }

            #timetable {
                position: relative;
                top: 25px;
            }

            #timetable, #timetable th, #timetable td {
                border: 1px solid black;
            }

            #timetable  th{
                width: 130px;
            }

            #timetable  td {
                width: 230px;
                text-align: center;
            }

            #timetable  tr{
                height: 10px;
                    }
            #info{
                position: relative;
                top: 10px;
            }

            #info  th{
                width: 200px;
                text-align: center;

            }

            #info  tr{
                width: 390px;
                text-align: center;
            }

            #tinfo {
                position: relative;
                top: 15px;
                left: 36px;

            }

            #tinfo  th{
               width: 100px;
                text-align: center;

            }

            #tinfo  tr{
                width: 300px;
                text-align: center;
            }

            body {
                background-image:url('images/cream_pixels.png');
                background-repeat: repeat;
                height:<?php echo "800px"; ?>
            }
            li, ul {
                list-style-type: none;
            }
            #nav {
                position:absolute;
                display:block;
                background-color: white;
                float: left;
                width: 280px;
                top: 260px;
                left: 43px;
                border-top: 2px solid;
                border-top-color: #f0f0f0;
                border-left: 2px solid;
                border-left-color: #f0f0f0;
                border-bottom: 2px solid;
                border-bottom-color: #f0f0f0;

                /*box-shadow:-8px 0px 20px 5px #bcbcbc;*/
                /*border-top: 1px solid #999;*/
                /*border-right: 1px solid #999;*/
                /*border-left: 1px solid #999;*/
            }
            #nav li a {
                display: block;
                padding: 10px 15px;
                background: #ffffff;
                /*border-top: 1px solid #eee;*/
                /*border-bottom: 1px solid #999;*/
                text-decoration: none;
                color: #000;
            }
            #nav li a:hover {
                  background: #ececec;
                  color: #00aee9;
                  cursor: pointer; cursor: hand;
            }
            #nav li a.active {
                background: #ececec;
                color: #0099d4;
            }
            #nav li ul {
                display: none; // used to hide sub-menus
            }
            #nav li ul li a {
                padding: 10px 25px;
                background: #ffffff;
                font-size:14px;
                /*border-bottom: 2px solid #ececec;*/
                /*border-bottom: 1px dotted #ccc;*/
            }
            #nav li ul li a:hover {
                padding: 10px 25px;
                background: #ffffff;
                font-size:14px;
                /*border-bottom: 1px dotted #ccc;*/
            }
            /*.sub:hover {*/
                /*background: white;*/
                /*color: #e90800;*/
                /*cursor: pointer; cursor: hand;*/
            /*}*/
            #nav li ul li hr{
                width: 80%;
                padding: 0px 0px 0px 0px;
                margin: 0px auto;
                /*border-bottom: 2px solid #ececec;*/
                /*border-bottom: 1px dotted #ccc;*/
            }

            #main {
                width:700px;
                height:<?php echo "840px"; ?>; /*We will change the height depending on what we need*/
                margin: 0px auto 0px auto;
                clear: both;
                top:100px;
                background-color: #ffffff;
                /*border: 4px solid gray;*/
                /*box-shadow:0px 0px 20px 5px #bcbcbc;*/
                border: 2px solid #f0f0f0;
                border-radius: 0px 0px 20px 20px;
                position:relative;
                display: block;
            }
            #header{
                position:absolute;
                top:0px;
                left:0px;
                z-index: -1;
                width:100%;
                height:250px;
                background-color: #003448;
            }
            #footer {
                position:absolute;
                bottom:-350px;
                left:0px;
                z-index: -1;
                width:100%;
                height:250px;
                background-color: #2d2d2d;
            }
            #language{
                position: absolute;
                z-index: 7;
                background-color: #003448;
                /*border: 2px solid #00445d;*/
                margin: 10px 0px 0px 0px;
                top:0px;
                right:10px;
                width:100px;
                height: 30px;
                text-align: center;
            }
            #language ul{
                padding: 0;
                margin: 0;
                font-size: 12px;
                color: #cc7f00;
            }
            #language ul a{
                font-size: 12px;
                color: #cc7f00;
                padding: 0;
            }
            #aboutus{
                position: relative;
                color: #f0f0f0;
                width:50%;
                margin:90px auto 0px auto;
                clear: both;
            }
            #aboutus p{
                font-weight: 600;
                font-size: 18px;
                color: #cc7f00;
            }
            #timetable {
                position: relative;
                top: 25px;
            }

            #timetable, #timetable th, #timetable td {
                border: 1px solid black;
            }

            #timetable  th{
                width: 130px;
            }

            #timetable  td {
                width: 230px;
                text-align: center;
            }

            #timetable  tr{
                height: 10px;
            }

            #assign {
                position: relative;
                top: 75px;
            }

            #assign, #assign th, #assign td {
                border: 1px solid black;
            }

            #assign  th{
                width: 130px;
            }

            #assign  td {
                width: 230px;
                text-align: center;
            }

            #assign  tr{
                height: 25px;
            }
            #info{
                position: relative;
                top: 10px;
            }

            #info  th{
                width: 200px;
                text-align: center;

            }

            #info  tr{
                width: 390px;
                text-align: center;
            }

            #tinfo {
                position: relative;
                top: 15px;
                left: 36px;

            }

            #tinfo  th{
                width: 100px;
                text-align: center;

            }

            #tinfo  tr{
                width: 300px;
                text-align: center;
            }
            #submit{
                position: relative;
                top: 50px;
            }

            #submit  th{
                width: 200px;
                text-align: center;

            }

            #submit  tr{
                width: 390px;
                text-align: center;
            }

            h1{
                text-align: center;

            }

            h2{
                text-align:left;
                position: relative;
                left: 20px;
                top : 10px;

            }
        p{
            text-align: left;
            position: relative;
            left: 60px;
            top: 15px;
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
    <?php //Get language and make changes

    if($_SESSION['language'] == 0)
    {
        $staffManagement = "Staff Management";
        $leaveManagement = "Leave Management";
        $timetables = "Timetables";
        $eventManagement = "Event Management";

        $registerStaffMember = "Register Staff Member";
        $searchStaffMember = "Search Staff Member";
        $applyForLeave = "Apply for Leave";
        $approveLeave = "Approve Leave";
        $viewLeaveHistory = "View Leave History";
        $createTimetableByTeacher = "Create Timetable by Teacher";
        $createTimetableByClass = "Create Timetable by Class";
    }
    else
    {
        $staffManagement = "කාර්යමණ්ඩලය කළමනාකරණය";
        $leaveManagement = "නිවාඩුව කළමනාකරණය";
        $timetables = "කාලසටහන";
        $eventManagement = "උත්සවය කළමනාකරණය";

        $registerStaffMember = "කාර්යමණ්ඩලය වාර්තාකරන්න";
        $searchStaffMember = "කාර්යමණ්ඩලය සෙවීම";
        $applyForLeave = "නිවාඩු ඉල්ලීම්කිරීම";
        $approveLeave = "නිවාඩු අනුමතකිරීම";
        $viewLeaveHistory = "ඉකුත් වූ නිවාඩු";
        $createTimetableByTeacher = "ගුරුවරයා විසින් කාලසටහන සැකසුම";
        $createTimetableByClass = "පන්තිය විසින් කාලසටහන සැකසුම";
    }
    ?>
    <body>

        <div id="main">

            <h1>Substitute Teacher Form</h1>

            <h2>Choose Option</h2>

            <table id="info">
                <td>
                     <th><input type="RADIO" name="Choice1" value="Teacher"> by Teacher</th>
                     <th><input type="RADIO" name="Choice2" value="Class"> by Class</th>
                </td>
            </table>

                <p>Class : <input type="text" name="class" value=""></p>




            <table id="timetable" >
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                </tr>

                <tr>
                    <td >07.50-08.30</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >08.30-09.10</td>
                    <td >   </td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >09.10-09.50</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >09.50-10.30</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr><td  >10.30-10.50</td>
                    <td  colspan="5" align="center">INTERVAL</td>
                </tr>

                <tr>
                    <td >10.50-11.30</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >11.30-12.10</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >12.10-12.50</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                </tr>

                <tr>
                    <td >12.50-01.30</td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    <td ></td></tr>

            </table>

            <table id="assign">
                <tr>
                    <th>TEACHER</th>
                    <th>CONTACT NUMBER </th>
                </tr>
                <tr>
                    <td > </td>
                    <td ></td>
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                </tr>


            </table>


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
            <?php
            $myURL = array();
            $myURL = explode("?", $_SERVER["REQUEST_URI"]);
            ?>
            <ul><a href="<?php echo $myURL[0] . "?lang=1"; ?>">සිංහල</a> | <a href="<?php echo $myURL[0] . "?lang=0"; ?>">English</a></ul>
        </div>
    
        <div id="nav">
            <li><a><?php echo $staffManagement; ?></a>
                <ul>
                    <li><a href="#"><?php echo $registerStaffMember; ?></a><hr /></li>
                    <li><a href="#"><?php echo $searchStaffMember; ?></a></li>
                </ul>
            </li>
            <li><a><?php echo $leaveManagement; ?></a>
                <ul>
                    <li><a href="#"><?php echo $applyForLeave; ?></a><hr /></li>
                    <li><a href="#"><?php echo $approveLeave; ?></a><hr /></li>
                    <li><a href="#"><?php echo $viewLeaveHistory; ?></a></li>
                </ul>
            </li>
            <li><a><?php echo $timetables; ?></a>
                <ul>
                    <li><a  href="#">Create Timetable by Teacher</a><hr /></li>
                    <li><a  href="#">Create Timetable by Class</a><hr /></li>
                    <li><a  href="#">Substitute Period by Teacher</a><hr /></li>
                    <li><a  href="#">Substitute Period by Class</a></li>
                </ul>
            </li>
            <li><a><?php echo $eventManagement; ?></a>
                <ul>
                    <li><a  href="#">View Event List</a><hr /></li>
                    <li><a  href="#">Manage Events</a></li>
                </ul>
            </li>
        </div>





    </body>
</html>