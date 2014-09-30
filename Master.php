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

    $logSuccess = true;

    if(isset($_POST["username"])) {
        $operation = login($_POST["username"],$_POST["password"]);
        $logSuccess = ($operation == 0 ? false : true );
    }

    if(!isset($_COOKIE['language']))
    {
        setcookie('language', '0'); //where 0 is English and 1 is Sinhala
    }

    if(!isset($_SESSION["user"])){
        $logging = "Log In";
        if( strcmp( $_SERVER['PHP_SELF'], "/Menu.php") !== 0){
            header("Location: " . PATHFRONT . "/Menu.php");
        }
    }
    else{
        $logging = "Log Out";
    }

    if(isset($_GET["logout"]))
    {
        $_SESSION["user"] = NULL;
        header("Location: " . PATHFRONT . "/Menu.php");
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
<!--        <script src="--><?php //echo PATHFRONT ?><!--/scripts/jquery-ui.min.js"></script>-->

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
            <?php echo ( (isset($_SESSION["user"]))? "": "\n#nav{ display:none;}\n" ) ?>
            /*Static Styles*/
            /*INSERT ALL YOUR CSS HERE*/

            #whoami{
                position: fixed;
                top: 5px;
                left: 5px;
                display: block;
                padding: 5px 10px 5px 10px;
                background-color: #efefef;
                border: 2px solid #003448;
                /*width: 220px;*/
                /*height: 30px;*/
                z-index: 40;
                color: #003f5d;
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

                $("#logInLink").on("click", function(e){
                    logIn();
                });

                $("#staffReport").on("click", function(e){
                    e.preventDefault();

                    var noOfStaff = parseFloat(<?php echo getNoOfStaff();?>);
                    var noOfPages = (noOfStaff / 20.0);

//                    Math.ceil(noOfPages);
                    var i;
                    var linkList = "<p>Producing Staff Report</p>";
                    for(i = 0; i < Math.ceil(noOfPages); i++){
                        linkList += "<ul><a href='<?php echo PATHFRONT?>" + "/staffManagement/staffReport.php?start=" + (i*20) + "' target='_blank'>Page " + (i+1) + "</ul>";
                    }

                    sendMessage(linkList);
                    var i;

                    console.log("noOfPages = " + noOfPages);
<!---->
<!--                    window.open("--><?php //echo PATHFRONT?><!--" + "/staffManagement/staffReport.php?start=" + 20, '_blank');-->
<!--                    window.open("--><?php //echo PATHFRONT?><!--" + "/staffManagement/staffReport.php?start=" + 0, '_blank');-->
                });

            });


        </script>
    </head>
    <?php //Get language and make changes

        $staffManagement = getLanguage("staffManagement", $_COOKIE["language"]);
        $leaveManagement = getLanguage("leaveManagement ", $_COOKIE["language"]);
        $eventManagement = getLanguage("eventManagement ", $_COOKIE["language"]);
        $timetables = getLanguage("timetables ", $_COOKIE["language"]);
        $staffTimetable = getLanguage("staffTimetable", $_COOKIE["language"]);

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
                if($logSuccess == false){
                    sendNotification("Invalid username or password");
                }

                echo ($pageContent);
            ?>
        </div>


        <!-- DO NOT EDIT FOLLOWING -->
        <a id="menuButton" class="hidden"><span></span></a>


        <span id="messagingSystem"></span>

        <div id="nav">

            <?php
            $user = Role::getRolePerms( $_SESSION["accessLevel"] );
            $navMenu = "";
            if ($user->hasPerm('Staff Details System')){
                $navMenu = "<li><a> $staffManagement</a>\n";
                $navMenu .= "<ul>\n";
                if ($user->hasPerm('Change Staff Details')){
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/staffRegistration.php\">" .  $registerStaffMember . "</a><hr /></li>\n";
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/ClassroomInformation.php\">" . "Class-teacher Allocation" . "</a><hr /></li>\n";
                }
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/searchStaffDetails.php\">" . $searchStaffMember . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/staffManagement/classReport.php\" target=\"_blank\">" . "Class Report" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Leave Management System')){
                $navMenu .= "<li><a>" . "$leaveManagement" . "</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/applyForLeave.php\">" . $applyForLeave . "</a><hr /></li>\n";
                if ($user->hasPerm('Leave Approval')){
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/approveLeave.php\">" . $approveLeave . "</a><hr /></li>\n";
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/generateLeaveReport.php\">" . "Generate Leave Report " . "</a><hr /></li>\n";
                }
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/leaveManagement/checkStatus.php\">" . "Check Leave Status" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Timetables System')){
                $navMenu .= "<li><a>" . $timetables . "</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/TimeTable/timetable.php\">" . $staffTimetable . "</a><hr /></li>\n";
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/TimeTable/substitute.php\">" . "Substitute Teacher" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/TimeTable/timetableClasswise.php\">" . "Class Timetable" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Student Information System')){
                $navMenu .= "<li><a>Student Information</a>\n";
                $navMenu .= "<ul>\n";
                if ($user->hasPerm('Student Registration')){
                    $navMenu .= "<li><a  href=\"" . PATHFRONT . "/studentInformation/studentRegistration.php\">" . "Register Student" . "</a><hr /></li>\n";
                }
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/studentInformation/SearchStudent.php\">" . "Search Student" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Event Management System')){
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/eventManagement/eventList.php\">" . $eventManagement . "</a>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Attendance System')){
                $navMenu .= "<li><a>Attendance</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/markAttendance.php\">" . "Mark Attendance" . "</a><hr /></li>\n";
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/classwise.php\">" . "Class-wise Report" . "</a></li>\n";
//                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/studentwise.php\">" . "Student-wise Report" . "</a><hr /></li>\n";
//                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/attendance/viewAttendance.php\">" . "View Attendance" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Marks and Grading System')){
                $navMenu .= "<li><a>Marks and Grading</a>\n";
                $navMenu .= "<ul>\n";
                if ($user->hasPerm('Enter O/A Level Examination Grades')){
                    $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/OLinput.php\">" . "Enter O/L Results" . "</a><hr /></li>\n";
                    $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/ALinput.php\">" . "Enter A/L Results" . "</a><hr /></li>\n";
                }
                if ($user->hasPerm('Enter Term Test Marks')){
                    $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/termTestMarks.php\">" . "Enter Term Marks" . "</a><hr /></li>\n";
                }
                $navMenu .= "<li><a  href=\"" . PATHFRONT . "/marksAndGrading/searchMarks.php\">" . "Search Grading Information" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Administration Panel')){
                $navMenu .= "<li><a>Administrative Tasks</a>\n";
                $navMenu .= "<ul>\n";
                if ($user->hasPerm('Manage Users')){
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/manageUsers.php\">" . "Manage Users" . "</a><hr /></li>\n";
                    $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/accessLevels.php\">" . "Manage User Permissions" . "</a><hr /></li>\n";
                }
                $navMenu .= "<li><a href=\"" . PATHFRONT . "/administration/yearPlan.php\">" . "Year Plan" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            if ($user->hasPerm('Staff Report')){
                $navMenu .= "<li><a>Reports</a>\n";
                $navMenu .= "<ul>\n";
                $navMenu .= "<li><a id='staffReport' href=\"" . PATHFRONT . "/staffManagement/staffReport.php?start=0\" target=\"_blank\">" . "Staff Report" . "</a></li>\n";
                $navMenu .= "</ul>\n";
                $navMenu .= "</li>\n";
            }
            /*}*/

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
                    <td><a href=<?php echo (isset($_SESSION["user"]) ? "\"" . PATHFRONT . "/Menu.php?logout=1\"" : "\"#\" id=\"logInLink\"" );?>><?php echo $logging ?></a></td>
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


            <?php

            $userArray = array( "IT13001308" => "Alimudeen M.Y.", "IT13006426" => "Mendis B.T.M.", "IT13008338" => "Peiries M.S.E.",
                "IT13013424" => "Liyanage M.C.", "IT13031312" => "Joseph V.S.", "IT13014650" => "Rathnayake R.M.D.A.",
                "IT13028206" => "Jayakody J.A.I.", "IT13024000" => "De Silva G.L.N.A.M.");


            if (array_key_exists( $_SESSION["user"] , $userArray)){
                echo "<div id='whoami'>";
                echo $_SESSION["user"] . " " . $userArray[$_SESSION["user"]];
                echo "</div>";
            }
            ?>
    </body>
</html>