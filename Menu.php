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
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
ob_start();


?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->


            #flag {
                position: relative;
                top: 50px;
                left: 90px;
            }
            #content {
                position: relative;
                top: 50px;
                width: 80%;
                left: 10%;
            }

        </style>
    </head>
    <body>


    <img id="flag" src="<?php echo THISPATHFRONT . "/images/DsFlag.jpg" ?>" />

    <p id="content"> D.S. Senanyake College is a public school in Sri Lanka, named after the first Prime Minister
        of Independent Sri Lanka, Rt.Hon. D.S. Senanayake. It was established on February 10, 1967 under the
        stewardship of R.I.T. Alles.</p>

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