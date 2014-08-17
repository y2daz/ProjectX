<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 19/07/14
 * Time: 17:04
 */
ob_start();
?>
<html>
<head>
    <style type=text/css>
        #main{ height:<?php echo "$fullPageHeight" . "px";?> }
        #footer{ top:<?php echo "$footerTop" . "px";?> }

        h1{
            text-align: center;
        }
        h3{
            position: relative;
            left:50px;
        }
        #info{
            position: relative;
            left: 40px;
        }
        .viewTable{
            position: relative;
        }
        .viewTable th{
            font-weight: 600;
            color:white;
            background-color: #005e77;
        }
        .viewtable tr{
        }
        .viewTable tr.alt{
            background-color: #bed9ff;
        }
        .viewTable td{
            padding-left: 10px;
            padding-right: 10px;
        }
        .details {
            /*position: relative;*/
            /*top:50px;*/
            width:500px;
            height:150px
        }
        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:15px;
            right:-150px;
            top:100px;
        }
    </style>
</head>
<body>
<h1> Search and View Staff Details </h1>
<br />
<!--<h3>Search by</h3>-->

<form>

    <table id="info">
        <tr>
            <td colspan="2"><span id="selection">Search by : </span>
             <input type="text" class="text1" name="class" value="">
            </td>
            <td><input class="button" name="newStaff" type="submit" value="Search"></td>
        </tr>
        <tr><td></td><td></td></tr>
        <tr>
            <td><input type="RADIO" name="Choice" value="Staffid"/>Staff ID</td>
            <td><input type="RADIO" name="Choice" value="Name"  >Name</td>
            <td><input type="RADIO" name="Choice" value="nicnumber"/>NIC Number</td>
            <td><input type="RADIO" name="Choice" value="contactnumber"  >Contact Number</td>
        </tr>

    </table>

    <br />

    <table class="viewTable" align="center">
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Nic Number</th>
            <th>Contact Number</th>
            <th></th>
        </tr>
        <tr>
            <td>SIDXXX</td>
            <td>Mrs. Andrea De Silva</td>
            <td>Female</td>
            <td>578695412v</td>
            <td>0719658712</td>
            <td><input type="button" name="expand" value="Expand Details" /></td>
        </tr>
        <tr class="alt">
            <td>SIDXXX</td>
            <td>Mr. Madusha Karunaratne</td>
            <td>Male</td>
            <td>642531789v</td>
            <td>0772596314</td>
            <td><input type="button" name="expand" value="Expand Details" /></td>
        </tr>
        <tr>
            <td> SIDXXX </td>
            <td> Mr. Priyan Fernando </td>
            <td> Male </td>
            <td> 702358964v</td>
            <td> 0774239651 </td>
            <td> <input type="button" name="expand" value="Expand Details" /> </td>
        </tr>
    </table>

    <br />
    <br />

    <table class="details" align="center">
        <tr>
            <td> Staff ID </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>


        <tr>
            <td> Name with Initials </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>



        <tr>
            <td> Date of Birth  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>

        <tr>
            <td> Gender </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>

        <tr>
            <td>Natinality/Race </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>

        <tr>
            <td> Religion </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Civil Status  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>NIC Number  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>Mail Delivery Address</td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>Contact Number </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>Date Appointed as Teacher/principal</td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Date joined this school  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Employement status </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Medium </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Position in school  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Section  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Subject Most taught  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>  Subject Second Most taught </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>  Service Grade  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td>  Salary</td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Highest Educational Qualification  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Highest Professional Qualification  </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>
        <tr>
            <td> Course of Study </td>
            <td > <input type = "text" name="staffid" /> </td>
        </tr>


        <td><input class="button1" name="newStaff" type="submit" value="UPDATE"></td>
    </table>

    <br />
    <br />

    <!--<table align="center">
        <tr>
            <td> <input type="button" value="Approve"> </td>
            <td > <input type="button" value="Reject">  </td>
        </tr>
    </table>-->

</form>
</body>
</html>
<?php
//Assign all Page Specific variables
$fullPageHeight = 1300;
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "searchViewStaffdetails";
//Apply the template
include("../Master.php");
?>

