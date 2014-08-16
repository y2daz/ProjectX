<?php
//Get language and make changes
/**
* Created by PhpStorm.
 * User: vimukthi
* Date: 6/8/14
*
 * THIS IS THE NEW TEMPLATE
*
 * ONLY EDIT WHERE MENTIONED
*
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

$fullPageHeight = 1200;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
<head>
    <style type=text/css>
        h1{
            text-align: center;
        }

        table {
            border-spacing:0px 5px;
        }

        .general {
            position:absolute;
            left:80px;
            top:80px;
        }

        th{
            align:center;
            color:white;
            background-color:#154DC1;
            height:25px;
            padding:5px;
        }

        td {
            padding:5px;
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
        .staffimage img
        {
            position:absolute;
            top:4px;
            left:4px;
            width:142px;
            height:150px;
        }

        input.button {
            position:relative;
            font-weight:bold;
            font-size:15px;
            left:150px;
            top:50px;


    </style>
</head>
<?php
    if($_COOKIE['language'] == 0)
    {
    $staffID="Staff ID";
	$achievement="Achievement";
	$starteddate="Started Date";
	$completeddate="Completed Date";
	$grade="Grade";
	$classname="Class Name";
}
	else
	{
        $staffID="ගුරුවරයාගේ නම";
		$achievement="කුසලතාවය";
		$starteddate="ආරම්භ කල දිනය";
		$completeddate="අවසන් කල දිනය";
		$grade="ශ්‍රේනිය";
		$classname="පන්තියේ නම";
	}
?>


<body>

		<form onsubmit="return validateEverything()" name="thisForm" method="post">
		<div class="main">

			<h1>Teacher Achievements Form</h1>
				<table class="general" cellspacing="0">	
				<!--<tr><th>Teacher Achievements</th><th></th></tr>-->
                    <tr>
                        <td><?php echo $staffID?></td>
                        <td><input name="staffID" type="text" value=""></td>
                    </tr>

				<tr class="alt">
					<td><?php echo $achievement?></td>
					<td><input name="achievement" size="55" width="50" value=""></td>
						 
					
				</tr>

                    <tr>
                        <td><?php echo $starteddate?></td>
                        <td><input name="starteddate" type="date" value=""></td>
                    </tr>

                    <tr>
                        <td><?php echo $completeddate?></td>
                        <td><input name="$completeddate" type="date" value=""></td>
                    </tr>

				<tr class="alt">
					<td><?php echo $grade?></td>
					<td><select name="grade" value="">
						<option value="1">1</option>
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
		<td><input class="button" type="submit" value="Submit"></td>
				</tr>			
			
			</table>		

		</form>

			
	
	</div>	
	
</body>

</html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>