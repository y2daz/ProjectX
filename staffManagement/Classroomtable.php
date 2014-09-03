<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/3/14
 * Time: 11:18 AM
 */

require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

ob_start();







?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            table.ClassroomTable {
                border-spacing:0px 5px;
                min-width: 500px;
            }

            #searchCriteria{
                position:relative;
                left:20px;
                top:20px;
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
            .ClassroomTable .alt{
                background-color: #bed9ff;
            }

        </style>
    </head>
    <body>
    <h1 align="center"> Classroom Information </h1>
    <br />



    <table class="ClassroomTable" align="center">
        <tr>
            <th>Grade</th>
            <th>Class</th>
            <th>Teacher ID</th>
            <th>Teachers' Name</th>
            <th></th>
        </tr>
        <?php
        //$result = $currentStaffMembers;

        $i = 1;

        $result = getAllClassroom();

        if (isFilled($result))
        {
            foreach($result as $row)
            {
                $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" : "<tr><td>";
                echo $top;
                echo "$row[0]";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "<td>$row[3]</td>";
                echo "<td><input name=\"Change" . "\" type=\"submit\" value=\"Change Details\" formaction=\"Classroomtable.php?Change=" . $row[0] . "_". $row[1] . "\" /> </td> ";
                echo "</td></tr>";
            }
        }
        if (isset($_GET["search"]))
        {
            $fullPageHeight = ( 600 + ($i * 18) );
        }

        ?>
    </table>

    <br />
    <br />

    <form method="post">
        <table class="details" align="center">
            <tr>
                <td> Grade </td>
                <td > <input type = "text" name="grade" /> </td>
            </tr>


            <tr>
                <td> Class Name </td>
                <td > <input type = "text" name="classname" /> </td>
            </tr>

            <tr>
                <td> Staff id </td>
                <td > <input type=text name="staffid"  /> </td>
            </tr>


        </table>

        <br />
        <br />

        <table align="center">
            <tr>
                <td> <input type="button" value="Update"> </td>

            </tr>
        </table>

    </form>
    </body>
    </html>
<?php
//Assign all Page Specific variables
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Classroom table";

$pageContent = ob_get_contents();
ob_end_clean();

//Apply the template
include("../Master.php");
?>