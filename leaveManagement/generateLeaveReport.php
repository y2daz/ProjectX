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

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);

ob_start();




?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            .insert
            {
                position:absolute;
                left:40px;
                top: 100px;
            }

            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left
            ;
            }

            .insert td
            {
                padding:10px;
            }

            .insert input{
                font-weight:bold;
                font-size:15px;
            }

            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }


        </style>

        <script type="text/javascript">



        </script>

    </head>
    <body>

        <h1 align="center"> Generate Report </h1>

        <form method="post">

            <table class="insert">

                <tr><th> Search by </th></tr>

                <tr>
                    <td>
                        <input type="radio" name="radiobutton" value="Staff ID" id="StaffID" checked>By Staff ID
                        <input type="radio" name="radiobutton" value="Date" id="Date" >By Date
                        <input type="text" class="text1" name="SearchBy" value="">
                    </td>

                </tr>

            </table>

            <br>
            <br>
            <input type="submit" name="GenerateReport" value="Generate Report">
            <input type="reset" name="reset" align="center">
        </form>

    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Generate Leave Report";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>