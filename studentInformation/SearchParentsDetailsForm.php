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
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");

ob_start();

if(isset($_GET["id"]))
{
    $result = getParent($_GET["id"]);

    foreach($result as $row)
    {
        $Name = $row[0];
        $Occupation = $row[1];
        $PhoneLand = $row[2];
        $PhoneMobile = $row[3];
        $HomeAddress = $row[4];
        $OfficeAddress = $row[5];
    }
}
else
{
    $Name = "";
    $Occupation = "";
    $PhoneLand = "";
    $PhoneMobile = "";
    $HomeAddress = "";
    $OfficeAddress = "";
}



?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            .insert
            {
                position: absolute;
                left: 273px;
                top: 110px;

            }

            .insert td
            {
                height: 50px;
            }



        </style>
    </head>
    <body>

    <h1 align="center">Parent Details</h1>

    <table class="insert" cellspacing="0">

        <tr>
            <td>Name of the Parent</td>
            <td><input name="p_name" type="text" value="<?php echo $Name ?>"></td>
        </tr>
        <tr>
            <td>Occupation</td>
            <td><input name="occupation" type="text" value="<?php echo $Occupation ?>"></td>
        </tr>
        <tr>
            <td>Phone(Land)</td>
            <td><input name="p_number" type="text" value="<?php echo $PhoneLand ?>"></td>
        </tr>
        <tr>
            <td>Phone(Mobile)</td>
            <td><input name="m_number" type="text" value="<?php echo $PhoneMobile ?>"></td>
        </tr>
        <tr>
            <td>Address</td>
            <td><input name="address" type="text" value="<?php echo $HomeAddress ?>"></td>
        </tr>
        <tr>
            <td>Office Adress</td>
            <td><input name="o_address" type="text" value="<?php echo $OfficeAddress ?>"></td>
        </tr>

    </table>

    <input style="position: absolute; left: 600px; top: 500px" type="button" name="back" value="Back" onclick="window.location='SearchStudent.php'"

    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Parent Details";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>