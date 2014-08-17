<?php
/**
 * Created by PhpStorm.
 * User: Madhu
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
ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";

if (isset($_POST["submit"])) //User has clicked the submit button to add a student
{
    //Validate
    //Insert to database
//    if (is_numeric( $_POST["admissionID"]))
//    {
    $operation = insertStudent($_POST["admissionID"], $_POST["name"], $_POST["race"], $_POST["religion"], $_POST["medium"], $_POST["address"], $_POST["grade"], $_POST["class"], $_POST["house"] );

    echo $operation;

//    header("Location: parentDetailsForm.php");
//    die();
//    }
}



?>
    <html>
    <head>
        <style type=text/css>
            <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
            <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            #general{
                /*width:50%;*/
                height:auto;
                text-align: center;
            }

            th{
                align:center;
                color:white;
                background-color: #005e77;
                height:20px;
                padding:5px;
                min-width: 350px;
            }

            td {
                padding:7px;
            }
            input.button1 {
                position:relative;
                font-weight:bold;
                font-size:15px;
                left:50px;
                top:10px;
            }
            input.button2 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                right:20px;
                top:10px;
            }
            input.button3 {
                position:relative;
                font-weight:bold;
                font-size:20px;
                left:20px;
                top:10px;
            }


        </style>
    </head>
    <body>

    <div  id="general" style="">

    <h1>Student Registration Form</h1>
        </div>


        <form method="Post">
        <table class="general" cellspacing="0">
            <tr><th>General Information</th><th></th></tr>
            <tr>
                <td>Admission ID</td>
                <td><input name="admissionID" type="text" value="" required="true"></td>
            </tr>

            <tr class="alt">
                <td>Name With Initials</td>
                <td><input name="name" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td>Nationality/Race</td>
                <td><select name="race" type="text" value="" required="true">
                        <option value="1">Sinhala</option>
                        <option value="2">Sri Lankan Tamil</option>
                        <option value="3">Indian Tamil</option>
                        <option value="4">Sri Lankan Muslim</option>
                        <option value="5">Other</option>
                    </select></td>
            </tr>
            <tr class="alt">
                <td>Religion</td>
                <td><select name="religion" type="text" value="" required="true">
                        <option value="1">Buddhism</option>
                        <option value="2">Hinduism</option>
                        <option value="3">Islam</option>
                        <option value="4">Christianity</option>
                        <option value="5">Other</option>
                    </select></td>
            </tr>
            <tr class="alt">
                <td>Medium</td>
                <td>
                    <input type="radio" name="medium" value="1">Sinhala
                    <input type="radio" name="medium" value="2">Tamil
                    <input type="radio" name="medium" value="3">English
                </td>
            </tr>
            <tr>
                <td>Address</td>
                <td><input name="address" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td>Grade/Year</td>
                <td><input name="grade" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td>Class</td>
                <td><input name="class" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td>House</td>
                <td><input name="house" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td></td>

                <td><input name="submit" class="button1" type="submit" value="Submit" required="true"></td>


            </tr>
        </table>
    </form>



    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>