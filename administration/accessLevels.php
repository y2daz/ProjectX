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
            h1{
                text-align: center;
            }
            #roles{
                position: relative;
                left: 50px;
            }
            #permissions{
                position: relative;
                left: 50px;
                border: 1px solid #005e77;
                border-collapse: collapse;
                border-spacing: 0;
            }
            #permissions th{
                background-color: #005e77;
                color: white;
                padding: 5px;
            }
            #permissions td{
                padding: 2px 10px 2px 10px;
            }
        </style>
    </head>
    <body>
        <h1>Manage Access Levels</h1>

        <form method="get">
            <table id="roles">
                <tr>
                    <td>
                        <label>Select Role
                            <select name="role" onchange="submit()">
                                <?php
                                $allRoles = getRoles();

                                foreach($allRoles as $singleRole){
                                    if ($singleRole[0] == $_GET["role"]){
                                        echo "<option selected value='" . $singleRole[0] . "'>$singleRole[0] - $singleRole[1] </option>\n";
                                    }
                                    else{
                                        echo "<option value='" . $singleRole[0] . "'>$singleRole[0] - $singleRole[1] </option>\n";
                                    }
                                }
                                ?>
                            </select>
                        </label>
                    </td>
                </tr>
            </table>
        </form>

        <br />

        <table id="permissions">
            <tr>
                <th>Permission</th>
<!--                <th></th>-->
            </tr>
            <?php
            $allPermissions = getPermissions( (isset($_GET["role"])? $_GET["role"] : 1 ) );

            foreach($allPermissions as $singlePerm){
                echo "<tr><td><label><input type='checkbox' value='" . $singlePerm[1] . "' " .  ( isFilled($singlePerm[0]) ? "checked" : "") . " /> $singlePerm[2] </label></td></tr>\n";
            }
            ?>
        </table>

    </body>
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