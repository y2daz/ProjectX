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

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Staff Details System') ){
    header("Location: Menu.php?error=403");;
}
/**
 * Access Rights Management
 */


if (isset($_GET["getEdcationInformation"]))
{
    $currentStaffId = $_GET["staffID"];
}

?>
    <head>
        <style type=text/css>

            #info{
                position: relative;
                left: 40px;
            }
            #info  td{
                width: 100px;
                padding: 5px;
                text-align: left;
                margin-bottom: 10px;
            }
            .dataTable{
                position: relative;
                left: 40px;
            }

        </style>
    </head>
    <body>

        <h1>Education Information</h1>

        <form method="get">

            <table id="info">
                <tr>
                    <td><label>Staff ID</td>
                    <td><input type="text" class="text1" name="staffID" value="<?php echo ( isset($currentStaffId) ? $currentStaffId : "" ); ?>" /></td>
                    <td><input id="sbtGetInfor" type="submit" name="getEdcationInformation" value="Get Information" /></td>

                </tr>
                <tr <?php echo ( !isset($currentStaffName) ? "style='display:none'" : "" ); ?> >
                    <td>Teacher's Name</td>
                    <td colspan="2"><label class="text1"><?php echo $currentStaffName;?></label></td>
                </tr>
            </table>
        </form>

        <br />

        <table class="dataTable proQual">
            <tr>
                <th colspan="5"> Professional Qualifications </th>
            </tr>
            <?php

                echo "<tr>";
                echo "</tr>";
            ?>
        </table>
        <br />
        <table class="dataTable eduQual">
            <tr>
                <th colspan="5"> Educational Qualifications </th>
            </tr>
            <?php

            ?>
        </table>
        <br />
        <table class="dataTable courseOfStudy">
            <tr>
                <th colspan="5">Course Of Study</th>
            </tr>
            <?php

            ?>
        </table>



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