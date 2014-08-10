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


if (isset($_POST["newUser"])) //User has clicked the submit button to add a user
{
    if(strcmp($_POST["txtPassword"], $_POST["txtConfirmPassword"]) == 0)
    {
        $operation = insertUser($_POST["txtEmail"], $_POST["txtPassword"], $_POST["txtAccessLevel"]);
    }
}
else
{

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
                padding: 5px;
            }
            .column{
                border: 1px solid #005e77;
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

            <form method="post">
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
                            echo "<td><input name=\"Reset" . "\" type=\"submit\" value=\"Reset\" formaction=\"manageUsers.php?reset=" . $row[0] . "\" /> </td> ";
                            echo "<td><input name=\"Delete"  . "\" type=\"submit\" value=\"Delete\" formaction=\"manageUsers.php?delete=" . $row[0] . "\" /> </td> ";
                            echo "</td></tr>";
                        }
                    ?>
                </table>
            </form>
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
                        <td class="column"><input type="text" name="txtEmail" required="true"  value="" class="txtEmail"/></td>
                        <td class="column">
                            <table>
                                <tr>
                                    <td><input type="text" name="txtPassword" required="true" value="Password" class="grayText"
                                               onfocus="remGrayText(this, 'Password')" onblur="makeGrayText(this, 'Password')"/></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="txtConfirmPassword" required="true" value="Confirm Password" class="grayText"
                                               onfocus="remGrayText(this, 'Confirm Password')" onblur="makeGrayText(this, 'Confirm Password')"/></td>
                                </tr>
                            </table>
                        </td>
                        <td class="column"><input type="text"  name="txtAccessLevel" value="" maxlength="1" class="txtAccessLevel"/></td>
                        <td class="column"><input type="submit" value="Submit" name="newUser" formaction=""></td>
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