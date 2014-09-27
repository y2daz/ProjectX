<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 9/3/14
 * Time: 11:18 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
//define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");

ob_start();

if (isset($_POST["Submit"])) //User has clicked the submit button to add a classroom
{
    $arrGradeClass = getGradeAndClass( $_POST["gradeAndClass"] );

    $thisGrade = $arrGradeClass[0];
    $thisClass = $arrGradeClass[1];

    $operation = insertClassroom($_POST["staffId"], $thisGrade, $thisClass);

    if ($operation == 1)
    {
        sendNotification("Class successfully added.");
    }
    elseif ($operation == 2)
    {
        sendNotification("Class successfully updated.");
    }
    else
    {
        sendNotification("Error inserting class information.");
    }
}
elseif( isset($_GET["delete"]) ){
    if( isset($_GET["className"]) )
    {
        $delClassName = $_GET["className"];
        $delGrade = $_GET["delete"];

        $operation = deleteClassroom($delGrade, $delClassName);

        if ($operation == TRUE) {
            sendNotification("Class successfully deleted.");
        } elseif ($operation == FALSE) {
            sendNotification("Error deleting class.");
        }
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
            #suggestion{
                color: #696969;
            }
            .details{
                position: relative;
                left: 100px;
            }
            .ClassroomTable th, .details th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:5px;
            }

            .ClassroomTable td, .details td{
                padding:5px;
            }
            .ClassroomTable .alt{
                background-color: #bed9ff;
            }
        </style>
        <script>
            $(document).ready(function() {
                $("#gradeAndClass")
                    .on("focus", function(){
                        $("#suggestion").html(" e.g. 11A, 11 A, 11-A");
                        console.log("Got focus");
                    })
                    .on("blur", function(){
                        $("#suggestion").html("");
                        console.log("Lost focus");
                    })
            });
        </script>
    </head>
    <body>
    <h1 align="center"> Class-teacher Allocation</h1>
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
                //yazdan remove query String
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
        <table class="details" >
            <tr>
                <td> Grade and Class</td>
                <td><input id="gradeAndClass" type="text" name="gradeAndClass" value="<?php echo $grade . " " . $className ?>"/> </td>
                <td id="suggestion"></td>
            </tr>
<!--            <tr>-->
<!--                <td> Class Name </td>-->
<!--                <td><input type = "text" name="className" value="--><?php //echo $className ?><!--" /> </td>-->
<!--            </tr>-->
            <tr>
                <td> Staff ID </td>
                <td colspan="2"><input type=text name="staffId"  /> </td>
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
$pageTitle= "Classroom Information";

$pageContent = ob_get_contents();
ob_end_clean();

//Apply the template
include("../Master.php");
?>