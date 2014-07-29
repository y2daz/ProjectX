    <?php session_start();

?>
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <style type=text/css>

            *{
                font-family: 'Open Sans', sans-serif;
                font-weight: 400;
            }
            body {
                background-image:url('images/cream_pixels.png');
                background-repeat: repeat;
                height:800px
            }
            li, ul {
                list-style-type: none;
            }
            #nav {
                position:absolute;
                display:block;
                background-color: white;
                float: left;
                width: 280px;
                top: 260px;
                left: 43px;
                border-top: 2px solid;
                border-top-color: #f0f0f0;
                border-left: 2px solid;
                border-left-color: #f0f0f0;
                border-bottom: 2px solid;
                border-bottom-color: #f0f0f0;
            }
            #nav li a {
                display: block;
                padding: 10px 15px;
                background: #ffffff;
                /*border-top: 1px solid #eee;*/
                /*border-bottom: 1px solid #999;*/
                text-decoration: none;
                color: #000;
            }
            #nav li a:hover {
                  background: #ececec;
                  color: #00aee9;
                  cursor: pointer; cursor: hand;
            }
            #nav li a.active {
                background: #ececec;
                color: #0099d4;
            }
            #nav li ul {
                display: none; // used to hide sub-menus
            }
            #nav li ul li a {
                padding: 10px 25px;
                background: #ffffff;
                font-size:14px;
                /*border-bottom: 2px solid #ececec;*/
                /*border-bottom: 1px dotted #ccc;*/
            }
            #nav li ul li a:hover {
                padding: 10px 25px;
                background: #ffffff;
                font-size:14px;
                /*border-bottom: 1px dotted #ccc;*/
            }
            #nav li ul li hr{
                width: 80%;
                padding: 0px 0px 0px 0px;
                margin: 0px auto;
                /*border-bottom: 2px solid #ececec;*/
                /*border-bottom: 1px dotted #ccc;*/
            }

            #main {
                width:700px;
                height:695px; /*We will change the height depending on what we need*/
                margin: 0px auto 0px auto;
                clear: both;
                top:100px;
                background-color: #ffffff;
                /*border: 4px solid gray;*/
                /*box-shadow:0px 0px 20px 5px #bcbcbc;*/
                border: 2px solid #f0f0f0;
                border-radius: 0px 0px 20px 20px;
                position:relative;
                display: block;
            }
            #header{
                position:absolute;
                top:0px;
                left:0px;
                z-index: -1;
                width:100%;
                height:250px;
                background-color: #003448;
            }
            #footer {
                position:absolute;
                bottom:-350px;
                left:0px;
                z-index: -1;
                width:100%;
                height:250px;
                background-color: #2d2d2d;
            }
            #language{
                position: absolute;
                z-index: 7;
                background-color: #003448;
                /*border: 2px solid #00445d;*/
                margin: 10px 0px 0px 0px;
                top:0px;
                right:10px;
                width:100px;
                height: 30px;
                text-align: center;
            }
            #language ul{
                padding: 0;
                margin: 0;
                font-size: 12px;
                color: #cc7f00;
            }
            #language ul a{
                font-size: 12px;
                color: #cc7f00;
                padding: 0;
            }
            #aboutus{
                position: relative;
                color: #f0f0f0;
                width:50%;
                margin:90px auto 0px auto;
                clear: both;
            }
            #aboutus p{
                font-weight: 600;
                font-size: 18px;
                color: #cc7f00;
            }


	.insert{
	position:absolute;
	left:80px;
	top:80px;	
	}




	th{
	color:white;
	background-color: #005e77;
	height:30px;
	padding:5px;
	}


	input.button {
	position:relative;
	font-weight:bold;
	font-size:15px;
	Right:-335px;
	top:20px;
	}
	input.button1 {
	position:relative;
	font-weight:bold;
	font-size:15px;
	Right:-335px;
	top: 355px;
	}
	    td 	{
		padding:10px;
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

        <div id="main">

	<h1>Class Wise Attendance Report</h1>
			
		<form>
		
			<table class="insert" cellspacing="0">	
				<tr><th>Class wise details</th><th></th></tr>	
				<tr class="alt">	
				<tr>
					
					<td>Grade</td>
					<td><input type="text" value=""></td>
					<td>Class</td>
					<td><input type="text" value=""></td>
					
				</tr>

				<tr class="alt">
				
					
					<tr>
					
					<td>Date from</td>
					<td><input type="date" value=""></td>
					<td>Date To</td>
					<td><input type="date" value=""></td>
				</tr>


				<tr>
					<td></td>

					<td><input class="button" type="button" value="Submit"></td>
				

				</tr>
						 <tr>
					<td></td>

					<td><input class="button1" type="button" value="Print"></td>
				

				</tr>



			</table>
	
			  <table id="timetable" >
                <tr>
                    <th>Addmission No</th>
                    <th>Studdent Name</th>
                    <th>Percentage</th>
                                    
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                                  
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                   
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    
                </tr>
                <tr><td ></td>
                    <td ></td>
		    <td ></td>
                    
                   
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                   
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>
                    
                </tr>
                <tr>
                    <td ></td>
                    <td ></td>
                    <td ></td>               
                </tr>
	    </table>	
				
			
				
				
					
				
					
			
				
				

						
			
		</form>





















    
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
                        <ul><a href="/PHP/New%20folder/Template.php?lang=1">?????</a> | <a href="/PHP/New%20folder/Template.php?lang=0">English</a></ul>
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
		<li><a>Administrative Task</a>
                <ul>
                   
                </ul>

            </li>
        </div>





    </body>
</html>