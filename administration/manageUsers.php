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


if (isset($_POST["submit"])) //User has clicked the submit button
{
    //validate email.


}


?>
    <html>
    <head>
        <style type=text/css>
            h1{
                text-align: center;
            }
            #content{
                position: relative;
                left: 30px;
            }
            .userList{
                border: 1px solid #005e77;
                border-collapse: collapse;
                border-spacing: 0;
            }
            .userList th{
                background-color: #005e77;
                color: white;
                padding: 5px;
            }
            .userList .alt{
                background-color: #bed9ff;
            }
            .userList td{
                padding: 5px;
                text-align: center;
                border: 1px solid #005e77;
            }
            #newUser{
                border: 1px solid #005e77;
                border-collapse: collapse;
                border-spacing: 0;
            }
            #newUser th{
                color:white;
                background-color: #005e77;
                padding:5px;
            }
            #newUser td{
                text-align: center;
                vertical-align: middle;
            }
            .emailCol, .txtEmail{
                min-width: 250px;
            }
            .txtAccessLevel{
                width: 50px;
            }
        </style>
    </head>
    <body>
        <h1>Manage Users</h1>

        <div id="content">


            <h2>User List</h2>
            <table class="userList">
                <tr>
                    <th class="emailCol">Email</th>
                    <th>Access Level</th>
                    <th>Reset Password</th>
                    <th>Delete User</th>
                </tr>

                <?php
                    $result = getAllUsers();
                    $i = 1;

                    foreach($result as $row){
                        $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>" : "<tr><td>";
                        echo $top;
                        echo "$row[0]";
                        echo "<td>$row[1]</td>";
                        echo "<td><input name=\"Reset." . $row[0] . "\" type=\"button\" value=\"Reset\" /> </td> ";
                        echo "<td><input name=\"Delete." . $row[0] . "\" type=\"button\" value=\"Delete\" /> </td> ";
                        echo "</td></tr>";
                    }

                ?>
            </table>
            <br />
            <br />
            <h2>New User</h2>
            <form method="post">
                <table id="newUser">
                    <tr>
                        <th class="emailCol">Email</th>
                        <th>Password</th>
                        <th>Access Level</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td><input type="text"  required="true"  value="" class="txtEmail"/></td>
                        <td>
                            <table>
                                <tr>
                                    <td><input type="text"  required="true"  value="Password" class="txtPassword"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text"  required="true"  value="Confirm Password" class="txtPassword"/></td>
                                </tr>
                            </table>
                        </td>
                        <td><input type="text"   value="" maxlength="1" class="txtAccessLevel"/></td>
                        <td><input type="submit" value="Submit" name="Submit"></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
    </html>
<?php
    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>