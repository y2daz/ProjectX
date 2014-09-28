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
            header("Location: parentDetailsForm.php?admissionNo=" . $_POST["admissionID"]);
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
    <?php
    $language = $_COOKIE['language'];
    $AdmissionNo =  getLanguage('AdmissionNo', $language);
    $nameWithInitials =  getLanguage('nameWithInitials', $language);
    $dateOfBirth =  getLanguage('dateOfBirth', $language);
    $nationalityRace =  getLanguage('nationalityRace', $language);
    $religion =  getLanguage('religion', $language);
    $Medium =  getLanguage('Medium', $language);
    $Address =  getLanguage('Address', $language);
    $Grade = getLanguage('grade',$language);
    $Class = getLanguage('class',$language);
    $sinhala =  getLanguage('sinhala', $language);
    $srilankantamil =  getLanguage('srilankantamil', $language);
    $indiantamil =  getLanguage('indiantamil', $language);
    $srilankanmuslim =  getLanguage('srilankanmuslim', $language);
    $other =  getLanguage('other', $language);
    $sinhala =  getLanguage('sinhala', $language);
    $tamil =  getLanguage('tamil', $language);
    $english =  getLanguage('english', $language);
    $buddhism =  getLanguage('buddhism', $language);
    $hinduism =  getLanguage('hindusm', $language);
    $islam =  getLanguage('islam', $language);
    $catholic =  getLanguage('catholic', $language);
    $christianity =  getLanguage('christianity', $language);
    $other =  getLanguage('other', $language);
    $generalInformation = getLanguage("generalInformation", $language);
    $submit =  getLanguage('submit', $language);

    ?>
    <body>

    <div  id="general" style="">

    <h1>Student Registration Form</h1>
        </div>


        <form method="Post" class="insert">
        <table  cellspacing="0">
            <tr><th><?php echo getLanguage('generalInformation', $language)?></th><th></th></tr>
            <tr>
                <td><?php echo getLanguage('AdmissionNo',$language)?></td>
                <td><input name="admissionID" type="text" value="" required="true"></td>
            </tr>

            <tr>
                <td><?php echo getLanguage('nameWithInitials', $language)?></td>
                <td><input name="name" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td><?php echo getLanguage('dateOfBirth', $language)?></td>
                <td><input name="dateOfBirth" type="date" value="" required="true"></td>
            </tr>
            <tr>
                <td><?php echo getLanguage('nationalityRace', $language)?></td>
                <td><select name="race" type="text" value="" required="true">
                        <option value=""><?php echo "--"?></option>
                        <option value="1"><?php echo "1 - " . $sinhala?></option>
                        <option value="2"><?php echo "2 - " . $srilankantamil?></option>
                        <option value="3"><?php echo "3 - " . $indiantamil?></option>
                        <option value="4"><?php echo "4 - " . $srilankanmuslim?></option>
                        <option value="5"><?php echo "5 - " . $other?></option>
                    </select></td>
            </tr>
            <tr>
                <td><?php echo getLanguage('religion', $language)?></td>
                <td><select name="religion" type="text" value="" required="true">
                        <option value=""><?php echo "--"?></option>
                        <option value="1"><?php echo "1 - " .$buddhism?></option>
                        <option value="2"><?php echo "2 - " .$hinduism?></option>
                        <option value="3"><?php echo "3 - " .$islam?></option>
                        <option value="4"><?php echo "4 - " .$catholic?></option>
                        <option value="5"><?php echo "5 - " .$christianity?></option>
                        <option value="6"><?php echo "6 - " .$other?></option>
                    </select></td>
            </tr>
            <tr>
                <td><?php echo getLanguage('Medium', $language)?></td>
                <td>
                    <input type="radio" name="medium" value=<?php echo getLanguage('sinhala', $language)?>>Sinhala
                    <input type="radio" name="medium" value=<?php echo getLanguage('tamil', $language)?>>Tamil
                    <input type="radio" name="medium" value=<?php echo getLanguage('english', $language)?>>English
                </td>
            </tr>
            <tr>
                <td><?php echo getlanguage('Address', $language)?></td>
                <td><input name="address" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td><?php echo getlanguage('grade',$language)?></td>
                <td><input name="grade" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td><?php echo getlanguage('class',$language)?></td>
                <td><input name="class" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td><?php echo getLanguage('house',$language)?></td>
                <td><input name="house" type="text" value="" required="true"></td>
            </tr>
            <tr>
                <td></td>

                <td><input name="submit" class="button1" type="submit" value=<?php echo getLanguage('submit', $language)?> required="true"></td>


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