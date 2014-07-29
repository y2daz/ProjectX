<?php session_start();


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
	height:600px;
	width:800px;
	left:283px;
	top:50px;
	border-radius:20px;
	padding:10px;

}

table {
		border-spacing:0px 5px;
}

.Classroom  {
	position:absolute;
	left:80px;
	top:80px;	
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
	font-size:12px;
	left:50px;
	top:45px;
	width:150px;
	
}

input.button1 {
	position:relative;
	font-weight:bold;
	font-size:12px;
	right:-300px;
	top:0px;
}





</style>

<title>Manoj System - Event Management</title>


</head>

<?php //Get language and make changes

    if($_SESSION['language'] == 0)
    {
	$eventid="Event ID";
	$name="Name";
	$description="Description";
	$location="Location";
	$eventtype="Event Type";
	$status="Status";
	$date="Date";
	$eventcreator="Event Creator";
	$starttime="Start Time ";
	$endtime="End Time";
	$addmanager="Add Event Managers ";
	$saveevent="Save Event";
	$prizegiving="Prize Giving Ceremony";
	$sportmeet="Sports Meet";
	$teacherday="Teacher's Day";

    }
else
    {
 	$eventid=" සිදුවීම් අංකය";
	$name="සිදුවීම";
	$description="විස්තරය";
	$location="ස්ථානය";
	$eventtype="සිදුවීම් වර්ගය";
	$status="තත්වය";
	$date="දිනය";
	$eventcreator="සිදුවීම් නිර්මාණකරු";
	$starttime="ආරම්භක වෙලාව ";
	$endtime="අවසන් වන වෙලාව";
	$addmanager="සිදුවීම් කළමනාකරුවන් එක් කරන්න ";
	$saveevent="සිදුවීම සුරකින්න";
	$prizegiving="ත්‍යාග ප්‍රධානෝත්සවය";
	$sportmeet="ක්‍රීඩා උත්සවය";
	$teacherday="ගුරු දිනය";
    }
?>	

<body>

	<div class="main">

<h1>Add New Event</h1>
			
		<form onsubmit="return validateEverything()" name="thisForm" method="post">
			<div class="staffimage">
			
			</div>
			<table class="general" cellspacing="0">	
				<tr><th></th><th></th></tr>		
				<tr>

				</tr>
				<tr class="alt">
					<td><?php echo $eventid?></td>
					<td><input type="Event Id" value=""></td>	

				<tr class="alt">
					<td><?php echo $name?></td>
					<td><input type="Name" value=""></td>

				<tr class="alt">
					<td><?php echo $description?></td>
					<td><input type="Description" value=""></td>

				<tr class="alt">
					<td><?php echo $location?></td>
					<td><input type="Location" value=""></td>	


					

                                        <td><?php echo $eventtype?></td>
					<td><select name="Event Type" value="">
						<option><?php echo $prizegiving?></option>
						<option><?php echo $sportmeet?></option>
						<option><?php echo $teacherday?></option>	
						<option></option>
					</select></td>

				
				<tr class="alt">
					<td><?php echo $status?></td>
					<td><input type="Status" value=""></td>

				<tr class="alt">
					<td><?php echo $date?></td>
					<td><input type="Date" value=""></td>

				<tr class="alt">
					<td><?php echo $eventcreator?></td>
					<td><input type="Event Creator" value=""></td>

				<tr class="alt">
					<td><?php echo $starttime?></td>
					<td><input type="Start Time" value=""></td>

				<tr class="alt">
					<td><?php echo $endtime?></td>
					<td><input type="End Time" value=""></td>	

				
				
				</tr>
				
						 
					<td><input class="button" type="Button" name="addManager" value=<?php echo $addmanager?>></td>

				</tr>			
			
                                </tr>
				
						 
					<td><input class="button1" type="Button" name="saveEvent" value=<?php echo $saveevent?>></td>
				</tr>			
			
			
		
			</table>		

		</form>

			
	
	</div>
<div style="background-color: black; position: absolute; top:800px; left:600px; height:50px; margin:1300px 0px 0px -250px auto;">
        <?php

            $myURL = array();
            $myURL = explode("?", $_SERVER["REQUEST_URI"]);
        ?>
        <a href="<?php echo $myURL[0] . "?lang=0"; ?>">English</a>
        <a href="<?php echo $myURL[0] . "?lang=1"; ?>">සිංහල</a>
</div>	
</body>

</html>