﻿<?php
/**
 * Created by PhpStorm.
 * User: vimukthi
 * Date: 19/07/14
 * Time: 17:04
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
define('FULLPATH', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);


require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/common.php");


ob_start();

$currentStaffMembers="";

if (isset($_POST["Submit"])) //User has clicked the submit button to update staff
{

    $operation = Updatestaff($_POST["staffID"], $_POST["NamewithInitials"], $_POST["DateofBirth"], $_POST["Gender"], $_POST["NationalityRace"], $_POST["Religion"],$_POST["CivilStatus"],strtoupper($_POST["NICNumber"]), $_POST["MailDeliveryAddress"], $_POST["ContactNumber"], $_POST["DateAppointedasTeacherPrincipal"], $_POST["DatejoinedthisSchool"], $_POST["EmploymentStatus"],$_POST["Medium"], $_POST["PositioninSchool"], $_POST["Section"], $_POST["SubjectMostTaught"], $_POST["SubjectSecondMostTaught"], $_POST["ServiceGrade"], $_POST["Salary"]);

    if ($operation)
    {
        sendNotification("Staff Details successfully updated.", parse_url(FULLPATH, PHP_URL_PATH). "?" . $_SESSION["queryString"]);
    }
    else
    {
        sendNotification("Error updating information.");
    }
}
if( isset($_GET["staffID"]) )
{
    $staffID = $_GET["staffID"];

}
if( isset($_GET["NamewithInitials"]))
{
    $nameWithInitials = $_GET["NamewithInitials"];
}

if (isset($_GET["valueName"]) && isset($_GET["valueMember"]))
{
//    $operation = true;
    $operation = deleteStaff($_GET["valueMember"]);

    if ($operation == true){
        sendNotification("Staff member deleted.");
    }
}

if (!isset($_SESSION["queryString"])){
    $_SESSION["queryString"] = null;
}

$tableDetails = "none";
$tableViewTable = "none";
$fullPageHeight = 600;

if ( !isset( $_GET["Choice"] ) ){
    $_GET["Choice"] = "Staffid";
}

if (isset($_GET["search"]))
{
    $_SESSION["queryString"] = $_SERVER['QUERY_STRING'];

    $currentStaffMembers = null;

    if ($_GET["Choice"] == "Staffid")
    {
        $currentStaffMembers = searchStaff($_GET["query"]);
    }
    elseif($_GET["Choice"] == "Name")
    {
         $currentStaffMembers = searchstaffbyname($_GET["query"]);
    }
    elseif($_GET["Choice"] == "nicnumber")
    {
        $currentStaffMembers = searchstaffbynic($_GET["query"]);
    }
    elseif($_GET["Choice"] == "contactnumber")
    {
        $currentStaffMembers = searchstaffbycontactnumber($_GET["query"]);
    }
    else
    {
        $currentStaffMembers = getAllStaff();
    }

    $tableDetails= "none";
    $tableViewTable= "block";
}
else
{
    $currentStaffMembers = getAllStaff();
}

if (isset($_GET["expand"]))
{

    $result = getStaffMember($_GET["expand"]);

    $i = 0;

    foreach($result as $row) //
    {
        $staffid = $row[$i++];
        $NamewithInitials = $row[$i++];
        $DateofBirth = $row[$i++];
        $Gender = $row[$i++];
        $NationalityRace = $row[$i++];
        $staffReligion = $row[$i++];
        $CivilStatus = $row[$i++];
        $NICNumber = $row[$i++];
        $MailDeliveryAddress = $row[$i++];
        $ContactNumber = $row[$i++];
        $DateAppointedasTeacherPrincipal = $row[$i++];
        $DateJoinedthisSchool = $row[$i++];
        $EmploymentStatus = $row[$i++];
        $Medium = $row[$i++];
        $PositioninSchool = $row[$i++];
        $Section = $row[$i++];
        $SubjectMostTaught = $row[$i++];
        $SubjectSecondMostTaught = $row[$i++];
        $ServiceGrade = $row[$i++];
        $Salary = $row[$i++];
    }

    $fullPageHeight = 1500;

    $tableDetails= "block";
    $tableViewTable= "none";
}
else
{
    $staffid="";
    $NamewithInitials ="";
    $DateofBirth = "";
    $Gender = "";
    $NationalityRace = "";
    $staffReligion ="";
    $CivilStatus = "";
    $NICNumber = "";
    $MailDeliveryAddress ="";
    $ContactNumber = "";
    $DateAppointedasTeacherPrincipal ="";
    $DateJoinedthisSchool = "";
    $EmploymentStatus = "";
    $Medium ="";
    $PositioninSchool ="";
    $Section ="";
    $SubjectMostTaught ="";
    $SubjectSecondMostTaught ="";
    $ServiceGrade ="";
    $Salary ="";
}

?>
<html>
<head>
    <style type=text/css>

        h1{
            text-align: center;
        }
        h3{
            position: relative;
            left:50px;
        }
        #info{
            position: relative;
            left: 40px;
        }
        .viewTable{
            position: relative;
            border-collapse: collapse;
            left:50px;
            max-width: 875px;
            display: <?php echo $tableViewTable ?>;
        }
        .viewTable th{
            font-weight: 600;
            color:white;
            background-color: #005e77;
        }
        .viewtable tr{
        }
        .viewTable tr.alt{
            background-color: #bed9ff;
        }
        .viewTable td{
            padding-left: 10px;
            padding-right: 12px;
            padding-top: 4px;
            padding-bottom: 4px;
            min-width: 60px;
        }
        .details {
            position:absolute;
            left:10px;
            top:80px;
            max-width: 800px;
        }
        .details th{
            align:center;
            color:white;
            background-color: #005e77;
            height:25px;
            padding:5px;
        }
        .details td {
            padding:5px;
        }
        .labelCol{
            max-width: 100px;
            min-width: 100px;
        }
        .details {
            position: relative;
            top:0px;
            left: 40px;
            max-width:800px;
            height:150px;
            border-collapse: collapse;
            display: <?php echo $tableDetails ?>;
        }
        .details .number{
            max-width: 20px;
        }
        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:15px;
            right:-150px;
            top:100px;
        }
    </style>
    <script>
        $(document).ready( function(){
            $(".number").keyup();
        });

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
            changeId =  ( $(element).attr('id'));

            changeId = changeId.substr(6, changeId.length-6);

            toChange = document.getElementById(changeId);
            toChange.value = element.value;
        }
    }
    </script>

</head>
<?php
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

    $ALevel =  getLanguage('ALevel', $language);
    $OLevelandOther =  getLanguage('OLevelandOther', $language);
    $update =  getLanguage('update', $language);
    $search = getlanguage('search', $language);
    $expand = getLanguage('expand', $language);
    $delete = getLanguage('delete',$language);
    $searchby =getlanguage('searchby', $language);
?>
<body>
<h1> <?php echo getLanguage('searchStaffMember', $language) ?></h1>
<br />
<!--<h3>Search by</h3>-->

<form method="GET">

    <table id="info">
        <tr>
            <td colspan="2"><span id="selection"><?php echo getlanguage('searchBy', $language)?> : </span>
             <input type="text" class="text1" name="query" value="">
            </td>
            <td><input class="button" name="search" type="submit" value=<?php echo getlanguage('search', $language)?>></td>
        </tr>
        <tr><td></td><td>&nbsp;</td></tr>
        <tr>
            <td><label><input type="RADIO" name="Choice" value="Staffid" <?php echo ( strcmp( $_GET["Choice"], "Staffid" ) == 0 ?  "checked />" : " />" ) . getLanguage('staffID', $language)?></label> </td>
            <td><label><input type="RADIO" name="Choice" value="Name" <?php echo ( strcmp( $_GET["Choice"], "Name" ) == 0 ?  "checked />" : " />" ) . getLanguage('nameWithInitials', $language)?></label> </td>
            <td><label><input type="RADIO" name="Choice" value="nicnumber" <?php echo ( strcmp( $_GET["Choice"], "nicnumber" ) == 0 ?  "checked />" : " />" ) . getLanguage('nicNumber', $language)?></label> </td>
            <td><label><input type="RADIO" name="Choice" value="contactnumber" <?php echo ( strcmp( $_GET["Choice"], "contactnumber" ) == 0 ?  "checked />" : " />" ) . getLanguage('contactnumber', $language)?></label> </td>
        </tr>

    </table>
</form>
    <br />

<form method="post">
    <table class="viewTable">
        <tr>
            <th><?php echo getLanguage('staffID', $language)?></th>
            <th><?php echo getLanguage('nameWithInitials', $language)?></th>
            <th><?php echo getLanguage('nicNumber', $language)?></th>
            <th><?php echo getLanguage('contactnumber', $language)?></th>
            <th></th>
            <th></th>
        </tr>
        <?php
            $result = $currentStaffMembers;

            $i = 1;

            if (!isFilled($result))
            {
                $result = getAllStaff();
            }

            if (isFilled($result))
            {
                foreach($result as $row)
                {

                    echo "<tr><td>";
                    echo "$row[0]";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td><input name=\"Expand" . "\" type=\"submit\" value=\"Expand \"formaction=\"searchStaffDetails.php?expand=" . $row[0] . "\" /> </td> ";
                    echo "<td><input name=\"Delete"  . "\" type=\"button\" value=\"Delete \"onClick=\"requestConfirmation('Are you sure you want to delete this staff member?', "
                            . "'Delete Confirmation', 'Delete', '" . $row[0] . "'); \" /> </td> ";
                    echo "</td></tr>";
                    echo ($i++ % 5 == 0 ? "<tr class=\"blank\"><td colspan='6'>&nbsp;</td>" : "");
                }
            }

            if (isset($_GET["search"]))
            {
                $fullPageHeight = ( 600 + ($i * 28) );
            }

        ?>
    </table>
</form>

<form method="post">
    <table class="details" >
        <tr><th><?php echo $generalInformation?></th><th></th></tr>

        <tr>
            <td> <?php echo $staffID?> </td>
            <td > <input type = "text" name="staffID" readonly value="<?php echo $staffid?>" /> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $nameWithInitials?> </td>
            <td > <input type = "text" name="NamewithInitials" value="<?php echo $NamewithInitials?>"/> </td>
            <td></td>
        </tr>



        <tr>
            <td><?php echo $dateOfBirth?></td>
            <td > <input type = "text" name="DateofBirth" value="<?php echo $DateofBirth?>"/> </td>
            <td></td>
        </tr>

        <tr>
            <td><?php echo $gender?></td>
            <td>
                <input type="radio" name="Gender" value="1" <?php echo $temp = ( $Gender == 1 ? "checked" : "") ; ?> /><?php echo $male?>
                <input type="radio" name="Gender" value="2" <?php echo $temp = ( $Gender != 1 ? "checked" : "") ; ?> /><?php echo $female?>
            </td>
            <td></td>
        </tr>

        <tr>
            <td><?php echo $nationalityRace?></td>
            <td > <input class="number" id="NumberCb1" type = "text" name="NationalityRace" value="<?php echo $NationalityRace?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb1" name="" onchange="changeTextbox(this)">
                    <option value=""><?php echo "--"?></option>
                    <option value="1"><?php echo "1 - " . $sinhala?></option>
                    <option value="2"><?php echo "2 - " . $srilankantamil?></option>
                    <option value="3"><?php echo "3 - " . $indiantamil?></option>
                    <option value="4"><?php echo "4 - " . $srilankanmuslim?></option>
                    <option value="5"><?php echo "5 - " . $other?></option>
                </select>
            </td>
            <td></td>
        </tr>


        <tr>
            <td><?php echo $religion?></td>
            <td ><input class="number" id="NumberCb2" type = "text" name="Religion" value="<?php echo $staffReligion?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb2" name="" onchange="changeTextbox(this)">
                <option value=""><?php echo "--"?></option>
                <option value="1"><?php echo "1 - " .$buddhism?></option>
                <option value="2"><?php echo "2 - " .$hinduism?></option>
                <option value="3"><?php echo "3 - " .$islam?></option>
                <option value="4"><?php echo "4 - " .$catholic?></option>
                <option value="5"><?php echo "5 - " .$christianity?></option>
                <option value="6"><?php echo "6 - " .$other?></option>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $civilStatus?></td>
            <td > <input class="number" id="NumberCb3" type = "text" name="CivilStatus" value="<?php echo $CivilStatus?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb3" name="" onchange="changeTextbox(this)">
                <option value=""><?php echo "--"?></option>
                <option value="1"><?php echo "1 - " .$married?></option>
                <option value="2"><?php echo "2 - " .$unmarried?></option>
                <option value="3"><?php echo "3 - " .$widow?></option>
                <option value="4"><?php echo "4 - " .$other?></option>
                    </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $nicNumber?></td>
            <td > <input type = "text" name="NICNumber" value="<?php echo $NICNumber?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $maildeliveryaddress?></td>
            <td > <input type = "text" name="MailDeliveryAddress" value="<?php echo $MailDeliveryAddress?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $contactnumber?></td>
            <td > <input type = "text" name="ContactNumber" value="<?php echo $ContactNumber?>"/> </td>
            <td></td>
        </tr>

        <tr><th><?php echo $employmentInformation?></th><th></th></tr>
        <tr>
            <td><?php echo $dateAppointedAsTeacher?></td>
            <td > <input type ="text" name="DateAppointedasTeacherPrincipal" value="<?php echo $DateAppointedasTeacherPrincipal?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $dateJoinedSchool?></td>
            <td><input type="text" name="DatejoinedthisSchool" value="<?php echo $DateJoinedthisSchool?>"/> </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $employmentStatus?></td>
            <td > <input class="number" id="NumberCb4" type = "text" name="EmploymentStatus" value="<?php echo $EmploymentStatus?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb4" name="" onchange="changeTextbox(this)">
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
            <td></td>
        </tr>
        <tr>
            <td><?php echo $medium?></td>
            <td > <input class="number" id="NumberCb5" type = "text" name="Medium" value="<?php echo $Medium?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb5" name="" onchange="changeTextbox(this)">
                <option value=""><?php echo "--"?></option>
                <option value="1"><?php echo "1 - " .$sinhala?></option>
                <option value="2"><?php echo "2 - " .$tamil?></option>
                <option value="3"><?php echo "3 - " .$english?></option>
                    </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $positionInSchool?></td>
            <td > <input class="number" id="NumberCb6" type = "text" name="PositioninSchool" value="<?php echo $PositioninSchool?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb6" name="" onchange="changeTextbox(this)">
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
            <td></td>
        </tr>
        <tr>
            <td><?php echo $section?></td>
            <td ><input class="number" id="NumberCb7" type="text" name="Section" value="<?php echo $Section?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb7" name="" onchange="changeTextbox(this)">
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
            <td></td>
        </tr>
        <tr>
            <td><?php echo $subjectMostTaught?></td>
            <td><input id="NumberCb8" type="text" name="SubjectMostTaught" maxlength="2" value="<?php echo $SubjectMostTaught ?>"  required="true" class="number" onkeyup="changeTextbox(this)"/>
                <select id="Cb8"name="subjectMostTaught" type="text" value="" onchange="changeTextbox(this)">
                    <?php
                    echo "<option value=''>--</option>";
                    $allSubjects = getAllSubjects();
                    foreach($allSubjects as $singleSubject){
                        echo "<option value='" . $singleSubject[0] . "'>$singleSubject[0] - $singleSubject[1] </option>\n";
                    }
                    ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $subjectSecondMostTaught?></td>
            <td><input id="NumberCb9" type="text" name="SubjectSecondMostTaught" maxlength="2" value="<?php echo $SubjectSecondMostTaught?>"  required="true" class="number" onkeyup="changeTextbox(this)"/>
                <select id="Cb9"name="subjectSecondMostTaught" type="text" value="" onchange="changeTextbox(this)">
                    <?php
                    echo "<option value=''>--</option>";
                    foreach($allSubjects as $singleSubject){
                        echo "<option value='" . $singleSubject[0] . "'>$singleSubject[0] - $singleSubject[1] </option>\n";
                    }
                    ?>
                </select>
            </td>
            <td></td>
        </tr>
        <tr>
            <td><?php echo $serviceGrade?></td>
            <td > <input class="number" id="NumberCb10" type = "text" name="ServiceGrade" value="<?php echo $ServiceGrade?>" onkeyup="changeTextbox(this)"/>
                <select id="Cb10" name="" onchange="changeTextbox(this)">
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
            <td></td>
        </tr>
        <tr>
            <td><?php echo $salary?></td>
            <td><input type = "text" name="Salary" value="<?php echo $Salary?>"/></td>
            <td></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr>
            <td colspan="3" style="text-align: center"><input type="Submit" name="Submit" value=<?php echo getLanguage('update', $language)?>></td>
        </tr>
        </table>

        <br />
        <br />
        <br />
        <br />
        <br />
        <br />


    <br />
    <br />
    </form>

    <!--<table align="center">
        <tr>
            <td> <input type="button" value="Approve"> </td>
            <td > <input type="button" value="Reject">  </td>
        </tr>
    </table>-->

</body>
</html>
<?php
//Assign all Page Specific variables
//$fullPageHeight = 1300 + ($i * 18);
$footerTop = $fullPageHeight + 100;

$pageContent = ob_get_contents();
ob_end_clean();
$pageTitle= "Search Staff Details";
//Apply the template
include("../Master.php");
?>

