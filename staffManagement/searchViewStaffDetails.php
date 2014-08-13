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
            right:450px;
            top:50px;


    </style>
</head>


</head>
<?php //Get language and make changes

    if($_COOKIE['language'] == 0)
    {
	    $staffID = "Staff ID";
        $nameWithInitials = "Name with Initials";
        $dateOfBirth = "Date of Birth";
        $gender = "Gender";
        $nationalityRace = "Nationality/Race";
        $religion = "Religion";
        $civilStatus = "Civil Status";
        $nicNumber = "NIC Number";
	    $maildeliveryaddress="Mail Delivery Address";
	    $contactnumber="Contact Number";
	    $Searchby="Search by";
    }
else
    {
 	$staffID = "අනුක්‍රමික අංකය";
        $nameWithInitials = "නම් මුලකුරු සමඟ";
	 
        $dateOfBirth = "උපන් දිනය";
        $gender = "ස්ත්‍රී/පුරුෂ භාවය";
        $nationalityRace = "ජනවර්ගය";
        $religion = "ආගම";
        $civilStatus = "විවාහක /අවිවාහක බව";
        $nicNumber = "ජාතික හැඳුනුම් පත් අංකය";

	    $maildeliveryaddress="ලිපිනය";
	    $contactnumber="දුරකථන අංකය";
	    $Searchby="පිරික්සන්න";
	
    }
?>	


<body>
	

			
	<form onsubmit="return validateEverything()" name="thisForm" method="post">
	<div class="main">		
	<h1>Search and View Staff Details</h1>
<table class="general" cellspacing="0">	
				
	<tr><th>Search By</th><th></th></tr>		
				<tr class="alt">
					<td><?php echo $Searchby?></td>
					
						 
				</tr>
				
				<tr class="alt">
					
					<td>
					<br><input type="checkbox" name="checkbox" value=""><?php echo $staffID?>
						<input type="checkbox" name="checkbox" value=""><?php echo $nameWithInitials?>
						<input type="checkbox" name="checkbox" value=""><?php echo $dateOfBirth?>
					<input type="checkbox" name="checkbox" value=""><?php echo $gender?></br>
						<br><input type="checkbox" name="checkbox" value=""><?php echo $nationalityRace?>
						<input type="checkbox" name="checkbox" value=""><?php echo $religion?>
						<input type="checkbox" name="checkbox" value=""><?php echo $civilStatus?>
						<input type="checkbox" name="checkbox" value=""><?php echo  $nicNumber?></br>
						

					</td>
				</tr>

				<table border="2px solid black" >


                <tr>
                    <th>Staff id</th>
                    <th>Name with initials</th>
                    <th>Date of birth</th>
		    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Mailing Address</th>
		    <th>Religion</th>
                    <th>Civil Status</th>
                    <th>Contact number</th>
		    <th>Nic Number</th>
                   

                </tr>
                


				

				<td><input class="button" type="submit" value="Browse"></td>
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