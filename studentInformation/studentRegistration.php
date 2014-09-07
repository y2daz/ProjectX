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
require_once(THISROOT . "/common.php");
require_once(THISROOT . "/formValidation.php");
ob_start();


if (isset($_POST["submit"])) //User has clicked the submit button to add a student
{

    if(is_numeric($_POST["admissionID"]))
    {
        $operation = insertStudent($_POST["admissionID"], $_POST["name"], $_POST["dateOfBirth"], $_POST["race"], $_POST["religion"], $_POST["medium"], $_POST["address"], $_POST["grade"], $_POST["class"], $_POST["house"] );

        if($operation)
        {
            header("Location: parentDetailsForm.php");
            die();
        }
        else
        {
            echo "Error";
        }

    }

}




?>
    <html>
    <head>
        <style type=text/css>
            <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
            <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->

            h1{
                text-align: center;
            }

            .insert
            {
                position:absolute;
                left:40px;
                top: 100px;
            }


            .insert2 th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
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

    <div  id="general" style="">

    <h1>Student Registration Form</h1>
        </div>


        <form method="Post" class="insert">
        <table  cellspacing="0">
            <tr><th>General Information</th><th></th></tr>
            <tr>
                <td>Admission ID</td>
                <td><input name="admissionID" type="text" value="" required="true"></td>
            </tr>

            <tr>
                <td>Name With Initials</td>
                <td><input name="name" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td>Date of Birth</td>
                <td><input name="dateOfBirth" type="date" value="" required="true"></td>
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
            <tr>
                <td>Religion</td>
                <td><select name="religion" type="text" value="" required="true">
                        <option value="1">Buddhism</option>
                        <option value="2">Hinduism</option>
                        <option value="3">Islam</option>
                        <option value="4">Christianity</option>
                        <option value="5">Other</option>
                    </select></td>
            </tr>
            <tr>
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

                <td><input name="submit" class="button1" type="submit" value="Submit" onclick="window.location = 'parentDetailsForm.php'" required="true"></td>


            </tr>
        </table>
    </form>



    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Student Registration";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>