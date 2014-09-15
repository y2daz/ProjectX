<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
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
    $Year = "";




    if(isFilled($_GET["value"]))
    {
        $Value = $_GET["value"];
    }

    if(isFilled($_GET["Choice"]))
    {
        $Choice = $_GET["Choice"];
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
                padding:10px;
            }

            .insert, .insert th, .insert td
            {
                border-collapse: collapse;
            }

            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;

            }

        </style>
    </head>
    <body>

        <h1> O Level Search Results </h1>

        <form method="post">

            <table class="insert">

                <th>Subject</th>
                <th>Grade</th>

                <?php


                if(is_numeric($Value))
                {
                    if($Choice == "IndexNo")
                    {
                        $result = searchOLMarks($Value);

                        if(isFilled($result))
                        {
                            $i = 1;

                            foreach($result as $row){
                                $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                                $IndexNo = $row[0];
                                $AdmissionNo = $row[1];
                                $Year = $row[2];

                                echo $top;
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";

                                echo "</tr>";
                            }
                        }
                        else
                        {
                            echo "<style> .insert{display: none} </style>";

                            sendNotification("No records found.");
                        }
                    }
                    else if($Choice == "AdmissionNo")
                    {
                        $result = searchOLbyAdmission($Value);

                        if(isFilled($result))
                        {
                            $i = 1;

                            foreach($result as $row){
                                $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                                $IndexNo = $row[0];
                                $AdmissionNo = $row[1];
                                $Year = $row[2];

                                echo $top;
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";

                                echo "</tr>";
                            }
                        }
                        else
                        {
                            echo "<style> .insert{display: none} </style>";

                            sendNotification("No records found");
                        }

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
                    <td><input type="text" name="IndexNo" value="<?php echo $IndexNo ?>" </td>
                </tr>

                <tr>
                    <td>Admission Number</td>
                    <td><input type="text" name="AdmissionNo"  value="<?php echo $AdmissionNo ?>" </td>
                </tr>

                <tr>
                    <td>Year</td>
                    <td><input type="text" name="Year" value="<?php echo $Year ?>" </td>
                </tr>

            </table>

        </form>



    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 700;
$footerTop = $fullPageHeight + 100;
$pageTitle= "O'Level Search Results";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>