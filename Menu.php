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
include(THISROOT . "/common.php");
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
ob_start();


if (isset($_GET["error"])){
    sendNotification("That just caused an error. Maybe you shouldn't try that again?");
}

?>
<html>
    <head>
        <style type=text/css>
<!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->


            #flag {
                position: relative;
                top: 15px;
                left: 25%;
                border: 5px solid black;
            }
            .content {
                position: relative;
                top: 0px;
                width: 80%;
                left: 10%;
                text-align: justify;
            }
            h1{
                text-align: center;
            }

        </style>
    </head>
    <body>


    <h1>Staff Management System</h1>

    <img id="flag" src="<?php echo THISPATHFRONT . "/images/dslogo.jpg" ?>" width="400px" />

    <br />
    <br />
    <p class="content"> D.S. Senanyake College is a public school in Sri Lanka, named after the first Prime Minister
        of Independent Sri Lanka, Rt.Hon. D.S. Senanayake. It was established on February 10, 1967 under the
        stewardship of R.I.T. Alles. </p>
<!--    <p class="content" > The Mana System was developed for D.S. Senanayake College Colombo to manage school information-->
<!--        by Students at SLIIT.</p>-->

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Menu";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>