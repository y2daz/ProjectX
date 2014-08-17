<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 19/07/14
 * Time: 17:04
 */
require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

ob_start();

if (isset($_GET["delete"]))
{
    deleteStaff($_GET["delete"]);

}

if (isset($_POST["search"]))
{
    $currentStaffMembers = null;

    if (isset($_POST["Choice"]))
    {
        $currentStaffMembers = searchStaff($_POST["query"]);
    }
    else
    {
        $currentStaffMembers = getAllStaff();
    }
}
else
{
    $currentStaffMembers = getAllStaff();
}
?>
<html>
<head>
    <style type=text/css>
<!--        #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--        #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

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
            border-collapse: collapse;
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
            min-width: 60px;
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

<form method="post">

    <table id="info">
        <tr>
            <td colspan="2"><span id="selection">Search by : </span>
             <input type="text" class="text1" name="query" value="">
            </td>
            <td><input class="button" name="search" type="submit" value="Search"></td>
        </tr>
        <tr><td></td><td>&nbsp;</td></tr>
        <tr>
            <td><input type="RADIO" name="Choice" value="Staffid"/>Staff ID</td>
            <td><input type="RADIO" name="Choice" value="Name"  >Name</td>
            <td><input type="RADIO" name="Choice" value="nicnumber"/>NIC Number</td>
            <td><input type="RADIO" name="Choice" value="contactnumber"  >Contact Number</td>
        </tr>

    </table>
</form>
    <br />

<form method="post">
    <table class="viewTable" align="center">
        <tr>
            <th>Staff ID</th>
            <th>Name</th>
            <th>Nic Number</th>
            <th>Contact Number</th>
            <th></th>
            <th></th>
        </tr>
        <?php
            $result = $currentStaffMembers;

            $i = 1;

            if (!isFilled($result))
            {
                $result = getAllStaff();
            }

            foreach($result as $row){
                $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" : "<tr><td>";
                echo $top;
                echo "$row[0]";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td><input name=\"Expand" . "\" type=\"button\" value=\"Expand Details\"/> </td> ";
                echo "<td><input name=\"Delete"  . "\" type=\"submit\" value=\"Delete\" formaction=\"searchStaffDetails.php?delete=" . $row[0] . "\" /> </td> ";
                echo "</td></tr>";
            }



        ?>
<!--        <tr>-->
<!--            <td>SIDXXX</td>-->
<!--            <td>Mrs. Andrea De Silva</td>-->
<!--            <td>578695412v</td>-->
<!--            <td>0719658712</td>-->
<!--            <td><input type="button" name="expand" value="Expand Details" /></td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
<!--        <tr class="alt">-->
<!--            <td>SIDXXX</td>-->
<!--            <td>Mr. Madusha Karunaratne</td>-->
<!--            <td>642531789v</td>-->
<!--            <td>0772596314</td>-->
<!--            <td><input type="button" name="expand" value="Expand Details" /></td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td> SIDXXX </td>-->
<!--            <td> Mr. Priyan Fernando </td>-->
<!--            <td> 702358964v</td>-->
<!--            <td> 0774239651 </td>-->
<!--            <td> <input type="button" name="expand" value="Expand Details" /> </td>-->
<!--            <td><input type="button" name="delete" value="Delete" /></td>-->
<!--        </tr>-->
    </table>
</form>
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
$fullPageHeight = 1300 + ($i * 18);
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "searchViewStaffdetails";
//Apply the template
include("../Master.php");
?>

