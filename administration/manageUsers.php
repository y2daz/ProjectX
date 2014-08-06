<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 21:43
 *
 */
ob_start();
?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>




    </body>
    </html>
<?php

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Manage Users";

$pageContent = ob_get_contents();
ob_end_clean();
include("Master.php");
?>