<?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
 */
    session_start();
    require_once("dbAccess.php");

    define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);


    if(!isFilled($_COOKIE['language']))
    {
        setcookie('language', '0'); //where 0 is English and 1 is Sinhala
    }
    if(!isFilled($_SESSION["user"]))
    {
        header("Location: " . PATHFRONT . "/login.php");
    }
    if(isset($_GET["logout"]))
    {
        $_SESSION["user"] = NULL;
        header("Location: " . PATHFRONT . "/login.php");
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

        <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
        <script src="<?php echo PATHFRONT ?>/common.js"></script>

        <!--Static Resource -->
        <link rel="stylesheet" type="text/css" href="<?php echo PATHFRONT . "/Styles/main.css";?>">
        <link rel="stylesheet" type="text/css" href="<?php echo PATHFRONT . "/Styles/navmenubutton.css";?>">

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

        $staffManagement = getLanguage("staffManagement", $_COOKIE["language"]);
        $leaveManagement = getLanguage("leaveManagement ", $_COOKIE["language"]);
        $eventManagement = getLanguage("eventManagement ", $_COOKIE["language"]);
        $timetables = getLanguage("timetables ", $_COOKIE["language"]);
        $registerStaffMember = getLanguage("registerStaffMember ", $_COOKIE["language"]);
        $searchStaffMember = getLanguage("searchStaffMember ", $_COOKIE["language"]);
        $applyForLeave = getLanguage("applyForLeave ", $_COOKIE["language"]);
        $approveLeave = getLanguage("approveLeave ", $_COOKIE["language"]);
        $viewLeaveHistory = getLanguage("viewLeaveHistory ", $_COOKIE["language"]);
        $createTimetableByTeacher = getLanguage("createTimetableByTeacher ", $_COOKIE["language"]);
        $createTimetableByClass = getLanguage("createTimetableByClass ", $_COOKIE["language"]);

    ?>
    <body>

        <div id="main">
            <?php
                echo ($pageContent);
            ?>
        </div>


        <!-- DO NOT EDIT FOLLOWING -->
        <a id="menuButton" class="hidden" <!--onclick="menuClicked(this);"-->><span></span></a>


        <div id="nav">
<!--            <li id="Red"><a id="blue">Notices</a>-->
<!--                <ul>-->
<!--                    <li><a href="#">View Notices</a><hr /></li>-->
<!--                    <li><a href="#">Create Notice</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <li><a><?php echo $staffManagement; ?></a>
                <ul>
                    <li><a href="<?php echo PATHFRONT ?>/staffManagement/staffRegistration.php"><?php echo $registerStaffMember; ?></a><hr /></li>
                    <li><a href="<?php echo PATHFRONT ?>/staffManagement/blacklist.php">Manage Blacklist</a><hr /></li>
                    <li><a href="<?php echo PATHFRONT ?>/staffManagement/ClassInformation.php">Class Information</a><hr /></li>
                    <li><a href="<?php echo PATHFRONT ?>/staffManagement/searchStaffDetails.php"><?php echo $searchStaffMember; ?></a><hr /></li>
                    <!--                    <li><a href="/staffManagement/sports.php">Sports</a><hr /></li>-->
                    <li><a href="<?php echo PATHFRONT ?>/staffManagement/teacherAchievenment.php">Staff Achievements</a></li>
                </ul>
            </li>
            <li><a><?php echo $leaveManagement; ?></a>
                <ul>
                    <li><a href="<?php echo PATHFRONT ?>/leaveManagement/applyForLeave.php"><?php echo $applyForLeave; ?></a><hr /></li>
                    <li><a href="<?php echo PATHFRONT ?>/leaveManagement/approveLeave.php"><?php echo $approveLeave; ?></a><hr /></li>
                    <!--                    <li><a href="./leaveManagement/cancelLeave.php">--><?php //echo $viewLeaveHistory; ?><!--</a><hr /></li>-->
                    <li><a href="<?php echo PATHFRONT ?>/leaveManagement/previousLeaveHistory.php">Generate Leave Report</a></li>
                </ul>
            </li>
            <li><a  href="<?php echo PATHFRONT ?>/TimeTable/timetable.php"><?php echo $timetables; ?></a>
                <!--                <ul>-->
                <!--                    <li><a  href="#">Create Timetable by Teacher</a><hr /></li>-->
                <!--                    <li><a  href="#">Create Timetable by Class</a></li>-->
                <!--                </ul>-->
            </li>
            <li><a href="<?php echo PATHFRONT ?>/TimeTable/substitute.php">Substitute Teacher</a>
                <!--                <ul>-->
                <!--                    <li><a  href="#">Substitute Period by Teacher</a><hr /></li>-->
                <!--                    <li><a  href="#">Substitute Period by Class</a></li>-->
                <!--                </ul>-->
            </li>
            <li><a>Student Information</a>
                <ul>
                    <li><a  href="<?php echo PATHFRONT ?>/studentInformation/studentRegistration.php">Register Student</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/studentInformation/SearchStudent.php">Search Student</a></li>
                </ul>
            </li>
            <li><a href="<?php echo PATHFRONT ?>/eventManagement/eventList.php"><?php echo $eventManagement; ?></a>
<!--                <ul>-->
<!--                    <li><a  href="--><?php //echo PATHFRONT ?><!--/eventManagement/eventList.php">View Event List</a><hr /></li>-->
<!--                    <li><a  href="--><?php //echo PATHFRONT ?><!--/eventManagement/manageEvents.php">Manage Events</a></li>-->
<!--                </ul>-->
            </li>
            <li><a>Attendance</a>
                <ul>
                    <li><a  href="<?php echo PATHFRONT ?>/attendance/markAttendance.php">Mark Attendance</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/attendance/classwise.php">Class-wise Report</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/attendance/studentwise.php">Student-wise Report</a></li>
                </ul>
            </li>
            <li><a>Marks and Grading</a>
                <ul>
                    <li><a  href="<?php echo PATHFRONT ?>/marksAndGrading/OLinput.php">Enter O/L Results</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/marksAndGrading/ALinput.php">Enter A/L Results</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/marksAndGrading/termTestMarks.php">Enter Term Marks</a><hr /></li>
                    <li><a  href="<?php echo PATHFRONT ?>/marksAndGrading/searchMarks.php">Search Grading Information</a></li>
                </ul>
            </li>
            <li><a>Administrative Tasks</a>
                <ul>
                    <li><a href="<?php echo PATHFRONT ?>/administration/yearPlan.php">Manage Year Plan</a><hr /></li>
                    <li><a href="<?php echo PATHFRONT ?>/administration/manageUsers.php">Manage Users</a></li>
                </ul>
            </li>
        </div>

        <div id="header">
        </div>

        <div id="divMenu">
            <table id="topMenu">
                <tr>
                    <td><a href="<?php echo PATHFRONT ?>/template.php">Home</a></td>
<!--                    <td><a href="--><?php //echo PATHFRONT ?><!--/template.php">Your account</a></td>-->
                    <td><a href="<?php echo PATHFRONT ?>/template.php?logout=1">Log out</a></td>
                </tr>
            </table>
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
    </body>
</html>