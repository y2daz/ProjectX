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

$fullPageHeight = 1200;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


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
            font-size:20px;
            right:650px;
            top:50px;


    </style>
</head>
<?php



    if($_COOKIE['language'] == 0)
    {

            $teachersname="Teacher's Name";
            $reason="Reason";
            $date="Date";
            $other="Other";
    }
    else
        {
            $teachersname="ගුරුවරයාගේ නම";
            $reason="කාරණය";
            $date="දීනය";
            $other="වෙනත්";
        }
        ?>



        <body>
	<div class="main">

			<h1>Black ListForm</h1>
	<form onsubmit="return validateEverything()" name="thisForm" method="post">
			<table class="general" cellspacing="0">	
				
				<tr><th>Black list</th><th></th></tr>		
				<tr>
					<td><?php echo $teachersname?></td>
					<td><select name="teachersname" value="">
						<option>Mr.kumara</option>
						<option>MR.Saman</option>
						<option>Mrs.kumari</option>	
						<option></option>
					</select></td>

				
				<tr class="alt">
					<td><?php echo $reason?></td>
					<td><input name="reason" size="60" value=""></td>
						 
					
				</tr>


				<tr class="alt">
					<td><?php echo $date?></td>
					<td><input name="date" value=""></td>
						 
					
				</tr>

				<tr class="alt">
					<td><?php echo $other?></td>
					<td><input name="other" size="60" value=""></td>
						 
					
				</tr>

				<td><input class="button" type="submit" value="Submit"></td>

			
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