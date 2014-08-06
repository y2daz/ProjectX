﻿<?php session_start();

    $_SESSION['language']=0;

    if(isset($_GET['lang']))
    {
        $_SESSION['language']=$_GET['lang'];
    }
    else
    {
        $_SESSION['language']=0; //where 0 is English and 1 is Sinhala
    }

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
            #main{
                height:<?php echo "$fullPageHeight" . "px";?>
            }
            #footer{
                top:<?php echo "$footerTop" . "px";?>
            }

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
                    <li><a  href="#">Mark Attendance</a><hr /></li>
                    <li><a  href="#">View Attendance</a></li>
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



<html>
<head>
<style>

body {
	background-color:black;


}

* {
	font-family:calibri;
}

h1 {

	text-align:center;
}

.main {
	position:absolute;
	background-color:white;
	height:300px;
	width:800px;
	left:273px;
	top:85px;
	border-radius:20px;
	padding:10px;

}

table {
		border-spacing:0px 5px;
}
th{
	align:center;
	color:white;
	background-color:#154DC1;
	height:30px;
	padding:5px;
}

td {	
	padding:5px;
}



input.button {
	position:relative;
	font-weight:bold;
	font-size:20px;
	right:90px;
	top:40px;
}

</style>

<title>Vimukthi System - Staff Registration2</title>


</head>

<?php //Get language and make changes

    if($_SESSION['language'] == 0)
    {
	$teachersname="Teacher's Name";
	$grade="Grade";
	$classname="Class Name";
	$location="Location";
    }
else
    {
 	$teachersname="ගුරුවරයාගේ නම";
	$grade="ශ්‍රේනිය";
	$classname="පන්තියේ නම";
	$location="පිහිටි ස්ථානය";
    }
?>	

<body>



			
	<div class="main">
		<form onsubmit="return validateEverything()" name="thisForm" method="post">
			<div class="staffimage">
			
			</div>
			<h1>Classroom Information</h1>
			<table class="general" cellspacing="0">	
				<tr><th>Classroom Information</th><th></th></tr>		
				<tr>
					<td><?php echo $teachersname?></td>
					<td><select name="teachersname" value="">
						<option>Mr.kumara</option>
						<option>MR.Saman</option>
						<option>Mrs.kumari</option>	
						<option></option>
					</select></td>

				
				</tr>
				<tr class="alt">
					<td><?php echo $grade?></td>
					<td><select name="grade" value="">
						option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>

						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						</select></td>
				</tr>
				<tr class="alt">
					<td><?php echo $classname?></td>
					<td><select name="classname" value="">	
						<option value="1">A</option>
						<option value="2">B</option>
						<option value="3">C</option>
						<option value="4">D</option>
						<option value="5">E</option>
						<option value="6">F</option>
						<option value="7">G</option>

						<option value="8">H</option>
						<option value="9">I</option>
						<option value="10">J</option>
						
						<option value="15">ARTS</option>
						<option value="16">COMMERCE</option>
						<option value="17">SCIENCE</option>
						<option value="18">MATHS</option>
						<option value="19">TECHNOLOGY</option>
						</select></td>
				
				</tr>
				<tr class="alt">
					<td><?php echo $location?></td>
					<td><input type="location" value=""></td>
						 
					<td><input class="button" type="submit" value="Submit"></td>
				</tr>			
			
			</table>		

		</form>

			
	
	</div>
	
</body>

</html>