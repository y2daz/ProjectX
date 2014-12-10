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
if( !$user->hasPerm("System Configuration") ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */


?>
    <head>
        <style type=text/css>
            #configTable{
                position: relative;
                left: 40px;
            }
        </style>
    </head>
    <body>
        <h1>System Configuration</h1>
        <br />

        <table id="configTable" class="dataTable">
            <tr>
                <th colspan="2" class="left">Leave Management</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td> Number of Casual Leave <td>
                <td>
                    <input class="mediumWidth right" type="number" name="noOfCasualLeave"  value="<?php echo getConfigData('noCasualLeave') ?>" />
                </td>
            </tr>
            <tr>
                <td> Number of Medical Leave<td>
                <td>
                    <input class="mediumWidth right" type="number" name="noOfMedicalLeave"  value="<?php echo getConfigData('noMedicalLeave') ?>" />
                </td>
            </tr>
            <tr>
                <td colspan="2" class="alt">&nbsp;
                </td>
            </tr>
            <tr>
                <th colspan="2" class="left">Year Plan</th>
                <th>&nbsp;</th>
            </tr>
            <tr>
                <td>Working Year<td>
                <td>
                    <input class="mediumWidth right" type="number" name="currentYear"  value="<?php echo getConfigData('currentYear') ?>" />
                </td>
            </tr>
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