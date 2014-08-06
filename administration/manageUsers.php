<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 21:43
 *
 */

require_once("../formValidation.php");
require_once("../dbAccess.php");

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


        </style>
    </head>
    <body>
        <h1>Manage Users</h1>

        <table>
            <tr>
                <th>Username</th>
                <th>Reset Password</th>
                <th>Delete User</th>
            </tr>

            <?php
                getAllUsers();
            ?>


        </table>


    </body>
    </html>
<?php

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Manage Users";

$pageContent = ob_get_contents();
ob_end_clean();
require_once("../Master.php");
?>