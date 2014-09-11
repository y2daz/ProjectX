<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
ob_start();

    if($_COOKIE["language"] == 1)
    {
        $gradetxt="වසර";
        $classtxt="පන්තිය";
        $dateFromtxt="දින සිට";
        $dateTotxt="දින දක්වා";
        $SubmitBtn="තහවුරු  කරන්න";
    }
    else
    {
        $gradetxt="Grade";
        $classtxt="Class";
        $dateFromtxt="Date From";
        $dateTotxt="Date To";
        $SubmitBtn="Submit";
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
                    <td><?php echo $gradetxt ?></td>
                    <td><input name="studentGrade" type="text" value=""required="true"></td>
                    <td><?php echo $classtxt ?></td>
                    <td><input name="studentClass" type="text" value=""></td>
                </tr>
                <tr>
                    <td><?php echo $dateFromtxt ?></td>
                    <td><input type="date" value=""></td>
                    <td><?php echo $dateTotxt ?></td>
                    <td><input type="date" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input class="button" type="button" value="<?php echo $SubmitBtn?>"></td>
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
include("../Master.php");
?>