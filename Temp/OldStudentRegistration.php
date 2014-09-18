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
	height:1400px;
	width:800px;
	left:283px;
	top:50px;
	border-radius:20px;
	padding:10px;

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
	height:30px;
	padding:5px;
}

td {	
	padding:5px;
}
input.button1 {
	position:relative;
	font-weight:bold;
	font-size:20px;
	left:50px;
	top:10px;
}
input.button2 {
	position:relative;
	font-weight:bold;
	font-size:20px;
	right:20px;
	top:10px;
}
input.button3 {
	position:relative;
	font-weight:bold;
	font-size:20px;
	left:20px;
	top:10px;
}

</style>

<title>Student Registration</title>


</head>



<body>
	<div class="main">

			<h1>Student Registration Form</h1>
			
		<form>
			<table class="general" cellspacing="0">
				<tr><th>General Information</th><th></th></tr>		
				<tr>
					<td>Admission ID</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td>Last Name</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr class="alt">
					<td>Name With Initials</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td>Nationality/Race</td>
					<td><select type="text" value="">
						<option>Sinhala</option>
						<option>Sri Lankan Tamil</option>
						<option>Indian Tamil</option>
						<option>Sri Lankan Muslim</option>	
						<option>Other</option>
					</select></td>
				</tr>
				<tr class="alt">
					<td>Religion</td>
					<td><select type="text" value="">
						<option>Buddhism</option>
						<option>Hinduism</option>
						<option>Islam</option>
						<option>Christianity</option>	
						<option>Othe	r</option>
					</select></td>
				</tr>
				<tr class="alt">
					<td>Medium</td>
					<td>
						<input type="radio" name="Med" value="sinhala">Sinhala
						<input type="radio" name="Med" value="english">English
						<input type="radio" name="Med" value="tamil">Tamil

					</td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td>Grade/Year</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td>Class</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td></td>

					<td><input class="button1" type="button" value="Submit"></td>

					<td><input class="button2" type="button" value="Reset"></td>
					
					<td><input class="button3" type="button" value="Cancel"></td>
				</tr>
                </table>
            </form>
				
				
	</div>
							
			
</body>

</html>