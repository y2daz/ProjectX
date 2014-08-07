<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 21:43
 *
 */

require_once("../formValidation.php");
require_once("../dbAccess.php");

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Manage Users";


?>
    <html>
    <head>
        <style type=text/css>
            h1{
                text-align: center;
            }
            .userList th{
                background-color: #005e77;
                color: white;
                padding-right: 10px;
                padding-left: 10px;
            }
            .userList .alt{
                background-color: #bed9ff;
            }
            .userList td{
                padding-right: 10px;
                padding-left: 10px;
                text-align: center;
            }



        </style>
    </head>
    <body>
        <h1>Manage Users</h1>

        <table class="userList" align="center">
            <tr>
                <th>Username</th>
                <th>Reset Password</th>
                <th>Delete User</th>
            </tr>

            <?php
                $result = getAllUsers();
                $i = 1;

                foreach($result as $row){
                    $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" : "<tr><td>";
                    echo $top;
                    echo "$row";
                    echo "<td><input name=\"Reset." . $row . "\" type=\"button\" value=\"Reset\" /> </td> ";
                    echo "<td><input name=\"Delete." . $row . "\" type=\"button\" value=\"Delete\" /> </td> ";
                    echo "</td></tr>";
                }

            ?>


        </table>


    </body>
    </html>
<?php
    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>