<?php
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

?>
<html>
<head>
    <style type=text/css>
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
            background-color: #005e77;
            height:25px;
            padding:5px;
        }

        td {
            padding:5px;
        }
        input.button {
            position:relative;
            font-weight:bold;
            font-size:20px;
            right:450px;
            top:50px;


    </style>
</head>
<?php
     //Get language and make changes

    if($_COOKIE['language'] == 0)
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

		<form name="thisForm" method="post">

			<h1>Classroom Information</h1>
			<table class="general" cellspacing="0">	
				<tr><th>Classroom Information</th><th></th></tr>		
				<tr>
					<td><?php echo $teachersname?></td>
					<td><input type="text" name="staffId" value="" /></td>
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
                    <td><input type="text" name="className" value="" /></td>
				</tr>
				<tr class="alt">
					<td><?php echo $location?></td>
                    <td><input type="location" value=""></td>
						 
					<td><input class="button" type="submit" value="Submit"></td>
				</tr>			
			
			</table>		

		</form>
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