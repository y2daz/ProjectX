<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
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

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Staff Report') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            .insert
            {
                position:absolute;
                left:40px;
                top: 100px;
            }

            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left
            ;
            }

            .insert td
            {
                padding:10px;
            }

            .insert input{
                font-weight:bold;
                font-size:15px;
            }

        </style>

        <script type="text/javascript">



        </script>

    </head>
    <body>

    <h1 align="center"> Generate Staff Member Report </h1>

    <form method="get" action="staffmemberreport.php">

        <table class="insert">

            <tr>
                <td>Enter Staff ID</td>
                <td>
                    <input type="text" class="text1" name="id" value="">
                </td>
            </tr>

        </table>

        <br>
        <br>

        <input type="submit" name="submit" value="Generate Report" style="position: absolute; left: 215px; top: 150px">



    </form>

    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Generate Individual Staff Report";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>