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

    ob_start();

    $Value = "";
    $Choice = "";

    $IndexNo = "";
    $AdmissionNo = "";
    $name="";
    $Year = "";
    $Subject="Subject";
    $Grade="Grade";




    if(isFilled($_GET["value"]))
    {
        $Value = $_GET["value"];
    }

    if(isFilled($_GET["Choice"]))
    {
        $Choice = $_GET["Choice"];
    }

if (isset($_POST["Update"])) //User has clicked the submit button to add a user
{
    $operation = UpdateOLResults($_POST["Grade"]);

    if ($operation == true)
    {
        sendNotification("Results Updated Successfully");
    }
    else
    {
        sendNotification("Error updating Results.");
    }
}


if (isset($_GET["expand"]))
{
    $result = getOlResults($_GET["expand"]);



    foreach($result as $row) //
    {


        $IndexNo = $row[0];
        $AdmissionNo = $row[1];

        $Year = $row[3];
        $Subject=$row[4];
        $Grade=$row[5];

    }

}
else
{  $IndexNo = "";
    $AdmissionNo="";

    $Year = "";
    $Subject="";
    $Grade="";

}

if (isset($_POST["NewGrade"])){

    $operation = updateOLResults($_POST["IndexNo"], $_POST["Subject"], $_POST["Grade"] );

    if($operation==1){
        sendNotification("Update successful");
    }
    else{
        sendNotification("Error updating grade.");
    }
}

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
                 left:275px;
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
                padding:5px;
                text-align: left;
            }

            .insert td
            {
                padding:5px 10px 5px 10px;
                /*height: 24px;*/
                /*max-height: 24px;*/
                min-height: 100px;
            }

            .insert, .insert th, .insert td
            {
                border-collapse: collapse;

            }

             input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:50px;
                top: 420px;
            }
            .grade{
                max-width: 40px;
                text-align: center;
            }
            .notEditable{
                border-color: white;
                border-style: solid ;
            }
            .editButton{
                position:absolute;
                left:470px;
                top:670px;
            }
            #update{
                position:absolute;
                left:400px;
                top:720px;
            }

        </style>

        <script>
            $(document).ready(function(){

                var editable = false;

                $("#btnMakeEditable").on("click", function(e){
                    if (editable == true){
                        $(".grade").addClass("notEditable");
                        $(".grade").attr("readonly", true);
                        editable = false;
                    }
                    else{
                        $(".grade").removeClass("notEditable");
                        $(".grade").attr("readonly", false);
                        editable = true;
                    }
                });

                $(".edit").on("click", function(e){
                    var subject =  $(this).attr("name");

                    var indexNo = $("#IndexNo").val();

                    editOLGrade(indexNo, subject);
                });

            });
        </script>
    </head>
    <body>

        <h1> G.C.E O/L Search Results </h1>

        <form method="get">

            <table class="insert">

                <th>Subject</th>
                <th colspan="2">Grade</th>

                <?php


                if(is_numeric($Value))
                {
                    if($Choice == "IndexNo")
                    {
                        $result = searchOLMarks($Value);
                    }
                    else if($Choice == "AdmissionNo")
                    {
                        $result = searchOLbyAdmission($Value);
                    }
                    else if($Choice == "Year")
                    {
                        $result = searchOLbyYear($Value);
                    }
                    if(isFilled($result))
                    {
                        $i = 1;

                        foreach($result as $row){
                            $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                            $IndexNo = $row[0];
                            $AdmissionNo = $row[1];
                            $name=$row[2];
                            $Year = $row[3];

                            echo $top;
                            echo "<td>$row[4]</td>";
                            echo "<td><input class='grade notEditable' name='txt$row[4]' value='$row[5]' readonly/></td>";
                            echo "<td><input class='edit' type='button' name='$row[4]' value='Edit' /></td>";


                            echo "</tr>";
//                                echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand Details\" formaction=\"OLinput.php?expand=" . $row[0] . "\" /> </td> ";
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
$fullPageHeight = 790;
$footerTop = $fullPageHeight + 100;
$pageTitle= "O/Level Search Results";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>