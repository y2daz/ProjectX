<?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
 */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    require_once("dbAccess.php");
    require_once("common.php");

    define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

    $privilege = -1;

    if(!isFilled($_COOKIE['language']))
    {
        setcookie('language', '0'); //where 0 is English and 1 is Sinhala
    }

    if(!isset($_SESSION["user"])){
        header("Location: " . PATHFRONT . "/login.php");
    }
    else{
        $privilege = checkPrivilege($_SESSION["user"]);
    }

    if(isset($_GET["logout"]))
    {
        $_SESSION["user"] = NULL;
        header("Location: " . PATHFRONT . "/login.php");
    }



?>
<!DOCTYPE html>
<html>

    <head>
        <title><?php echo $pageTitle ?> </title>

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<!--        <link href='fonts/fonts.css' rel='stylesheet' type='text/css'>-->
        <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

        <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
        <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
        <script src="<?php echo PATHFRONT ?>/common.js"></script>

        <!--Static Resource -->
        <link rel="stylesheet" type="text/css" href="<?php echo PATHFRONT . "/Styles/main.css";?>">
        <link rel="stylesheet" type="text/css" href="<?php echo PATHFRONT . "/Styles/navmenubutton.css";?>">

        <!--impromptu Links-->
        <link rel="stylesheet" type="text/css" href="<?php echo PATHFRONT . "/scripts/jquery-impromptu.min.css";?>">
        <script src="<?php echo PATHFRONT ?>/scripts/jquery-impromptu.min.js"></script>


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
        <a id="menuButton" class="hidden" <span></span></a>


        <span id="messagingSystem"></span>

        <div id="nav">

            <?php

            if($privilege == 2){ // Change to 1 later.
                $navMenu = "<li><a> $staffManagement</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/staffRegistration.php\">" .  $registerStaffMember . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/ClassroomInformation.php\">" . "Class Information" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/searchStaffDetails.php\">" . $searchStaffMember . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/staffReport.php\" target=\"_blank\">" . "Staff Report" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>" . "$leaveManagement" . "</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/applyForLeave.php\">" . $applyForLeave . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/approveLeave.php\">" . $approveLeave . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/TimeTable/timetable.php\">" . $timetables . "</a>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/TimeTable/substitute.php\">" . "Substitute Teacher" . "</a>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>Administrative Tasks</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/yearPlan.php\">" . "Manage Year Plan" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/manageUsers.php\">" . "Manage Users" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            else{
                $navMenu = "<li><a> $staffManagement</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/staffRegistration.php\">" .  $registerStaffMember . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/blacklist.php\">" . "Manage Blacklist" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/ClassroomInformation.php\">" . "Class Information" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/searchStaffDetails.php\">" . $searchStaffMember . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/teacherAchievenment.php\">" . "Staff Achievements" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/staffReport.php\" target=\"_blank\">" . "Staff Report" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>" . "$leaveManagement" . "</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/applyForLeave.php\">" . $applyForLeave . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/approveLeave.php\">" . $approveLeave . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/TimeTable/timetable.php\">" . $timetables . "</a>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/TimeTable/substitute.php\">" . "Substitute Teacher" . "</a>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>Student Information</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/studentInformation/studentRegistration.php\">" . "Register Student" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/studentInformation/SearchStudent.php\">" . "Search Student" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/eventManagement/eventList.php\">" . $eventManagement . "</a>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>Attendance</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/markAttendance.php\">" . "Mark Attendance" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/classwise.php\">" . "Class-wise Report" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/studentwise.php\">" . "Student-wise Report" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/viewAttendance.php\">" . "View Attendance" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>Marks and Grading</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/OLinput.php\">" . "Enter O/L Results" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/ALinput.php\">" . "Enter A/L Results" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/termTestMarks.php\">" . "Enter Term Marks" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/searchMarks.php\">" . "Search Grading Information" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
                $navMenu .= "<li><a>Administrative Tasks</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/yearPlan.php\">" . "Manage Year Plan" . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/manageUsers.php\">" . "Manage Users" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }

            echo $navMenu;


            ?>

        </div>

        <div id="header">
            <img id="dsLogo" src="<?php echo PATHFRONT ?>/images/logo.jpg" height="90px" />
        </div>

        <div id="divMenu">
            <table id="topMenu">
                <tr>
                    <td><a href="<?php echo PATHFRONT ?>/Menu.php">Home</a></td>
                    <td><a href="<?php echo PATHFRONT ?>/Menu.php?logout=1">Log out</a></td>
<!--                    <td></td>-->
                </tr>
            </table>
        </div>

        <div id="footer">
<!--            <div id="aboutus">-->
<!--                <p> ABOUT US</p>-->
<!--                <span>We're pretty amazing.</span>-->
<!--            </div>-->
        </div>

        <div id="language">
            <ul><a href="#" onClick="setCookie('language','1')">සිංහල</a> | <a href="#" onClick="setCookie('language','0')">English</a></ul>
        </div>

<!--        <div id="dsLogo">-->
<!--        </div>-->
    </body>
</html>