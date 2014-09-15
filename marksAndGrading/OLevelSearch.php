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

    $Value = $_GET["value"];
    $Choice = $_GET["Choice"];

//    echo $Value;
//    echo $Choice;

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
                left:110px;
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

        <form metho="post" class="insert">

            <table>

                <th>Index Number</th>
                <th>Admission Number</th>
                <th>Year</th>
                <th>Subject</th>
                <th>Grade</th>

                <?php

                    if($Choice == "IndexNo")
                    {
                        $result = searchOLMarks($Value);

                        if(isFilled($result))
                        {
                            $i = 1;

                            foreach($result as $row){
                                $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";


                                echo $top;
                                echo "<td>$row[0]</td>";
                                echo "<td>$row[1]</td>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";

                                echo "</tr>";
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='5' style='text-align: center'> No records found. </td></tr>";

                            echo "<style>

                            .insert
                            {
                                position: absolute;
                                left: 160px;
                                top: 100px;
                            }

                            </style>";
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


                                echo $top;
                                echo "<td>$row[0]</td>";
                                echo "<td>$row[1]</td>";
                                echo "<td>$row[2]</td>";
                                echo "<td>$row[3]</td>";
                                echo "<td>$row[4]</td>";

                                echo "</tr>";
                            }
                        }
                        else
                        {
                            echo "<tr><td colspan='5' style='text-align: center'> No records found. </td></tr>";

                            echo "<style>

                            .insert
                            {
                                position: absolute;
                                left: 160px;
                                top: 100px;
                            }

                            </style>";

                        }

                    }
                ?>

            </table>

        </form>



    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "O'Level Search Results";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>