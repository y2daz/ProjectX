<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 9/8/14
 * time: 11.49
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


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

    <p> TEST POST; PLEASE IGNORE.</p>



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