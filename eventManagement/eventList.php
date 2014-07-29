<?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
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

    /*CHANGE THIS ACCORDING TO WHAT HEIGHT YOU WANT*/
    $fullPageHeight = 700;

    $footerTop = $fullPageHeight + 50;
?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <script src="../jquery-1.11.1.min.js"></script>

        <!--Static Resource -->
        <link rel="stylesheet" type="text/css" href="../Styles/main.css">

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

            <div class="table" id="table" style="width:50%;height:auto; text-align: center">

                <h1>Event List</h1>
                <table width="600" border="1">
                    <tr>
                        <th scope="col" style="width:400px;height:30px">Event Name</th>
                        <th scope="col" style="width:400px;height:30px">Date</th>
                        <th scope="col" style="width:800px;height:30px">Description</th>
                        <th></th>
                        <!--<span class="table" style="width:570px;height:auto">-->
                    </tr>
                    <tr style="width:400px;height:30px">
                        <td><p>Prize Giving </p></td>
                        <td>07/07/2015</td>
                        <td>Prize giving ceremony for primary grades</td>
                        <td><span class="table" style="width:570px;height:auto">
              	<input type="button" name="manage1" id="manage1" value="Manage" />
            	</span>
                        </td>
                    </tr>
                    <tr style="width:400px;height:30px">
                        <td>Sports Meet</td>
                        <td>07/09/2014</td>
                        <td>Inter house secondary grades sports meet</td>
                        <td><span class="table" style="width:570px;height:auto">
              	<center><input type="button" name="manage2" id="manage2" value="Manage" /></center>
            	</span>
                        </td>
                    </tr>
                    <tr style="width:150px;height:30px">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td><span class="table" style="width:570px;height:auto">
                <center><input type="submit" name="button" id="button" value="Add New Event" /></center>
        	</span>
                        </td>
                    </tr>
                    <!--<tr style="width:150px;height:30px">-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td><span class="table" style="width:570px;height:auto">-->
                    <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                    <!--</span>-->
                    <!--</td>-->
                    <!--</tr>-->
                    <!--<tr style="width:150px;height:30px">-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td><span class="table" style="width:570px;height:auto">-->
                    <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                    <!--</span>-->
                    <!--</td>-->
                    <!--</tr>-->
                    <!--<tr style="width:150px;height:30px">-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td>&nbsp;</td>-->
                    <!--<td><span class="table" style="width:570px;height:auto">-->
                    <!--<center><input type="submit" name="button" id="button" value="Manage" /></center>-->
                    <!--</span>-->
                    <!--</td>-->
                    <!--</tr>-->
                </table>

        </div>

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
            <li><a>Notices</a>
                <ul>
                    <li><a href="#">View Notices</a><hr /></li>
                    <li><a href="#">Create Notice</a></li>
                </ul>
            </li>
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
                    <li><a href="#"><?php echo $viewLeaveHistory; ?></a><hr /></li>
                    <li><a href="#">Generate Leave Report</a></li>
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
                    <li><a  href="attendance/markAttendance.php">Mark Attendance</a><hr /></li>
                    <li><a  href="attendance/ViewAttendance.php">View Attendance</a></li>
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
                    <li><a  href="#">Manage Year Plan</a></li>
                </ul>
            </li>
        </div>










    </body>
</html>