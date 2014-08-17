<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
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
            #classDate{
                    position:relative;
                left:30px;

            }
            #attendance{
                position: relative;
                top:0px;
                left:30px;
            }
            #attendance th{
                font-weight: 600;
            }
            #attendance tr.alt{
                background-color: #bed9ff;
            }
            #attendance td.disabled{
                background-color: #ececec;
            }
            input.button {
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right: -450px;
                top: 1150px;
            }
        </style>
    </head>

    <body>
        <?php
            $class = "10A";
        ?>
        <h1>Keep Attendance</h1>
        <table id="classDate">
            <tr>
                <td>
                    Grade
                </td>
                <td>
                    <?php echo $class; ?>
                </td>
            </tr>
            <tr>
                <td>
                    <br/>
                </td>
            </tr>
            <tr>
                <td>
                    Week
                </td>
                <td>
                    <input name="week" type="date"/>
                </td>
            </tr>
                <tr>
                    <td></td>

                    <td><input class="button" type="button" value="Submit"></td>


                </tr>
        </table>
        <table id="attendance">
            <tr>
                <th>Admission No</th><th>Name</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th>
            </tr>

            <?php
                $i = 0;
                $noOfStudents = 40;

                for ($i = 0; $i < $noOfStudents; $i++)
                {
                    $admissionNo = $i + 1;
                    $studentName = "Long Student Name " . $admissionNo;

                    if ($i % 2 == 1)
                    {
                        echo "<tr class=\"alt\"><td>$admissionNo</td> <td>$studentName</td>";
                    }
                    else{
                        echo "<tr><td>$admissionNo</td> <td>$studentName</td>";
                    }

                    for($x = 0; $x < 5; $x++)
                    {
                        if ($x == 3) //Insert holiday logic
                        {
                            $cBox = "<td class=\"disabled\"></td>";
                        }
                        else
                        {
                            $cBox = "<td><input type=\"checkbox\" name=\"box" . $i . $x . "\" checked /></td>";
                        }
                        echo $cBox;
                    }
                    echo "</tr>";
                }
            ?>

        </table>
    </body>
</html>
<?php
    //Assign all Page Specific variables
    $fullPageHeight = 1400;
    $footerTop = $fullPageHeight + 100;

    $pageContent = ob_get_contents();
    ob_end_clean();
    $pageTitle= "Attendance";
    //Apply the template
    include("../Master.php");
?>

