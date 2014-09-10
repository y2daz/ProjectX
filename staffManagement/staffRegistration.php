<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 6/8/14
 *
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");



require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");

ob_start();

if (isset($_POST["newStaff"])) //User has clicked the submit button to add a user
{
        $operation = insertStaffMember($_POST["staffID"], $_POST["nameWithInitials"], $_POST["dateOfBirth"], $_POST["gender"], $_POST["nationalityRace"], $_POST["religion"], $_POST["civilStatus"], $_POST["nicNumber"], $_POST["maildeliveryaddress"], $_POST["contactnumber"], $_POST["dateAppointedAsTeacher"], $_POST["dateJoinedSchool"], $_POST["employmentStatus"], $_POST["medium"], $_POST["positionInSchool"], $_POST["section"], $_POST["subjectMostTaught"], $_POST["subjectSecondMostTaught"], $_POST["serviceGrade"], $_POST["Salary"], $_POST["highestEducationalQualification"], $_POST["highestProfessionalQualification"], $_POST["courseOfStudy"]);
        echo $operation;

    if ($operation == 1)
    {
        sendNotification("Staff Member successfully added.");
    }
    else
    {
        sendNotification("Error inserting Staff Member information.");
    }
}



?>
<html>
    <head>
        <style type=text/css>
            h1{
                text-align:center;
            }
        table .general{
            border-spacing:0px 5px;
        }
        .general {
            position:absolute;
            left:10px;
            top:80px;
            max-width: 800px;
        }
        .general th{
            align:center;
            color:white;
            background-color: #005e77;
            height:25px;
            padding:5px;
        }
        .general td {
            padding:5px;
        }
        .labelCol{
            max-width: 100px;
            min-width: 100px;
        }
        input.button {
            position:relative;
            font-weight:bold;
            font-size:15px;
            right:450px;
            top:100px;
        }
        .number {
            width:40px;
        }
        </style>
        <script>
            function changeTextbox(element){
                var elementTag = element.tagName.toLowerCase();
                var changeId;

                if (elementTag == "select"){
                    changeId = "Number" + ($(element).attr('id'));

                    var toChange = document.getElementById(changeId);
                    toChange.value = element.value;
                }
                else
                {
                    changeId =  ($(element).attr('id'));

                    changeId = changeId.substr(6, changeId.length-6);

                    var toChange = document.getElementById(changeId);
                    toChange.value = element.value;
                }
            }
        </script>

    </head>
    <?php //Get language and make changes
        $language = $_COOKIE['language'];
        $generalInformation = getLanguage("generalInformation", $language);
        $employmentInformation =  getLanguage('employmentInformation', $language);
        $educationInformation =  getLanguage('educationInformation', $language);
        $staffID =  getLanguage('staffID', $language);
        $nameWithInitials =  getLanguage('nameWithInitials', $language);
        $dateOfBirth =  getLanguage('dateOfBirth', $language);

        $staffID =  getLanguage('staffID', $language);
        $nameWithInitials =  getLanguage('nameWithInitials', $language);
        $nameinfull =  getLanguage('nameinfull', $language);
        $dateOfBirth =  getLanguage('dateOfBirth', $language);
        $gender =  getLanguage('gender', $language);
        $nationalityRace =  getLanguage('nationalityRace', $language);
        $religion =  getLanguage('religion', $language);
        $civilStatus =  getLanguage('civilStatus', $language);
        $nicNumber =  getLanguage('nicNumber', $language);

        $male =  getLanguage('male', $language);
        $female =  getLanguage('female', $language);
        $sinhala =  getLanguage('sinhala', $language);
        $srilankantamil =  getLanguage('srilankantamil', $language);
        $indiantamil =  getLanguage('indiantamil', $language);
        $srilankanmuslim =  getLanguage('srilankanmuslim', $language);
        $other =  getLanguage('other', $language);

        $buddhism =  getLanguage('buddhism', $language);
        $hindusm =  getLanguage('hindusm', $language);
        $islam =  getLanguage('islam', $language);
        $catholic =  getLanguage('catholic', $language);
        $christianity =  getLanguage('christianity', $language);
        $other =  getLanguage('other', $language);
        $married =  getLanguage('married', $language);
        $unmarried =  getLanguage('unmarried', $language);
        $widow =  getLanguage('widow', $language);
        $other =  getLanguage('other', $language);

        $maildeliveryaddress =  getLanguage('maildeliveryaddress', $language);
        $contactnumber =  getLanguage('contactnumber', $language);
        $contactpersonforemergency =  getLanguage('contactpersonforemergency', $language);
        $contactnumberforemergency =  getLanguage('contactnumberforemergency', $language);
        $dateAppointedAsTeacher =  getLanguage('dateAppointedAsTeacher', $language);
        $dateJoinedSchool =  getLanguage('dateJoinedSchool', $language);
        $employmentStatus =  getLanguage('employmentStatus', $language);
        $medium =  getLanguage('medium', $language);
        $positionInSchool =  getLanguage('positionInSchool', $language);
        $section =  getLanguage('section', $language);
        $subjectMostTaught =  getLanguage('subjectMostTaught', $language);
        $subjectSecondMostTaught =  getLanguage('subjectSecondMostTaught', $language);
        $serviceGrade =  getLanguage('serviceGrade', $language);
        $salary =  getLanguage('salary', $language);

        $fulltime =  getLanguage('fulltime', $language);
        $parttime =  getLanguage('parttime', $language);
        $fulltime_Releasedtootherschool =  getLanguage('fulltime_Releasedtootherschool', $language);
        $fulltime_Broughtfromotherschool =  getLanguage('fulltime_Broughtfromotherschool', $language);
        $oncontract_Government =  getLanguage('oncontract_Government', $language);
        $paidfromschoolfees =  getLanguage('paidfromschoolfees', $language);
        $othergovernmentdepartment =  getLanguage('othergovernmentdepartment', $language);
        $sinhala =  getLanguage('sinhala', $language);
        $tamil =  getLanguage('tamil', $language);
        $english =  getLanguage('english', $language);

        $principal =  getLanguage('principal', $language);
        $actingprincipal =  getLanguage('actingprincipal', $language);
        $deputyprincipal =  getLanguage('deputyprincipal', $language);
        $actingdeputyprincipal =  getLanguage('actingdeputyprincipal', $language);
        $assistantprincipal =  getLanguage('assistantprincipal', $language);
        $actingassistantprincipal =  getLanguage('actingassistantprincipal', $language);
        $teacher =  getLanguage('teacher', $language);

        $PrimaryMultiple =  getLanguage('PrimaryMultiple', $language);
        $PrimaryEnglish =  getLanguage('PrimaryEnglish', $language);
        $PrimarySecondLanguage =  getLanguage('PrimarySecondLanguage', $language);
        $SecondaryScienceMaths =  getLanguage('SecondaryScienceMaths', $language);
        $SecondaryEnglish =  getLanguage('SecondaryEnglish', $language);
        $SecondaryArts =  getLanguage('SecondaryArts', $language);
        $SecondaryTechnology =  getLanguage('SecondaryTechnology', $language);
        $SecondarySecondLanguage =  getLanguage('SecondarySecondLanguage', $language);
        $SecondaryMultiple =  getLanguage('SecondaryMultiple', $language);
        $ALevelScienceMain =  getLanguage('ALevelScienceMain', $language);
        $ALevelArtsCommerce =  getLanguage('ALevelArtsCommerce', $language);
        $ALevelTechnology =  getLanguage('ALevelTechnology', $language);
        $ALevelOptional =  getLanguage('ALevelOptional', $language);
        $SpecialEducation =  getLanguage('SpecialEducation', $language);
        $InformationTechnology =  getLanguage('InformationTechnology', $language);
        $PrimarySupervisor =  getLanguage('PrimarySupervisor', $language);
        $SecondarySupervisor =  getLanguage('SecondarySupervisor', $language);
        $ALevelSupervisor =  getLanguage('ALevelSupervisor', $language);
        $Counselling =  getLanguage('Counselling', $language);
        $Library =  getLanguage('Library', $language);
        $HealthandPE =  getLanguage('healthAndPE', $language);
        $Optional =  getLanguage('Optional', $language);
        $Management =  getLanguage('Management', $language);
        $StaffAdvisorParttime =  getLanguage('StaffAdvisorParttime', $language);
        $StaffAdvisorFulltime =  getLanguage('StaffAdvisorFulltime', $language);
        $ReleasedtoOtherSchool =  getLanguage('ReleasedtoOtherSchool', $language);
        $Releasedtootherinstituteofficeservice =  getLanguage('Releasedtootherinstituteofficeservice', $language);
        $Onpaidleave =  getLanguage('Onpaidleave', $language);

        $SriLankaEducationAdministrativeServiceI =  getLanguage('SriLankaEducationAdministrativeServiceI', $language);
        $SriLankaEducationAdministrativeServiceII =  getLanguage('SriLankaEducationAdministrativeServiceII', $language);
        $SriLankaEducationAdministrativeServiceIII =  getLanguage('SriLankaEducationAdministrativeServiceIII', $language);
        $SriLankaPrincipalServiceI =  getLanguage('SriLankaPrincipalServiceI', $language);
        $SriLankaPrincipalService2I =  getLanguage('SriLankaPrincipalService2I', $language);
        $SriLankaPrincipalService2II =  getLanguage('SriLankaPrincipalService2II', $language);
        $SriLankaPrincipalService3 =  getLanguage('SriLankaPrincipalService3', $language);
        $SriLankaTeacherServiceI =  getLanguage('SriLankaTeacherServiceI', $language);
        $SriLankaTeacherService2I =  getLanguage('SriLankaTeacherService2I', $language);
        $SriLankaTeacherService2II =  getLanguage('SriLankaTeacherService2II', $language);
        $SriLankaTeacherService3I =  getLanguage('SriLankaTeacherService3I', $language);
        $SriLankaTeacherService3II =  getLanguage('SriLankaTeacherService3II', $language);
        $SriLankaTeacherServicePending =  getLanguage('SriLankaTeacherServicePending', $language);

        $highestEducationalQualification =  getLanguage('highestEducationalQualification', $language);
        $BelowOLevel =  getLanguage('belowOLevel', $language);
        $OLevel =  getLanguage('OLevel', $language);
        $ALevel =  getLanguage('ALevel', $language);
        $BABScBEd =  getLanguage('BABScBEd', $language);
        $MAMScMEd =  getLanguage('MAMScMEd', $language);
        $MPhil =  getLanguage('MPhil', $language);
        $PhD =  getLanguage('PhD', $language);

        $highestProfessionalQualification =  getLanguage('highestProfessionalQualification', $language);
        $PhDEd =  getLanguage('phDEd', $language);
        $MPhilEd =  getLanguage('mPhilEd', $language);
        $MEd =  getLanguage('mEd', $language);
        $MAinEd =  getLanguage('mAinEd', $language);
        $DipinEd =  getLanguage('dipinEd', $language);
        $MScinEdMgmt =  getLanguage('mScinEdMgmt', $language);
        $PGDipinEdMgmt =  getLanguage('pGDipinEdMgmt', $language);
        $PGDipinEASL =  getLanguage('pGDipinEASL', $language);
        $BNIEBEd =  getLanguage('bNIEBEd', $language);
        $DipinEASL =  getLanguage('dipinEASL', $language);
        $DipinLibrary =  getLanguage('dipinLibrary', $language);
        $CertinLibrary =  getLanguage('certinLibrary', $language);
        $PGDipinLibraryScience =  getLanguage('pGDipinLibraryScience', $language);
        $MScinLibrary =  getLanguage('mScinLibrary', $language);
        $DipinAgriculture =  getLanguage('dipinAgriculture', $language);
        $CertinTeacherTrainingInstitute =  getLanguage('certinTeacherTrainingInstitute', $language);
        $CertinTeacherTrainingAway =  getLanguage('certinTeacherTrainingAway', $language);
        $NatDipinTeaching =  getLanguage('natDipinTeaching', $language);
        $None =  getLanguage('None', $language);

        $courseOfStudy =  getLanguage('courseOfStudy', $language);
        $BscinEducation =  getLanguage('BscinEducation', $language);
        $BscinPhysics =  getLanguage('BscinPhysics', $language);
        $BscinBiology =  getLanguage('BscinBiology', $language);
        $BscinCombinedMathematics =  getLanguage('BscinCombinedMathematics', $language);
        $BScspecialisationinMathematics =  getLanguage('BScspecialisationinMathematics', $language);
        $PassedMathswithoutadegreeinscience =  getLanguage('PassedMathswithoutadegreeinscience', $language);
        $BscinAgriculture =  getLanguage('BscinAgriculture', $language);
        $BscinHomeScience =  getLanguage('BscinHomeScience', $language);
        $BscinIT =  getLanguage('BscinIT', $language);
        $BscinCommerceBusinessMgmtAccountingoequivalentDip =  getLanguage('bscinCommerceBusinessMgmtAccountingorequivalentDip', $language);
        $BscinSocialScience =  getLanguage('BscinSocialScience', $language);
        $BAinEasternMusicorequivalentDip =  getLanguage('BAinEasternMusicorequivalentDip', $language);
        $BAinArts =  getLanguage('BAinArts', $language);
        $BAinDancingorequivalentDip =  getLanguage('BAinDancingorequivalentDip', $language);
        $BADegreesorequivalent =  getLanguage('BADegreesorequivalent', $language);
        $BAinEnglishorequivalent =  getLanguage('BAinEnglishorequivalent', $language);
        $BAinaForeignLanguageexcludingEnglish =  getLanguage('BAinaForeignLanguageexcludingEnglish', $language);

        $IT =  getLanguage('IT', $language);
        $English =  getLanguage('English', $language);
        $Maths =  getLanguage('Maths', $language);
        $Science =  getLanguage('Science', $language);
        $ScienceandMaths =  getLanguage('ScienceandMaths', $language);
        $SocialStudies =  getLanguage('SocialStudies', $language);
        $Commerce =  getLanguage('Commerce', $language);
        $HomeScience =  getLanguage('HomeScience', $language);
        $BTecConstruction =  getLanguage('BTecConstruction', $language);
        $BTecMechanical =  getLanguage('BTecMechanical', $language);
        $BTecElectronicandElectrical =  getLanguage('BTecElectronicandElectrical', $language);
        $Arts =  getLanguage('Arts', $language);
        $Agriculture =  getLanguage('Agriculture', $language);
        $WesternMusic =  getLanguage('WesternMusic', $language);
        $EasternMusic =  getLanguage('EasternMusic', $language);
        $ArtsAgain =  getLanguage('ArtsAgain', $language);
        $Dancing =  getLanguage('Dancing', $language);
        $HealthandPhysicalEducation =  getLanguage('healthandPhysicalEducation', $language);
        $Buddhism =  getLanguage('Buddhism', $language);
        $hinduism =  getLanguage('hinduism', $language);
        $Islam =  getLanguage('Islam', $language);
        $RomanCatholicism =  getLanguage('RomanCatholicism', $language);
        $NonRomanCatholicism =  getLanguage('NonRomanCatholicism', $language);
        $SpecialEducation =  getLanguage('SpecialEducation', $language);
        $Sinhala =  getLanguage('Sinhala', $language);
        $Tamil =  getLanguage('Tamil', $language);
        $Arabic =  getLanguage('Arabic', $language);
        $PrimaryGeneral =  getLanguage('PrimaryGeneral', $language);
        $LibraryandInformationScience =  getLanguage('LibraryandInformationScience', $language);
        $TheatreandDrama =  getLanguage('TheatreandDrama', $language);
        $Other =  getLanguage('Other', $language);

        $Maths =  getLanguage('Maths', $language);
        $Science =  getLanguage('Science', $language);
        $ScienceandMaths =  getLanguage('ScienceandMaths', $language);
        $English =  getLanguage('English', $language);
        $Primary =  getLanguage('Primary', $language);
        $Religion =  getLanguage('Religion', $language);
        $SocialStudies =  getLanguage('SocialStudies', $language);
        $Commerce =  getLanguage('Commerce', $language);
        $Technology =  getLanguage('Technology', $language);
        $HomeScience =  getLanguage('HomeScience', $language);
        $Agriculture =  getLanguage('Agriculture', $language);
        $Sinhala =  getLanguage('Sinhala', $language);
        $Tamil =  getLanguage('Tamil', $language);
        $WesternMusic =  getLanguage('WesternMusic', $language);
        $EasternMusic =  getLanguage('EasternMusic', $language);
        $Dancing =  getLanguage('Dancing', $language);
        $Art =  getLanguage('Art', $language);
        $ForeignLanguageExcludingEnglish =  getLanguage('ForeignLanguageExcludingEnglish', $language);
        $Malay =  getLanguage('Malay', $language);
        $Other =  getLanguage('Other', $language);

        $Untrainedsomethingelse = "!Untrained something else";

        $Maths =  getLanguage('Maths', $language);
        $Science =  getLanguage('Science', $language);
        $ScienceandMaths =  getLanguage('ScienceandMaths', $language);
        $English =  getLanguage('English', $language);
        $Primary =  getLanguage('Primary', $language);
        $Religion =  getLanguage('Religion', $language);
        $SocialStudies =  getLanguage('SocialStudies', $language);
        $Commerce =  getLanguage('Commerce', $language);
        $Technology =  getLanguage('Technology', $language);
        $HomeScience =  getLanguage('HomeScience', $language);
        $Agriculture =  getLanguage('Agriculture', $language);
        $Sinhala =  getLanguage('Sinhala', $language);
        $Tamil =  getLanguage('Tamil', $language);
        $WesternMusic =  getLanguage('WesternMusic', $language);
        $EasternMusic =  getLanguage('EasternMusic', $language);
        $Dancing =  getLanguage('Dancing', $language);
        $Art =  getLanguage('Art', $language);
        $ForeignLanguageExcludingEnglish =  getLanguage('ForeignLanguageExcludingEnglish', $language);
        $Malay =  getLanguage('Malay', $language);
        $Other =  getLanguage('Other', $language);
        $graduateteacher =  getLanguage('graduateteacher', $language);
        $trainedteacher =  getLanguage('trainedteacher', $language);
        $untrainedteacher =  getLanguage('untrainedteacher', $language);
        $beginnerslevelteacher =  getLanguage('beginnerslevelteacher', $language);
        $Contractbaseandother =  getLanguage('ContractBasedandOther', $language);
        $Graduates =  getLanguage('Graduates', $language);
        $Graduates =  getLanguage('Graduates', $language);
        $ALevel =  getLanguage('ALevel', $language);
        $OLevelandOther =  getLanguage('OLevelandOther', $language);
        $submit =  getLanguage('submit', $language);
    ?>
    <body>

    <div class="front">

    <h1>Staff Registration Form</h1>

    <form onsubmit="" name="thisForm" method="post">
<!--    <div class="staffimage">-->
<!--        <img src="" alt="No any image">-->
<!--    </div>-->

    <table class="general" cellspacing="0">
        <tr><th class="labelCol" ><?php echo $generalInformation?></th>
            <th></th>
        </tr>
        <tr>
            <td><?php echo $staffID?></td>
            <td><input name="staffID" type="text" value="<?php echo getNewStaffId() ?>" readonly></td>
        </tr>
        <tr >
            <td><?php echo $nameWithInitials?></td>
            <td><input name="nameWithInitials" type="text" value="" required="true"></td>
            <td></td>
        </tr>

        <tr>
            <td><?php echo $dateOfBirth?></td>
            <td><input name="dateOfBirth" type="date" value="" required="true"></td>
            <td></td>
        </tr>
        <tr >
            <td><?php echo $gender?></td>
            <td>
                <input type="radio" name="gender" value="1"><?php echo $male?>
                <input type="radio" name="gender" value="2"><?php echo $female?>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $nationalityRace?></td>
            <td><input id="NumberCb1" type="text" name="nationalityRace" maxlength="1"  value=""  required="true" class="number" onchange="changeTextbox(this)" />
                            <select id="Cb1" name="" type="text" value="" onchange="changeTextbox(this)">
                                    <option value=""><?php echo "--"?></option>
                                    <option value="1"><?php echo "1 - " . $sinhala?></option>
                                    <option value="2"><?php echo "2 - " . $srilankantamil?></option>
                                    <option value="3"><?php echo "3 - " . $indiantamil?></option>
                                    <option value="4"><?php echo "4 - " . $srilankanmuslim?></option>
                                    <option value="5"><?php echo "5 - " . $other?></option>
                            </select>
            </td>
        </tr>
        <tr >
            <td><?php echo $religion?></td>
            <td><input id="NumberCb2" type="text" name="religion" maxlength="1" value="" required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb2" name="" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$buddhism?></option>
                    <option value="2"><?php echo "2 - " .$hinduism?></option>
                    <option value="3"><?php echo "3 - " .$islam?></option>
                    <option value="4"><?php echo "4 - " .$catholic?></option>
                    <option value="5"><?php echo "5 - " .$christianity?></option>
                    <option value="6"><?php echo "6 - " .$other?></option>
                </select>
            </td>
        </tr>
        <tr >
            <td><?php echo $civilStatus?></td>
            <td><input id="NumberCb3" type="text" name="civilStatus" maxlength="1" value="" required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb3"name="civilStatus" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$married?></option>
                    <option value="2"><?php echo "2 - " .$unmarried?></option>
                    <option value="3"><?php echo "3 - " .$widow?></option>
                    <option value="4"><?php echo "4 - " .$other?></option>

                </select>
            </td>
        </tr>
        <tr >
            <td><?php echo $nicNumber?></td>
            <td><input name="nicNumber" type="text" value="" required="true"></td>
        </tr>

        <tr >
            <td><?php echo $maildeliveryaddress?></td>
            <td><input name="maildeliveryaddress" type="text" size="55"  value="" required="true"></td>
        </tr>

        <tr >
            <td><?php echo $contactnumber?></td>
            <td><input name="contactnumber" type="text" value="" required="true"></td>
        </tr>

        <!--</table>

        <table class="employment" cellspacing="0"> -->
        <tr><th><?php echo $employmentInformation?></th><th></th></tr>
        <tr>
            <td><?php echo $dateAppointedAsTeacher?></td>
            <td><input name="dateAppointedAsTeacher" type="date" value="" required="true"></td>
        </tr>
        <tr >
            <td><?php echo $dateJoinedSchool?></td>
            <td><input name="dateJoinedSchool" type="date" value="" required="true"></td>
        </tr>

        <tr>
            <td><?php echo $employmentStatus?></td>
            <td><input id="NumberCb4" type="text" name="$employmentStatus" maxlength="1" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb4"name="employmentStatus" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$fulltime?></option>
                    <option value="2"><?php echo "2 - " .$parttime?></option>
                    <option value="3"><?php echo "3 - " .$fulltime_Releasedtootherschool?></option>
                    <option value="4"><?php echo "4 - " .$fulltime_Broughtfromotherschool?></option>
                    <option value="5"><?php echo "5 - " .$oncontract_Government?></option>
                    <option value="6"><?php echo "6 - " .$paidfromschoolfees?></option>
                    <option value="7"><?php echo "7 - " .$othergovernmentdepartment?></option>
                </select>

            </td>
        </tr>

        <tr>
            <td><?php echo $medium?></td>
            <td><input id="NumberCb5" type="text" name="nationalityRace" maxlength="1" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb5" name="medium" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$sinhala?></option>
                    <option value="2"><?php echo "2 - " .$tamil?></option>
                    <option value="3"><?php echo "3 - " .$english?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?php echo $positionInSchool?></td>
            <td><input id="NumberCb6" type="text" name="$positionInSchool" maxlength="1" value="" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb6" name="positionInSchool" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$principal?></option>
                    <option value="2"><?php echo "2 - " .$actingprincipal?></option>
                    <option value="3"><?php echo "3 - " .$deputyprincipal?></option>
                    <option value="4"><?php echo "4 - " .$actingdeputyprincipal?></option>
                    <option value="5"><?php echo "5 - " .$assistantprincipal?></option>
                    <option value="6"><?php echo "6 - " .$actingassistantprincipal?></option>
                    <option value="7"><?php echo "7 - " .$teacher?></option>
                </select>

            </td>
        </tr>
        <tr >
            <td><?php echo $section?></td>
            <td><input id="NumberCb7" type="text" name=" $section" maxlength="2" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb7" name="section" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$PrimaryMultiple?></option>
                    <option value="2"><?php echo "2 - " .$PrimaryEnglish?></option>
                    <option value="3"><?php echo "3 - " .$PrimarySecondLanguage?></option>
                    <option value="4"><?php echo "4 - " .$SecondaryScienceMaths?></option>
                    <option value="5"><?php echo "5 - " .$SecondaryEnglish?></option>
                    <option value="6"><?php echo "6 - " .$SecondaryArts?></option>
                    <option value="7"><?php echo "7 - " .$SecondaryTechnology?></option>

                    <option value="8"><?php echo "8 - " .$SecondarySecondLanguage?></option>
                    <option value="9"><?php echo "9 - " .$SecondaryMultiple?></option>
                    <option value="10"><?php echo "10 - " .$ALevelScienceMain?></option>
                    <option value="11"><?php echo "11 - " .$ALevelArtsCommerce?></option>
                    <option value="12"><?php echo "12 - " .$ALevelTechnology?></option>
                    <option value="13"><?php echo "13 - " .$ALevelOptional?></option>
                    <option value="14"><?php echo "14 - " .$SpecialEducation?></option>

                    <option value="15"><?php echo "15 - " .$InformationTechnology?></option>
                    <option value="16"><?php echo "16 - " .$PrimarySupervisor?></option>
                    <option value="17"><?php echo "17 - " .$SecondarySupervisor?></option>
                    <option value="18"><?php echo "18 - " .$ALevelSupervisor?></option>
                    <option value="19"><?php echo "19 - " .$Counselling?></option>
                    <option value="20"><?php echo "21 - " .$Library?></option>
                    <option value="21"><?php echo "22 - " .$HealthandPhysicalEducation?></option>

                    <option value="22"><?php echo "23 - " .$Optional?></option>
                    <option value="23"><?php echo "24 - " .$Management?></option>
                    <option value="24"><?php echo "25 - " .$StaffAdvisorParttime?></option>
                    <option value="25"><?php echo "26 - " .$StaffAdvisorFulltime?></option>
                    <option value="26"><?php echo "27 - " .$ReleasedtoOtherSchool?></option>
                    <option value="27"><?php echo "28 - " .$Releasedtootherinstituteofficeservice?></option>
                    <option value="28"><?php echo "29 - " .$Onpaidleave?></option>
                </select>

            </td>
        </tr>
        <tr>
            <td><?php echo $subjectMostTaught?></td>
            <td><input id="NumberCb8" type="text" name="$subjectMostTaught" maxlength="2" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb8"name="subjectMostTaught" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1">Maths</option>
                    <option value="2">Science</option>
                    <option value="3">English</option>
                    <option value="4">Information Technology</option>
                    <option value="5">History</option>
                    <option value="6">Sinhala</option>
                    <option value="7">Tamil</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?php echo $subjectSecondMostTaught?></td>
            <td><input id="NumberCb9" type="text" name="$subjectSecondMostTaugh" maxlength="2" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb9"name="subjectSecondMostTaught" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1">Maths</option>
                    <option value="2">Science</option>
                    <option value="3">English</option>
                    <option value="4">Information Technology</option>
                    <option value="5">History</option>
                    <option value="6">Sinhala</option>
                    <option value="7">Tamil</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><?php echo $serviceGrade?></td>
            <td><input id="NumberCb10" type="text" name="$serviceGrade" maxlength="2" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb10" name="serviceGrade" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$SriLankaEducationAdministrativeServiceI?></option>
                    <option value="2"><?php echo "2 - " .$SriLankaEducationAdministrativeServiceII?></option>
                    <option value="3"><?php echo "3 - " .$SriLankaEducationAdministrativeServiceIII?></option>
                    <option value="4"><?php echo "4 - " .$SriLankaPrincipalServiceI?></option>
                    <option value="5"><?php echo "5 - " .$SriLankaPrincipalService2I?></option>
                    <option value="6"><?php echo "6 - " .$SriLankaPrincipalService2II?></option>
                    <option value="7"><?php echo "7 - " .$SriLankaPrincipalService3?></option>
                    <option value="8"><?php echo "8 - " .$SriLankaTeacherServiceI?></option>
                    <option value="9"><?php echo "9 - " .$SriLankaTeacherService2I?></option>
                    <option value="10"><?php echo "10 - " .$SriLankaTeacherService2II?></option>
                    <option value="11"><?php echo "11 - " .$SriLankaTeacherService3I?></option>
                    <option value="12"><?php echo "12 - " .$SriLankaTeacherService3II?></option>
                    <option value="13"><?php echo "13 - " .$SriLankaTeacherServicePending?></option>
                </select>
            </td>
        </tr>
        <tr >
            <td><?php echo $salary?></td>
            <td><input name="Salary" type="text" value="" required="true"></td>
        </tr>

        <!-- </table>

        <table class="education" cellspacing="0">-->
        <tr><th><?php echo $educationInformation?></th><th></th></tr>
        <tr>
            <td><?php echo $highestEducationalQualification?></td>
            <td><input id="NumberCb11" type="text" name="$highestEducationalQualification" maxlength="1" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
            <select id="Cb11"name="highestEducationalQualification" type="text" value="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$BelowOLevel?></option>
                    <option value="2"><?php echo "2 - " .$OLevel?></option>
                    <option value="3"><?php echo "3 - " .$ALevel?></option>
                    <option value="4"><?php echo "4 - " .$BABScBEd?></option>
                    <option value="5"><?php echo "5 - " .$MAMScMEd?></option>
                    <option value="6"><?php echo "6 - " .$MPhil?></option>
                    <option value="7"><?php echo "7 - " .$PhD?></option>

                </select>
            </td>
        </tr>
        <tr >
            <td><?php echo $highestProfessionalQualification?></td>
            <td><input id="NumberCb12" type="text" name="$highestProfessionalQualification" maxlength="2" value="" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb12" name="highestProfessionalQualification" type="text" value="" onchange="changeTextbox(this)">

                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " .$PhDEd?></option>
                    <option value="2"><?php echo "2 - " .$MPhilEd?></option>
                    <option value="3"><?php echo "3 - " .$MEd?></option>
                    <option value="4"><?php echo "4 - " .$MAinEd?></option>
                    <option value="5"><?php echo "5 - " .$DipinEd?></option>
                    <option value="6"><?php echo "6 - " .$MScinEdMgmt?></option>
                    <option value="7"><?php echo "7 - " .$PGDipinEdMgmt?></option>
                    <option value="8"><?php echo "8 - " .$PGDipinEASL ?></option>
                    <option value="9"><?php echo "9 - " .$BNIEBEd  ?></option>
                    <option value="10"><?php echo "10 - " .$DipinEASL?></option>
                    <option value="11"><?php echo "11 - " .$DipinLibrary?></option>
                    <option value="12"><?php echo "12 - " .$CertinLibrary?></option>
                    <option value="13"><?php echo "13 - " .$PGDipinLibraryScience?></option>
                    <option value="14"><?php echo "14 - " .$MScinLibrary?></option>
                    <option value="15"><?php echo "15 - " .$DipinAgriculture?></option>
                    <option value="16"><?php echo "16 - " .$CertinTeacherTrainingInstitute?></option>
                    <option value="17"><?php echo "17 - " .$CertinTeacherTrainingAway?></option>
                    <option value="18"><?php echo "18 - " .$NatDipinTeaching?></option>
                    <option value="19"><?php echo "19 - " .$None?></option>

                </select>
            </td>
        </tr>
        <tr>
            <td><?php echo $courseOfStudy?></td>
            <td><input id="NumberCb13" type="text" name="$courseOfStudy" maxlength="2" value=""  required="true" class="number" onchange="changeTextbox(this)"/>
                <select id="Cb13" name="courseOfStudy" type="text" value="" onchange="changeTextbox(this)">

                    <optgroup label="Graduate Teachers">
                        <option value=""><?php echo "--"?></option>
                        <option value="1"><?php echo "1 - " .$BscinEducation?></option>
                        <option value="2"><?php echo "2 - " .$BscinPhysics?></option>
                        <option value="3"><?php echo "3 - " .$BscinBiology?></option>
                        <option value="4"><?php echo "4 - " .$BscinCombinedMathematics?></option>
                        <option value="5"><?php echo "5 - " .$BScspecialisationinMathematics?></option>
                        <option value="6"><?php echo "6 - " .$PassedMathswithoutadegreeinscience?></option>
                        <option value="7"><?php echo "7 - " .$BscinAgriculture?></option>
                        <option value="8"><?php echo "8 - " .$BscinHomeScience?></option>
                        <option value="9"><?php echo "9 - " .$BscinIT?></option>
                        <option value="10"><?php echo "10 - " .$BscinCommerceBusinessMgmtAccountingoequivalentDip?></option>
                        <option value="11"><?php echo "11 - " .$BscinSocialScience?></option>
                        <option value="12"><?php echo "12 - " .$BAinEasternMusicorequivalentDip?></option>
                        <option value="13"><?php echo "13 - " .$BAinArts?></option>
                        <option value="14"><?php echo "14 - " .$BAinDancingorequivalentDip?></option>
                        <option value="15"><?php echo "15 - " .$BADegreesorequivalent?></option>
                        <option value="16"><?php echo "16 - " .$BAinEnglishorequivalent?></option>
                        <option value="17"><?php echo "17 - " .$BAinaForeignLanguageexcludingEnglish?></option>
                    </optgroup>
                    <optgroup label="Trained Teachers">
                        <option value="19"><?php echo "19 - " .$IT?></option>
                        <option value="20"><?php echo "20 - " .$English?></option>
                        <option value="21"><?php echo "21 - " .$Maths?></option>
                        <option value="22"><?php echo "22 - " .$Science?></option>
                        <option value="23"><?php echo "23 - " .$ScienceandMaths?></option>
                        <option value="24"><?php echo "24 - " .$SocialStudies?></option>
                        <option value="25"><?php echo "25 - " .$Commerce?></option>
                        <option value="26"><?php echo "26 - " .$HomeScience?></option>
                        <option value="27"><?php echo "27 - " .$BTecConstruction?></option>
                        <option value="28"><?php echo "28 - " .$BTecMechanical?></option>
                        <option value="29"><?php echo "29 - " .$BTecElectronicandElectrical?></option>
                        <option value="30"><?php echo "30 - " .$Arts?></option>
                        <option value="31"><?php echo "31 - " .$Agriculture?></option>
                        <option value="32"><?php echo "32 - " .$WesternMusic?></option>
                        <option value="33"><?php echo "33 - " .$EasternMusic?></option>
                        <option value="34"><?php echo "34 - " .$ArtsAgain?></option>
                        <option value="35"><?php echo "35 - " .$Dancing?></option>
                        <option value="36"><?php echo "36 - " .$HealthandPhysicalEducation?></option>
                        <option value="37"><?php echo "37 - " .$Buddhism?></option>
                        <option value="38"><?php echo "38 - " .$hinduism?></option>
                        <option value="39"><?php echo "39 - " .$Islam?></option>
                        <option value="40"><?php echo "40 - " .$RomanCatholicism?></option>
                        <option value="41"><?php echo "41 - " .$NonRomanCatholicism?></option>
                        <option value="42"><?php echo "42 - " .$SpecialEducation?></option>
                        <option value="43"><?php echo "43 - " .$Sinhala?></option>
                        <option value="44"><?php echo "44 - " .$Tamil?></option>
                        <option value="45"><?php echo "45 - " .$Arabic?></option>
                        <option value="46"><?php echo "46 - " .$PrimaryGeneral?></option>
                        <option value="47"><?php echo "47 - " .$LibraryandInformationScience?></option>
                        <option value="48"><?php echo "48 - " .$TheatreandDrama?></option>
                        <option value="49"><?php echo "49 - " .$Other?></option>
                    </optgroup>
                    <optgroup label="Untrained Teachers">
                        <option value="50"><?php echo "50 - " .$Maths?></option>
                        <option value="51"><?php echo "51 - " .$Science?></option>
                        <option value="52"><?php echo "52 - " .$ScienceandMaths?></option>
                        <option value="53"><?php echo "53 - " .$English?></option>
                        <option value="54"><?php echo "54 - " .$Primary?></option>
                        <option value="55"><?php echo "55 - " .$Religion?></option>
                        <option value="56"><?php echo "56 - " .$SocialStudies?></option>
                        <option value="57"><?php echo "57 - " .$Commerce?></option>
                        <option value="58"><?php echo "58 - " .$Technology?></option>
                        <option value="59"><?php echo "59 - " .$HomeScience?></option>
                        <option value="60"><?php echo "59 - " .$Agriculture ?></option>
                        <option value="61"><?php echo "61 - " .$Sinhala?></option>
                        <option value="62"><?php echo "62 - " .$Tamil?></option>
                        <option value="63"><?php echo "63 - " .$WesternMusic?></option>
                        <option value="64"><?php echo "64 - " .$EasternMusic?></option>
                        <option value="65"><?php echo "65 - " .$Dancing?></option>
                        <option value="66"><?php echo "66 - " .$Art?></option>
                        <option value="67"><?php echo "67 - " .$ForeignLanguageExcludingEnglish?></option>
                        <option value="68"><?php echo "68 - " .$Malay?></option>
                        <option value="69"><?php echo "69 - " .$Other?></option>
                    </optgroup>
                    <optgroup label="Newly appointed Teachers">
                        <option value="75"><?php echo "75 - " .$Maths?></option>
                        <option value="76"><?php echo "76 - " .$Science?></option>
                        <option value="77"><?php echo "77 - " .$ScienceandMaths?></option>
                        <option value="78"><?php echo "78 - " .$English?></option>
                        <option value="79"><?php echo "79 - " .$Primary?></option>
                        <option value="80"><?php echo "80 - " .$Religion?></option>
                        <option value="81"><?php echo "81 - " .$SocialStudies?></option>
                        <option value="82"><?php echo "82 - " .$Commerce?></option>
                        <option value="83"><?php echo "83 - " .$Technology?></option>
                        <option value="84"><?php echo "84 - " .$HomeScience?></option>
                        <option value="85"><?php echo "85 - " .$Agriculture ?></option>
                        <option value="86"><?php echo "86 - " .$Sinhala?></option>
                        <option value="87"><?php echo "87 - " .$Tamil?></option>
                        <option value="88"><?php echo "88 - " .$WesternMusic?></option>
                        <option value="89"><?php echo "89 - " .$EasternMusic?></option>
                        <option value="90"><?php echo "90 - " .$Dancing?></option>
                        <option value="91"><?php echo "91 - " .$Art?></option>
                        <option value="92"><?php echo "92 - " .$ForeignLanguageExcludingEnglish?></option>
                        <option value="93"><?php echo "93 - " .$Malay?></option>
                        <option value="94"><?php echo "94 - " .$Other?></option>


                        <option value="97"><?php echo "97- " .$Graduates?></option>
                        <option value="98"><?php echo "98 - " .$ALevel?></option>
                        <option value="99"><?php echo "99 - " .$OLevelandOther?></option>
                    </optgroup>
                </select>
            </td>
            <td><input class="button" name="newStaff" type="submit" value="Submit"></td>
        </tr>
    </table>


    </form>
    </div>
    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1400;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Staff Registration";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>