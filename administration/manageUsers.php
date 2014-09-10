<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 06/08/14
 * Time: 21:43
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");


ob_start();



if (isset($_POST["newUser"])) //User has clicked the submit button to add a user
{
    if(hasSpaces($_POST["txtEmail"]))
    {
        sendNotification("Illegal email address.");
    }
    elseif(strcmp($_POST["txtPassword"], $_POST["txtConfirmPassword"]) == 0)
    {
        $operation = insertUser($_POST["txtEmail"], $_POST["txtPassword"], $_POST["txtAccessLevel"]);
        if ($operation == 1)
            sendNotification("User added successfully.");
        else
            sendNotification("Error adding user.");
    }
}

if (isset($_POST["reset"])) //User has clicked a reset password button
{
    $operation = changePassword($_POST["user"], $_POST["newPassword"]);
    if ($operation == 1)
        sendNotification("Password changed successfully.");
    else
        sendNotification("Error changing password.");
}

if (isset($_POST["delete"])) //User has clicked a delete button
{
    $deletedEmail = $_POST["delete"];
    $operation = deleteUser($deletedEmail);

    if ($operation == 1)
        sendNotification("User deleted successfully.");
    else
        sendNotification("Error deleting user.");
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
            .userList .search{
                background-color: #D8FFBD;
            }
        </style>
        <script>

             function searchEmail(element){
//                 alert(element.value)
                var text = element.value;
                if (text.length >= 1){
                    $("td.searchEmail").closest('tr').removeClass("search");
                    $("td.searchEmail").filter(function() { return $.text([this]).indexOf(text) > -1; }).closest('tr').addClass("search");
                }
                else
                {
                    $("td.searchEmail").closest('tr').removeClass("search");
                }
             }
//             var s = "foo";
//             alert(s.indexOf("oo") > -1);
        </script>
    </head>
    <body>
        <h1>Manage Users</h1>

        <div id="content">

            <form method="post">
                <h2>User List</h2>
                <span>Search User: <input type="text" value="" onkeyup="searchEmail(this)"/></span>
                <p></p>
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

                        if ($result == null)
                        {
                            echo "<tr><td colspan='4'>There are no records to show.</td></tr>";
                        }
                        else
                        {
                            foreach($result as $row){
                                $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td class=\"searchEmail\">" : "<tr><td class=\"searchEmail\">";
                                echo $top;
                                echo "$row[0]";
                                echo "<td>$row[1]</td>";
                                echo "<td><input name=\"Reset\" type=\"button\" value=\"Reset\" onclick=\"resetPassword('" . $row[0] . "');\" /> </td> ";
                                echo "<td><input name=\"Delete\" type=\"button\" value=\"Delete\" onclick=\"post(document.URL, {'delete' : '" . $row[0] . "' }, 'post');\" /> </td> ";
                                echo "</td></tr>";

    //                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
    //                            post(document.URL, params, "post");
                            }
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
                        <td class="column"><input type="text" name="txtEmail" required="true"  value="" class="txtEmail" /></td>
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
                        <td class="column"><input type="Submit" value="Submit" name="newUser" formaction=""></td>
                    </tr>
                </table>
            </form>
        </div>
    </body>
    </html>
<?php

    $fullPageHeight = 560  + ($i * 35);
    $footerTop = $fullPageHeight + 100;
    $pageTitle= "Manage Users";


    $pageContent = ob_get_contents();
    ob_end_clean();
    require_once(THISROOT . "/Master.php");
?>