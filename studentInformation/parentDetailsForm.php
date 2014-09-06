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
require_once(THISROOT . "/common.php");

ob_start();




if (isset($_POST["submit"])) //User has clicked the submit button to add a student
{

    $operation = insertParent($_POST["admin_no"],$_POST["name"], $_POST["par_gur"], $_POST["p_name"],$_POST["occupation"], $_POST["p_number"], $_POST["m_number"], $_POST["address"], $_POST["o_address"] );

    if($operation)
    {
        sendNotification("Submitted Successfully!");
    }
    else
    {
        sendNotification("Error!");
    }

}

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            h1{
                text-align: center;
            }

            .insert
            {
                position:absolute;
                left:40px;
                top: 80px;
            }


            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
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

            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }



        </style>

    </head>
    <body>
<!--    <div class="main"> -->

        <h1>Parent Details Form</h1>

        <form method="post">
            <table class="insert" cellspacing="0">

                <tr class="alt">
                    <td>Admission Number</td>
                    <td><input name="admin_no" type="text" value=""></td>

                </tr>

                <tr class="alt">
                    <td>Name of The Student</td>
                    <td><input name="name" type="text" value=""></td>

                </tr>
                <tr>
                    <td>Parent/Guardian</td>

                    <td><select name="par_gur">
                            <option value="1">Parent </option>
                            <option value="2">Guardian </option>
                        </select></td>
                </tr>
                <tr>
                    <td>Name of the Parent</td>
                    <td><input name="p_name" type="text" value=""></td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td><input name="occupation" type="text" value=""></td>
                </tr>
                <tr>
                    <td>Phone(Land)</td>
                    <td><input name="p_number" type="text" value=""></td>
                </tr>

                <td>Phone(Mobile)</td>
                <td><input name="m_number" type="text" value=""></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input name="address" type="text" value=""></td>
                </tr>
                <tr>
                    <td>Office Adress</td>
                    <td><input name="o_address" type="text" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
    </table>
</form>
<!--    </div> -->


    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Parent Details";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>