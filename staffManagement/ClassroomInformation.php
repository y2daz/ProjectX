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

if (isset($_POST["changeClass"])) //User has clicked the submit button to add a classroom
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
elseif( isset($_GET["valueName"]) ){
    if( strcmp( $_GET["valueName"], "Delete" ) == 0 ){
        $delClassArr = getGradeAndClass( $_GET["valueMember"] );
        $delGrade = $delClassArr[ 0 ];
        $delClass = $delClassArr[ 1 ];

        $operation = deleteClassroom($delGrade, $delClass);

        if ($operation == TRUE) {
            sendNotification("Class " .$delGrade . " " . $delClass. " successfully deleted.", "ClassroomInformation.php");
        } elseif ($operation == FALSE) {
            sendNotification("Error deleting class.", "ClassroomInformation.php");
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
            .ClassroomTable .alt, .ClassroomTable .alt td{
                font-size: .1em;
                background-color: #bed9ff;
                padding: 0 0;
            }
        </style>
        <script>
            $(document).ready(function(){
                $("#gradeAndClass")
                    .on("focus", function(){
                        $("#suggestion").html(" e.g. 11A, 11 A, 11-A");
                        console.log("Got focus");
                    })
                    .on("blur", function(){
                        $("#suggestion").html("");
                        console.log("Lost focus");
                    });
            });
        </script>
    </head>
    <?php
    $language = $_COOKIE['language'];
    $Grade = getLanguage('grade', $language);
    $Class = getLanguage('class', $language);
    $Teachersid = getLanguage('Teachersid', $language);
    $Teachersname = getLanguage('Teachersname', $language);
    $Staffallocation = getLanguage('Staffallocation', $language);
    $update =  getLanguage('update', $language);
    $expand = getLanguage('expand', $language);
    $delete = getLanguage('delete',$language);
    $staffID =  getLanguage('staffID', $language);
    $gradeclass = getLanguage('gradeclass', $language);


    ?>
    <body>
    <h1 align="center"><?php echo getLanguage('Staffallocation', $language)?></h1>
    <br />

    <form method="post">
        <table class="details" >
            <tr>
                <th colspan="2">
                    New Class Information
                </th>
            </tr>
            <tr>
                <td><?php echo getLanguage('gradeclass', $language)?></td>
                <td><input id="gradeAndClass" type="text" name="gradeAndClass" value="<?php echo $grade . " " . $className ?>"/> </td>
                <td id="suggestion"></td>
            </tr>

            <tr>
                <td><?php echo getLanguage('staffID', $language)?> </td>
                <td colspan="2"><input type=text name="staffId"  /> </td>
            </tr>

        </table>

        <br />

        <table align="center">
            <tr>
                <td> <input type="Submit" name="changeClass" value=<?php echo getLanguage('update', $language)?>></td>
            </tr>
        </table>
    </form>

    <br />
    <br />

    <form method="post">
    <table class="ClassroomTable" align="center">
        <tr>
            <th><?php echo getLanguage('grade', $language)?></th>
            <th><?php echo getLanguage('class', $language)?></th>
            <th><?php echo getLanguage('staffID', $language)?></th>
            <th><?php echo getLanguage('nameWithInitials', $language)?></th>
            <th></th>
            <th></th>
        </tr>
        <?php
        //$result = $currentStaffMembers;

        $i = 1;

        $result = getAllClassroom();

        $next = $prev =  $result[0][0];

        if (isFilled($result))
        {
            foreach($result as $row)
            {
                $i++;
                $next = $row[0];
                if ($prev != $next){
                    echo "<tr class=\"alt\" > <td colspan='10'> &nbsp; </td> </tr> ";
                    $i++;
                }

                $top = ($prev != $next)? "\n<tr><td>" : "\n<tr><td>";

                echo $top;
                echo "\n$row[0]" . "</td>" ;
                echo "\n<td>$row[1]</td>";
                echo "\n<td>$row[2]</td>";
                echo "\n<td>$row[3]</td>";
                echo "\n<td><input name=\"Change" . "\" type=\"button\" value=\"Change Teacher\" onClick=\"changeClassTeacher('$row[0] $row[1]'); \" /> </td>";
                echo "\n<td><input name=\"Delete" . "\" type=\"button\" value=\"Delete\" onClick=\"requestConfirmation('Are you sure you want to delete class $row[0] $row[1] ?', "
                    . "'Delete Confirmation', 'Delete', '" . $row[0] . $row[1] . "'); \" /> </td> ";
                //yazdaan remove query String
                //NO confirmation!!! :O


                $prev = $next;
            }
        }
//        $fullPageHeight = ( 600 + ($i * 27) );

        ?>
    </table>
    </form>

    </body>
    </html>
<?php
//Assign all Page Specific variables
//$fullPageHeight = 800;
$fullPageHeight = ( 600 + ($i * 27) );
$footerTop = $fullPageHeight + 100;
$pageTitle= "Class-teacher Allocation";

$pageContent = ob_get_contents();
ob_end_clean();

//Apply the template
include("../Master.php");
?>