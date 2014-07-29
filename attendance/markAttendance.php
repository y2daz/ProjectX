<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
    session_start();

    /*CHANGE THIS ACCORDING TO WHAT HEIGHT YOU WANT*/
    $fullPageHeight = 1400;

    $footerTop = $fullPageHeight + 50;

?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
    <script src="../jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../Styles/main.css">

    <style type=text/css>

        #main{ height:<?php echo "$fullPageHeight" . "px";?> }
        #footer{ top:<?php echo "$footerTop" . "px";?> }


        h1{
            text-align: center;
        }
        #classDate{
            position:relative;
            left:30px;

        }
        #attendance{
            position: relative;
            top:0px;
            left:30px;
        }
        #attendance th{
            font-weight: 600;
        }
        #attendance tr.alt{
            background-color: #bed9ff;;
        }
        #attendance td.disabled{
            background-color: #ececec;
        }
	
        input.button {
            position:relative;
            font-weight:bold;
            font-size:15px;
            Right: -450px;
            top: 1150px;
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
<body>

<?php
    $class = "10A";
?>

<div id="main">
    <h1>Keep Attendance</h1>
    <table id="classDate">
        <tr>
            <td>
                Grade
            </td>
            <td>
                <?php echo $class; ?>
            </td>
        </tr>
        <tr>
            <td>
                <br/>
            </td>
        </tr>
        <tr>
            <td>
                Week
            </td>
            <td>
                <input name="week" type="date"/>
            </td>
        </tr>
	        <tr>
                <td></td>

                <td><input class="button" type="button" value="Save"></td>


            </tr>
    </table>

    <table id="attendance">
        <tr>
            <th>Admission No</th><th>Name</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th>
        </tr>

        <?php
        $i = 0;
        $noOfStudents = 40;

        for ($i = 0; $i < $noOfStudents; $i++)
        {
            $admissionNo = $i + 1;
            $studentName = "Long Student Name " . $admissionNo;

            if ($i % 2 == 1)
            {
                echo "<tr class=\"alt\"><td>$admissionNo</td> <td>$studentName</td>";
            }
            else{
                echo "<tr><td>$admissionNo</td> <td>$studentName</td>";
            }

            for($x = 0; $x < 5; $x++)
            {
                if ($x == 3) //Insert holiday logic
                {
                    $cBox = "<td class=\"disabled\"></td>";
                }
                else
                {
                    $cBox = "<td><input type=\"checkbox\" name=\"box" . $i . $x . "\" checked /></td>";
                }

                echo $cBox;
            }

            echo "</tr>";

        }
        ?>

    </table>
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
    <ul><a href="/PHP/KeepAttendance.php?lang=1">?????</a> | <a href="/PHP/KeepAttendance.php?lang=0">English</a></ul>
</div>

<div id="nav">
        <li><a>Notices</a>
                <ul>
                    
                </ul>
    <li><a>Staff Management</a>
        <ul>
            <li><a href="#">Register Staff Member</a><hr /></li>
            <li><a href="#">Search Staff Member</a></li>
        </ul>
    </li>
    <li><a>Leave Management</a>
        <ul>
            <li><a href="#">Apply for Leave</a><hr /></li>
            <li><a href="#">Approve Leave</a><hr /></li>
            <li><a href="#">View Leave History</a></li>
        </ul>
    </li>
    <li><a>Timetables</a>
        <ul>
            <li><a  href="#">Create Timetable by Teacher</a><hr /></li>
            <li><a  href="#">Create Timetable by Class</a><hr /></li>
            <li><a  href="#">Substitute Period by Teacher</a><hr /></li>
            <li><a  href="#">Substitute Period by Class</a></li>
        </ul>
    </li>
       <li><a>Substitute Teacher</a>
                <ul>
               </ul>
    <li><a>Event Management</a>
        <ul>
            <li><a  href="#">View Event List</a><hr /></li>
            <li><a  href="#">Manage Events</a></li>
        </ul>
    </li>
    <li><a>Attendance</a>
        <ul>
            <li><a  href="#">Year plan </a><hr /></li>
            <li><a  href="#">Keep Attendance</a><hr /></li>
            <li><a  href="#">View Attendance</a><hr /></li>
            <li><a  href="#">Reports</a></li>
        </ul>
    </li>
	   <li><a>Marks and Grading</a>
                <ul>
                   
                </ul>

            </li>
	      <li><a>Administrative Task</a>
                <ul>
                   
                </ul>

            </li>
</div>





</body>
</html>