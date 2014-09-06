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
ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";



?>
    <html>
    <head>

        <script src="studentinformation.js"></script>

        <style type=text/css>
            <!--            #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
            <!--            #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->



            table {
                border-spacing:0px 5px;
            }

            #searchCriteria{
                position:relative;
                left:20px;
                top:20px;
            }

            th{
                align:center;
                color:white;
                background-color:#005e77;
                height:25px;
                padding:5px;
            }

            td {
                padding:5px;
            }

            #staffList{
                position: relative;
                top: 40px;
            }




            input.button {
                position:relative;
                font-weight:bold;
                font-size:20px;
                right:450px;
                top:50px;

            }
            <?php //Get language and make changes

                if($_COOKIE['language'] == 0)
                {
                    $AdmissionID = "AdmisionID";
                    $Name = "Name";
                    $Class = "Class";
                    $Medium = "Medium";
                    $DateOfBirth     = "DateOfBirth";

                }

                ?>





        </style>
    </head>
    <body>

    <h1 align="center">Search Student</h1>

    <form>



        <table style="height: 150px;" align="center">
            <tr class="alt">
                <td>

                    <input type="radio" name="choice" value="AdmissionID" onclick="clickedAdmissionID()"> By Admission ID
                    <input type="radio" name="choice" value="Name" onclick="clickedName()">By Name
                    <input type="radio" name="choice" value="Class" onclick="clickedClass()">By Class
                    <input type="radio" name="choice" value="Medium" onclick="clickedMedium()">By Medium
                    <input type="radio" name="choice" value="DateOfBirth" onclick="clickedDateOfBirth()">By Date of Birth

                </td>
            </tr>

            <tr>
                <td colspan="2"><span id="selection">Addmission ID:</span><input type="text" class="text1" name="SearchBy" value="">

            </tr>

        </table>

        <table>

            <tr>
                <td style="padding-left: 110px"><input type="button" name="Search" value="Search"></td>
            </tr>


        </table>

        <br>


        <table class="Searchedtable" align="center">
            <tr>
                <th>AdmisionID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Medium</th>
                <th>DateOfBirth</th>
                <th></th>
            </tr>
        </table>



    </form>




    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>