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
    $fullPageHeight = 900;

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

        <div id="main" style="padding-left: 20px;">

            <h1>Manage Event</h1>

            <h3>Event Manager List</h3>
            <div class="table" id="table">
                <table border="1">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Contact No</th>
                        <th scope="col"></th>
                    </tr>
                    <tr>
                        <td>Chathuranga Liyanage</td>
                        <td>0777123456</td>
                        <td>
                            <input type="button" name="delete" id="button1" value="Delete" />
                        </td>
                    </tr>
                    <tr>
                        <td>Madusha Mendis</td>
                        <td>0712345678</td>
                        <td>
                            <input type="button" name="button" id="button2" value="Delete" />
                        </td>
                    </tr>
                    <tr>
                        <td>Dulip Rathnayake</td>
                        <td>0112789456</td>
                        <td>
                            <input type="button" name="button" id="button3" value="Delete" />
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>
                            <input type="button" name="button" id="button4" value="Add New Manager" /></center>
                        </td>
                    </tr>

                </table>
            </div>

            <div class="table" id="table" style="position:relative; top:40px; width:1600px;height:auto">
                <h3>Transaction Log</h3>
                <table width="500" border="1">
                    <tr>
                        <th scope="col" >ID</th>
                        <th scope="col" >Date</th>
                        <th scope="col" >Type</th>
                        <th scope="col" >Amount</th>
                        <th scope="col" >Description</th>

                    </tr>
                    <tr>
                        <td>e1t1</td>
                        <td>22/7/2014</td>
                        <td>Income</td>
                        <td>12,000</td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr style="width:100px;height:30px">
                        <td>e1t2</td>
                        <td>24/7/2014</td>
                        <td>Income</td>
                        <td>11,000</td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr style="width:100px;height:30px">
                        <td>e1t3</td>
                        <td>24/7/2014</td>
                        <td>Income</td>
                        <td>45</td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr style="width:100px;height:30px">
                        <td>e1t4</td>
                        <td>27/7/2014</td>
                        <td>Expenditure</td>
                        <td>4000</td>
                        <td>&nbsp;</td>

                    </tr>
                    <tr style="width:150px;height:30px" >
                        <td><center>
                                <input type="submit" name="button" id="button" value="Add Transaction" />
                            </center>
                        </td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>

                    </tr>

                </table>
            </div>

            <div class="table1" id="table1" style="position:relative; top:120px; 300px;height:auto;">
                <p>Total Recieved : 23045</p>
            </div>
            <div class="table1" id="table1" style="position:relative; top:120px;width:300px;height:auto;">
                <p>Total Spent : 4000</p>
            </div>

            <div>
                <input type="button" name="button" id="button8" value="Print Transaction Report" style="position:relative; top:150px; left: 0px"/>
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