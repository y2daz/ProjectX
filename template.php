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
ob_start();
?>
<html>
    <head>
        <style type=text/css>
            #main{ height:800px }
            #footer{ top:600px }

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>

    <p> TEST POST; PLEASE IGNORE.</p>
<!--        ADD YOUR WEBPAGE HERE-->

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
require_once("Master.php");
?>