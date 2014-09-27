<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/common.php");
//error_reporting(E_ERROR | E_PARSE);

ob_start();

$Value = "";
$Choice = "";

$IndexNo = "";
$AdmissionNo = "";
$name="";
$Year = "";
$Subject1 ="";
$Grade1 = "";
$Subject2 = "";
$Grade2 = "";
$Subject3 = "";
$Grade3 = "";
$GeneralEnglish="";
$CommonGenaralTest="";
$ZScore="";
$DistrictRank="";
$IslandRank="";


if( isset( $_POST["IndexNo"]) ){
    $_GET["value"] = $_POST["IndexNo"];
    $_GET["Choice"] = "IndexNo";

    $operation = updateALResults($_POST["IndexNo"], $_POST["S1Grade"], $_POST["S2Grade"], $_POST["S3Grade"], $_POST["GenGrade"], $_POST["CommonGeneralTest"],
                            $_POST["Zscore"], $_POST["IslandRank"], $_POST["DistrictRank"]);

  //  echo $_POST["IndexNo"] . "<br />";
   // echo $_POST["S1Grade"]. "<br />";
   // echo $_POST["S2Grade"]. "<br />";
   // echo $_POST["S3Grade"]. "<br />";
   // echo $_POST["GenGrade"]. "<br />";
   // echo $_POST["CommonGeneralTest"] . "<br />";
  //  echo $_POST["Zscore"]. "<br />";
  //  echo $_POST["IslandRank"]. "<br />";
  //  echo $_POST["DistrictRank"] . "<br />";

    if($operation == 1){
        sendNotification("Updating grade successful.");
    }
    else{
        sendNotification("Error updating grade.");
    }
}




    if(isset($_GET["value"]))
    {
        $Value = $_GET["value"];
    }

    if(isset($_GET["Choice"]))
    {
        $Choice = $_GET["Choice"];
    }


//if (isset($_GET["expand"]))
//{
//    $result = getAlResults($_GET["expand"]);
//
//
//
//    foreach($result as $row) //
//    {
//
//
//        $IndexNo = $row[0];
//        $AdmissionNo = $row[1];
//        $name=$row[2];
//        $Year = $row[3];
//        $Subject=$row[4];
//        $Grade=$row[5];
//        $GeneralEnglish=$row[6];
//        $CommonGenaralTest=$row[7];
//        $ZScore=$row[8];
//        $IslandRank=$row[9];
//        $DistrictRank=$row[10];
//
//
//    }
//
//}
//else
//{  $IndexNo = "";
//    $AdmissionNo="";
//
//    $Year = "";
//    $Subject="";
//    $Grade="";
//
//}

?>




    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

           h1{
               text-align: center;
           }

            .insert
            {
                position:absolute;
                left:265px;
                top: 250px;
            }

            .insert2
            {
                position: absolute;
                left: 65px;
                top: 100px;
            }

            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:2px;
                text-align: left;
            }

            .insert td
            {
                padding:10px;

            }

            .insert, .insert th, .insert td
            {
                border-collapse: collapse;

            }

             input.edit{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:170px;
                top: 50px;


            }
            .printResults
            {
                position: absolute;
                left: 500px;
                top: 150px;
            }

        </style>
        <script>
            $(document).ready(function(){
                $("#btnEdit").on("click", function(e){
//                    alert("bla");


                    var IndexNo = $("#IndexNo").val();
                    var Subject1 = $("#Subject1").html();
                    var Subject2 = $("#Subject2").html();
                    var Subject3 = $("#Subject3").html();

                    var S1Grade = $("#S1Grade").html();
                    var S2Grade = $("#S2Grade").html();
                    var S3Grade = $("#S3Grade").html();

                    var GenGrade = $("#GenGrade").html();
                    var CommonGeneralTest = $("#CommonGeneralTest").html();
                    var Zscore = $("#Zscore").html();
                    var IslandRank = $("#IslandRank").html();
                    var DistrictRank = $("#DistrictRank").html();

                    editALGrade( IndexNo, Subject1,S1Grade, Subject2, S2Grade, Subject3, S3Grade, GenGrade, CommonGeneralTest, Zscore, IslandRank, DistrictRank);

                });
            });

        </script>

    </head>
    <body>

    <h1>G.C.E A/L Search Results </h1>

    <form method="get">

        <table class="insert">

            <th>Subject</th>
            <th colspan="2">Grade</th>

            <?php


            if(is_numeric($Value))
            {
                $result = null;

                if( strcmp($Choice, "IndexNo") == 0)
                {
                    $result = searchALMarks($Value);
                }
                elseif( strcmp($Choice, "AdmissionNo") == 0 )
                {
                    $result =searchALByAdmission($Value);
                }

                if(isFilled($result))
                {
                    $i = 1;

                    foreach($result as $row){
//                        $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";
                        $IndexNo = $row[0];
                        $AdmissionNo = $row[1];
                        $name=$row[2];
                        $Year = $row[3];
                       // echo "<td><input class='edit' type='button' name='$row[15]' value='Edit' /></td>";

                        echo "<tr>";
                        echo "<td id='Subject1'> $row[4]</td>";
                        echo "<td id='S1Grade'>$row[7]</td>";
                        echo "</tr><tr>";
                        echo "<td id='Subject2'>$row[5]</td>";
                        echo "<td id='S2Grade'>$row[8]</td>";
                        echo "</tr><tr>";
                        echo  "<td id='Subject3'>$row[6]</td>";
                        echo  "<td id='S3Grade'>$row[9]</td>";
                        echo "</tr><tr>";
                        echo  "<td>General English Test</td>";
                        echo  "<td id='GenGrade'>$row[10]</td>";
                        echo "</tr><tr>";
                        echo  "<td>Common General Test</td>";
                        echo  "<td id='CommonGeneralTest'>$row[11]</td>";
                        echo "</tr><tr>";
                        echo  "<td>Z-Score</td>";
                        echo  "<td id='Zscore'>" . round( $row[12] , 3). "</td>";
                        echo "</tr><tr>";

                        echo  "<td>Island Rank</td>";
                        echo  "<td id='IslandRank'>$row[13]</td>";
                        echo "</tr><tr>";
                        echo  "<td>District Rank</td>";
                        echo  "<td id='DistrictRank'>$row[14]</td>";
                        //echo "<td><input name=\"Edit" . "\" type=\"submit\" value=\"Edit\"  /> </td> ";


                        echo "<td><input id='btnEdit' name='Edit' class='edit' type='button'  value='Edit' /></td>";

                        echo "</tr>";
                    }
                }
                else
                {
                    echo "<style> .insert{display: none} </style>";
                    sendNotification("No records found");
                }

            }
            else
            {
                echo "<style> .insert{display: none} </style>";
                sendNotification("Invalid search parameter entered");
            }
            ?>
        </table>

        <a class="printResults" href="<?php echo THISPATHFRONT . "/marksAndGrading/ALReport.php" . "?indexNo=" . $IndexNo . "&AdmissionNo=" . $AdmissionNo . "&Name=" . $name . "&Year=" . $Year ?>"> Print Results</a>


        <table class="insert2">
            <tr>
                <td>Index Number</td>
                <td><input type="text" id="IndexNo" name="IndexNo" value="<?php echo $IndexNo ?>" readonly /></td>
            </tr>

            <tr>
                <td>Admission Number</td>
                <td><input type="text" name="AdmissionNo"  value="<?php echo $AdmissionNo ?>" readonly/> </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="Name"  value="<?php echo $name ?>" readonly/> </td>
            </tr>
            <tr>
                <td>Year</td>
                <td><input type="text" name="Year" value="<?php echo $Year ?>" readonly /> </td>
            </tr>
        </table>
    </form>

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "A/Level Search Results";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>