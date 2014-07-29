<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
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

            table, th, td {
                border: 0px solid black;

            }
            th{
                width: 1300px;
                text-align: center;
            }

            td {
                width: 150px;
                text-align: center;
            }

            tr{
                height: 10px;
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
                width: 250px;
                top: 260px;
                left: 0px;
                border-top: 0px solid;
                border-top-color: #f0f0f0;
                border-left: 0px solid;
                border-left-color: #f0f0f0;
                border-bottom: 0px solid;
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
                width:790px;
                height:<?php echo "640px"; ?>; /*We will change the height depending on what we need*/
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
                position:absolute;
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
            .staffimage{
                position:absolute;
                height:160px;
                width:150px;
                top:130px;
                left:560px;
                background-color:#154DC1;
                z-index:0;
            }


            input.button {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:50px;
                top:20px;
            }
            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:100px;
                top:20px;
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
        $Notices = "Notices";
        $staffManagement = "Staff Management";
        $leaveManagement = "Leave Management";
        $timetables = "Timetables";
        $eventManagement = "Event Management";
        $attendance = "Attendance";
        $Marks="Marks And Grading Management";
        $Admin="Administrative Tasks";

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
            <h1>D.S.Senanayake College Colombo 07</h1>

            <h2>G.C.E O/L Results Sheet</h2>
            <tr>
                <td>Index Number</td>
                <td><input type="text" value=""></td>
                <td>Name</td>
                <td><input type="text" value="" </td>
                <td>Year</td>
                <td><input type=text" value=""</td>
            </tr>
            <h2></h2>

            <table   border="1px solid black" >


                <tr>
                    <th>Subject</th>
                    <th>Grade</th>
                    <th>Medium</th>

                </tr>
                <tr>
                <td><input type="text" value="">
                <td><select type="text" value="">

                        <option>--</option>
                        <option>A</option>
                        <option>B</option>
                        <option>C</option>
                        <option>S</option>
                        <option>F</option>
                <td><select type="text" value="">

                                <option>--</option>
                                <option>S</option>
                                <option>E</option>
                                <option>T</option>
                       </select>
                            </tr>
                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>

                <tr>
                    <td><input type="text" value="">
                    <td><select type="text" value="">

                            <option>--</option>
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                            <option>S</option>
                            <option>F</option>
                            <td><select type="text" value="">

                                    <option>--</option>
                                    <option>S</option>
                                    <option>E</option>
                                    <option>T</option>
                                </select>
                </tr>













            </table>

            <tr>
                <td></td>

                <td><input class="button" type="submit" value="Submit"></td>




                <td><input class="button1" type="reset" value="Reset"></td>








            </tr>





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
            <li><a><?php echo $Notices; ?></a>
                <ul>
                    <li><a href="#"><?php echo $registerStaffMember; ?></a><hr /></li>
                    <li><a href="#"><?php echo $searchStaffMember; ?></a></li>
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

            <li><a><?php echo $attendance; ?></a>
                <ul>
                    <li><a  href="#">View Event List</a><hr /></li>
                    <li><a  href="#">Manage Events</a></li>
                </ul>
            </li>
            <li><a><?php echo $Marks; ?></a>
                <ul>
                    <li><a  href="#">Insert Term Test Marks</a><hr /></li>
                    <li><a  href="#">Insert G.C.E. O/L Results</a><hr/></li>
                    <li><a  href="#">Insert G.C.E. A/L Results</a><hr/></li>
                    <li><a  href="#">Search Results</a></li>
                </ul>
            </li>
            <li><a><?php echo $Admin; ?></a>
                <ul>
                    <li><a  href="#">View Event List</a><hr /></li>
                    <li><a  href="#">Manage Events</a></li>
                </ul>
            </li>
        </div>





    </body>
</html>