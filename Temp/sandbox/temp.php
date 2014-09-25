<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 15/09/14
 * Time: 20:22
 */

    $navArray = array();

    $navArray[0] = "<li>\n";
    $navArray[4] = "<a> $staffManagement</a>\n";
    $navArray[1] = "<ul>\n";
    $navArray[5] = "<li><a href=\"" . PATHFRONT . "/staffManagement/staffRegistration.php\">" .  $registerStaffMember . "</a><hr /></li>\n";
    $navArray[6] = "<li><a href=\"" . PATHFRONT . "/staffManagement/blacklist.php\">" . "Manage Blacklist" . "</a><hr /></li>\n";
    $navArray[7] = "<li><a href=\"" . PATHFRONT . "/staffManagement/ClassroomInformation.php\">" . "Class Information" . "</a><hr /></li>\n";
    $navArray[8] = "<li><a href=\"" . PATHFRONT . "/staffManagement/searchStaffDetails.php\">" . $searchStaffMember . "</a><hr /></li>\n";
    $navArray[9] = "<li><a href=\"" . PATHFRONT . "/staffManagement/teacherAchievenment.php\">" . "Staff Achievements" . "</a><hr /></li>\n";
    $navArray[10] = "<li><a href=\"" . PATHFRONT . "/staffManagement/staffReport.php\" target=\"_blank\">" . "Staff Report" . "</a></li>\n";
    $navArray[2] = "</ul>\n";
    $navArray[3] = "</li>\n";
    //        $navArray[0] = "<li>\n";
    $navArray[11] = "<a>" . "$leaveManagement" . "</a>\n";
    //        $navArray[1];
    $navArray[12] = "<li><a href=\"" . PATHFRONT . "/leaveManagement/applyForLeave.php\">" . $applyForLeave . "</a><hr /></li>\n";
    $navArray[13] = "<li><a href=\"" . PATHFRONT . "/leaveManagement/approveLeave.php\">" . $approveLeave . "</a></li>\n";
                        /*$navArray[2] = "</ul>\n";*/
    //        $navArray[3] = "</li>\n";
    //        $navArray[0] = "<li>\n";
    $navArray[14] = "<a  href=\"" . PATHFRONT . "/TimeTable/timetable.php\">" . $timetables . "</a>\n";
    //        $navArray[3] = "</li>\n";
    $navArray[15] = "<li><a href=\"" . PATHFRONT . "/TimeTable/substitute.php\">" . "Substitute Teacher" . "</a>\n";
    //        $navArray[3] = "</li>\n";
    //        $navArray[0]
    $navArray[16] = "<a>Student Information</a>\n";
    //        $navArray[1] = "<ul>\n";
    $navArray[17] = "<li><a  href=\"" . PATHFRONT . "/studentInformation/studentRegistration.php\">" . "Register Student" . "</a><hr /></li>\n";
    $navArray[18] = "<li><a  href=\"" . PATHFRONT . "/studentInformation/SearchStudent.php\">" . "Search Student" . "</a></li>\n";
    //        $navArray[2] = "</ul>\n";
    //        $navArray[3] = "</li>\n";
    //        $navArray[0] = "<li>\n";
    $navArray[19] = "<a href=\"" . PATHFRONT . "/eventManagement/eventList.php\">" . $eventManagement . "</a>\n";
    //        $navArray[3] = "</li>\n";
    //        $navArray[0] = "<li>\n";
    $navArray[20] = "<a>Attendance</a>\n";
    //        $navArray[1] = "<ul>\n";
    $navArray[21] = "<li><a  href=\"" . PATHFRONT . "/attendance/markAttendance.php\">" . "Mark Attendance" . "</a><hr /></li>\n";
    $navArray[22] = "<li><a  href=\"" . PATHFRONT . "/attendance/classwise.php\">" . "Class-wise Report" . "</a><hr /></li>\n";
    $navArray[23] = "<li><a  href=\"" . PATHFRONT . "/attendance/studentwise.php\">" . "Student-wise Report" . "</a><hr /></li>\n";
    $navArray[24] = "<li><a  href=\"" . PATHFRONT . "/attendance/viewAttendance.php\">" . "View Attendance" . "</a></li>\n";
    //        $navArray[2] = "</ul>\n";
    //        $navArray[3] = "</li>\n";
    //        $navArray[0] = "<li>\n";
    $navArray[25] = "<a>Marks and Grading</a>\n";
    //        $navArray[1] = "<ul>\n";
    $navArray[26] = "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/OLinput.php\">" . "Enter O/L Results" . "</a><hr /></li>\n";
    $navArray[27] = "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/ALinput.php\">" . "Enter A/L Results" . "</a><hr /></li>\n";
    $navArray[28] = "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/termTestMarks.php\">" . "Enter Term Marks" . "</a><hr /></li>\n";
    $navArray[29] = "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/searchMarks.php\">" . "Search Grading Information" . "</a></li>\n";
    //        $navArray[2] = "</ul>\n";
    //        $navArray[3] = "</li>\n";
    $navArray[30] = "<li><a>Administrative Tasks</a>\n";
    //        $navArray[1] = "<ul>\n";
    $navArray[31] = "<li><a href=\"" . PATHFRONT . "/administration/yearPlan.php\">" . "Manage Year Plan" . "</a><hr /></li>\n";
    $navArray[32] = "<li><a href=\"" . PATHFRONT . "/administration/manageUsers.php\">" . "Manage Users" . "s</a></li>\n";
    //        $navArray[2] = "</ul>\n";
    //        $navArray[3] = "</li>\n";