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
include(THISROOT . "/dbAccess.php");
ob_start();

?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>




    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Menu";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>