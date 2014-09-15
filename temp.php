<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 15/09/14
 * Time: 20:22
 */

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
        $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/manageUsers.php\">" . "Manage Users" . "s</a></li>\n";
        $navMenu .= "</ul>\n";
        $navMenu .= "</li>\n";