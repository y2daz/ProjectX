<?php


require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
ob_start();

if(isset($_POST["submit"]))
{

}

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                position: absolute;
                left: 245px;
                top: 10px;
            }

            .checkStaff{
                position: absolute;
                left: 100px;
                top: 100px;
            }

            .submitButton{
                position: absolute;
                left: 220px;
                top: 140px;
            }


        </style>
    </head>
    <body>

    <h1>Check Approval Status</h1>

    <form method="post">

        <table class="checkStaff">
            <tr>
                <td>Staff ID : </td>
                <td><input type="text" name="StaffID" value=""</td>
            </tr>
        </table>

        <input type="submit" name="submit" value="Check" class="submitButton">

    </form>

    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Check Leave Status";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>