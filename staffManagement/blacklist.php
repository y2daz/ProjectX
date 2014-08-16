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
            background-color:#005e77;
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
            right:650px;
            top:50px;
        }
    </style>
</head>
<?php
    if($_COOKIE['language'] == 0)
    {

            $staffId="StaffID";
            $reason="Reason";
            $date="Date";
            $other="Other";
    }
    else
    {
        $staffId="ගුරුවරයාගේ නම";
        $reason="කාරණය";
        $date="දීනය";
        $other="වෙනත්";
    }
?>

<body>
    <h1>Black ListForm</h1>
	<form onsubmit="return validateEverything()" name="thisForm" method="post">
			<table class="general" cellspacing="0">	
				
				<tr><th>Black list</th><th></th></tr>		
				<tr>
					<td><?php echo $staffId?></td>
					<td><input type="text" name="StaffID" value="" /></td>
				<tr>
					<td><?php echo $reason?></td>
					<td><textarea name="reason" size="60" value="" ></textarea></td>
				</tr>
				<tr>
					<td><?php echo $date?></td>
					<td><input name="date" value=""></td>
				</tr>
				<tr>
					<td><?php echo $other?></td>
					<td><input name="other" size="60" value=""></td>
				</tr>
                <tr>
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