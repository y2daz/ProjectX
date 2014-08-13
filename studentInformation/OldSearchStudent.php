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

<title>Search Student</title>


</head>



<body>
	<div class="main">

			<h1>Search Student Form</h1>
			
		<form>
			<table class="general" cellspacing="0">	
			<tr class="alt">
			<td>Admission ID</td>
					<td><input type="text" value=""></td>
				
				<tr>
					<td>Name With Initials</td>
					<td><input type="text" value=""></td>
					</tr>
				<tr>
					<td>Date of Birth</td>
					<td><input type="text" value=""></td>
				</tr>
				<tr>
					<td>Nationality/Race</td>
					<td><input type="text" value=""></td>
				</tr>
				
					<td>Medium</td>
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

					<td><input class="button1" type="button" value="Search"></td>

					<td><input class="button2" type="button" value="Reset"></td>
					
					<td><input class="button3" type="button" value="Cancel"></td>
				</tr>
                </table>
            </form>
				
				
	</div>
							
			
</body>

</html>