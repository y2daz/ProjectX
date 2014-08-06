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
            .insert{
                position:absolute;
                left:40px;
                top:80px;
            }
            .insert th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
            }
            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }
            .insert input{
                font-weight:bold;
                font-size:15px;
            }
            .insert td{
                padding:10px;
            }
        </style>
    </head>
    <body>
        <h1>Class-wise Attendance Report</h1>

        <form>

            <table class="insert" cellspacing="0">
                <tr><th>Class-wise Report</th><th></th></tr>
                <tr>
                    <td>Grade</td>
                    <td><input name="studentGrade" type="text" value=""></td>
                    <td>Class</td>
                    <td><input name="studentClass" type="text" value=""></td>
                </tr>
                <tr>
                    <td>Date from</td>
                    <td><input type="date" value=""></td>
                    <td>Date To</td>
                    <td><input type="date" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="button" type="button" value="Submit"></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php
//Assign all Page Specific variables
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "Class-wise Report";
//Apply the template
include("../Template.php");
?>