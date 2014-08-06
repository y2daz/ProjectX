<?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
 */
    session_start();

    if(!isset($_COOKIE['language']))
    {
        setcookie('language', '0'); //where 0 is English and 1 is Sinhala
    }

    /*CHANGE THIS ACCORDING TO WHAT HEIGHT YOU WANT*/
//    $fullPageHeight = 700;
//
//    $footerTop = $fullPageHeight + 50;


?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $pageTitle ?></title>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

        <script src="/jquery-1.11.1.min.js"></script>
        <script src="/common.js"></script>

        <!--Static Resource -->
        <link rel="stylesheet" type="text/css" href="/Styles/main.css">

        <style type=text/css>

            /*DO NOT EDIT THE FOLLOWING*/

            /*Dynamic Styles*/
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }
            /*Static Styles*/
            /*INSERT ALL YOUR CSS HERE*/


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

        if($_COOKIE["language"] == "0")
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
            <?php
                 echo $pageContent;
            ?>
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
            <ul><a href="#" onClick="setCookie('language','1')">සිංහල</a> | <a href="#" onClick="setCookie('language','0')">English</a></ul>
        </div>
    
        <div id="nav">
            <li><a id="blue">Notices</a>
                <ul>
                    <li><a href="#">View Notices</a><hr /></li>
                    <li><a href="#">Create Notice</a></li>
                </ul>
            </li>
            <li><a><?php echo $staffManagement; ?></a>
                <ul>
                    <li><a href="/staffManagement/staffRegistration.php"><?php echo $registerStaffMember; ?></a><hr /></li>
                    <li><a href="/staffManagement/blacklist.php">Manage Blacklist</a><hr /></li>
                    <li><a href="/staffManagement/ClassInformation.php">Class Information</a><hr /></li>
                    <li><a href="/staffManagement/searchViewStaffDetails.php"><?php echo $searchStaffMember; ?></a><hr /></li>
<!--                    <li><a href="/staffManagement/sports.php">Sports</a><hr /></li>-->
                    <li><a href="/staffManagement/teacherAchievenment.php">Staff Achievements</a></li>
                </ul>
            </li>
            <li><a><?php echo $leaveManagement; ?></a>
                <ul>
                    <li><a href="/leaveManagement/applyForLeave.php"><?php echo $applyForLeave; ?></a><hr /></li>
                    <li><a href="/leaveManagement/approveLeave.php"><?php echo $approveLeave; ?></a><hr /></li>
<!--                    <li><a href="/leaveManagement/cancelLeave.php">--><?php //echo $viewLeaveHistory; ?><!--</a><hr /></li>-->
                    <li><a href="/leaveManagement/previousLeaveHistory.php">Generate Leave Report</a></li>
                </ul>
            </li>
            <li><a><?php echo $timetables; ?></a>
<!--                <ul>-->
<!--                    <li><a  href="#">Create Timetable by Teacher</a><hr /></li>-->
<!--                    <li><a  href="#">Create Timetable by Class</a></li>-->
<!--                </ul>-->
            </li>
            <li><a>Substitute Teacher</a>
<!--                <ul>-->
<!--                    <li><a  href="#">Substitute Period by Teacher</a><hr /></li>-->
<!--                    <li><a  href="#">Substitute Period by Class</a></li>-->
<!--                </ul>-->
            </li>
            <li><a><?php echo $eventManagement; ?></a>
                <ul>
                    <li><a  href="#">View Event List</a><hr /></li>
                    <li><a  href="#">Manage Events</a></li>
                </ul>
            </li>
            <li><a>Attendance</a>
                <ul>
                    <li><a  href="/attendance/markAttendance.php">Mark Attendance</a><hr /></li>
                    <li><a  href="/attendance/classwise.php">Class-wise Report</a><hr /></li>
                    <li><a  href="/attendance/studentwise.php">Student-wise Report</a></li>
                </ul>
            </li>
            <li><a>Marks and Grading</a>
                <ul>
                    <li><a  href="#">Enter O/L Results</a><hr /></li>
                    <li><a  href="#">Enter A/L Results</a><hr /></li>
                    <li><a  href="#">Enter Term Marks</a><hr /></li>
                    <li><a  href="#">Search Grading Information</a></li>
                </ul>
            </li>
            <li><a>Administrative Tasks</a>
                <ul>
                    <li><a  href="#">Manage Year Plan</a><hr /></li>
                    <li><a  href="#">Manage Users</a></li>
                </ul>
            </li>
        </div>





    </body>
</html>