<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/3/14
 * Time: 11:18 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");


ob_start();


if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    $operation = insertClassroom($_POST["staffId"], $_POST["grade"], strtoupper($_POST["className"]));

    if ($operation == 1)
    {
        sendNotification("Classroom successfully added.");
    }
    elseif ($operation == 2)
    {
        sendNotification("Classroom successfully updated.");
    }
    else
    {
        sendNotification("Error inserting classroom information.");
    }
}

if( isset($_GET["delete"]) )
{
    if( isset($_GET["className"]) )
    {
        $delClassName = $_GET["className"];
        $delGrade = $_GET["grade"];
    }
}


$className = "";
$grade = "";
if( isset($_GET["grade"]) )
{
    if( isset($_GET["className"]) )
    {
        $className = $_GET["className"];
        $grade = $_GET["grade"];
    }
}
?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            table.ClassroomTable {
                border-spacing:0px 5px;
                min-width: 600px;
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


    <form method="post">
    <table class="ClassroomTable" align="center">
        <tr>
            <th>Grade</th>
            <th>Class</th>
            <th>Teacher ID</th>
            <th>Teachers' Name</th>
            <th></th>
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
                $top = ($i++ % 2 == 0)? "\n<tr class=\"alt\"><td>" : "\n<tr><td>";

                echo $top;
                echo "\n$row[0]" . "</td>" ;
                echo "\n<td>$row[1]</td>";
                echo "\n<td>$row[2]</td>";
                echo "\n<td>$row[3]</td>";
                echo "\n<td><input name=\"Change" . "\" type=\"submit\" value=\"Change Teacher\" formaction=\"ClassroomInformation.php?grade=" . $row[0] . "&className=". $row[1] . "\" /> </td> ";
                echo "\n<td><input name=\"Delete" . "\" type=\"submit\" value=\"Delete\" formaction=\"ClassroomInformation.php?delete=" . $row[0] . "&className=". $row[1] . "\" /> </td> ";
            }
        }
        if (isset($_GET["search"]))
        {
            $fullPageHeight = ( 600 + ($i * 18) );
        }

        ?>
    </table>
    </form>

    <br />
    <br />

    <form method="post">
        <table class="details" align="center">
            <tr>
                <td> Grade </td>
                <td><input type = "text" name="grade" value="<?php echo $grade ?>"/> </td>
            </tr>


            <tr>
                <td> Class Name </td>
                <td><input type = "text" name="className" value="<?php echo $className ?>" /> </td>
            </tr>

            <tr>
                <td> Staff ID </td>
                <td><input type=text name="staffId"  /> </td>
            </tr>


        </table>

        <br />
        <br />

        <table align="center">
            <tr>
                <td> <input type="Submit" value="Update" name="Submit" /> </td>
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