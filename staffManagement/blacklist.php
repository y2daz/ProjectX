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

if (isset($_POST["blacklist"])) //User has clicked the submit button to add a user
{
    $operation = insertblacklist($_POST["staffID"], $_POST["listcontributor"], $_POST["enterdate"], $_POST["reason"]);
    echo $operation;
}
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
            font-size:15px;
            left:150px;
            top:80px;
        }
    </style>
</head>
<?php
    if($_COOKIE['language'] == 0)
    {

            $staffId="StaffID";
            $reason="Reason";
            $enterdate="Date";
            $listcontributor="List Contributor";
    }
    else
    {
        $staffId="ගුරුවරයාගේ නම";
        $reason="කාරණය";
        $enterdate="දීනය";
        $listcontributor="වෙනත්";
    }
?>

<body>
    <h1>Black List Form</h1>
	<form onsubmit="return validateEverything()" name="thisForm" method="post">
			<table class="general" cellspacing="0">
				
				<tr><th>Black list</th><th></th></tr>		
				<tr>
					<td><?php echo $staffId?></td>
					<td><input type="text" name="StaffID" value="" required="true"/></td>
                <tr>
                    <td><?php echo $listcontributor?></td>
                    <td><input type="text" name="List Contributor" value="" required="true"></td>
                </tr>

				<tr>
					<td><?php echo $enterdate?></td>
					<td><input type="date" type="date" value="" required="true"></td>
				</tr>

                <tr>
                    <td><?php echo $reason?></td>
                    <td><input type="text"  name="Reason" value="" required="true"></td>
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