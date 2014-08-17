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

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            /*
            ADD YOUR CSS HERE
            */
            .general td{
                padding:5px 10px 5px 10px;

            }

        </style>
    </head>
    <body>
<!--    <div class="main"> -->

        <h1>Parent Details Form</h1>

        <form>
            <table class="general" cellspacing="0">
                <tr class="alt">
                    <td>Name of The Student</td>
                    <td><input type="text" value=""></td>

                </tr>
                <tr>
                    <td>Parent/Guardian</td>
                    <td><select type="text" value="">
                            <option>Parent</option>
                            <option>Guardian</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Name of the Parent</td>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <td>Phone(Land)</td>
                    <td><input type="text" value=""></td>
                </tr>

                <td>Phone(Mobile)</td>
                <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <td>Office Adress</td>
                    <td><input type="text" value=""></td>
                </tr>
                <tr>
                    <td></td>

                    <td><input class="button1" type="submit" value="Submit"></td>
                </tr>
    </table>
</form>
<!--    </div> -->


    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>