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
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");
ob_start();

?>
    <head>
        <style type=text/css>

            /*
            ADD YOUR CSS HERE
            */

        </style>
    </head>
    <body>




    </body>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>