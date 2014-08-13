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

$fullPageHeight = 1400;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";

if (isset($_POST["newStaff"])) //User has clicked the submit button to add a user
{
        $operation = insertStaffMember($_POST["staffID"], $_POST["nameWithInitials"], $_POST["dateOfBirth"], $_POST["gender"], $_POST["nationalityRace"], $_POST["religion"], $_POST["civilStatus"], $_POST["nicNumber"], $_POST["maildeliveryaddress"], $_POST["contactnumber"], $_POST["dateAppointedAsTeacher"], $_POST["dateJoinedSchool"], $_POST["employmentStatus"], $_POST["medium"], $_POST["positionInSchool"], $_POST["section"], $_POST["subjectMostTaught"], $_POST["subjectSecondMostTaught"], $_POST["serviceGrade"], $_POST["Salary"], $_POST["highestEducationalQualification"], $_POST["highestProfessionalQualification"], $_POST["courseOfStudy"]);
        echo $operation;

}


?>
<html>
    <head>
        <style type=text/css>
        table {
            border-spacing:0px 5px;
        }

        .general {
            position:absolute;
            left:10px;
            top:80px;
        }

        th{
            align:center;
            color:white;
            background-color: #005e77;
            height:25px;
            padding:5px;
            min-width: 200px;
        }

        td {
            padding:5px;
        }

        .staffimage{
            position:absolute;
            height:160px;
            width:150px;
            top:130px;
            left:560px;
            background-color: #005e77;
            z-index:0;
        }
        .staffimage img
        {
            position:absolute;
            top:4px;
            left:4px;
            width:142px;
            height:150px;
        }

        input.button {
            position:relative;
            font-weight:bold;
            font-size:20px;
            right:450px;
            top:50px;


        </style>
    </head>
    <?php //Get language and make changes

    if($_COOKIE['language'] == 0)
    {
        $generalInformation = "General Information";
        $employmentInformation = "Employment Information";
        $educationInformation = "Education Information";

        $staffID = "Staff ID";
        $nameWithInitials = "Name with Initials";
        $dateOfBirth = "Date of Birth";

        $staffID = "Staff ID";
        $nameWithInitials = "Name with Initials";
        $nameinfull="Name in Full";
        $dateOfBirth = "Date of Birth";
        $gender = "Gender";
        $nationalityRace = "Nationality/Race";
        $religion = "Religion";
        $civilStatus = "Civil Status";
        $nicNumber = "NIC Number";

        $male = "Male";
        $female = "Female";

        $sinhala = "Sinhala";
        $srilankantamil ="Sri Lankan Tamil";
        $indiantamil = "Indian Tamil";
        $srilankanmuslim = "Sri Lankan Muslim";
        $other = "Other";

        $buddhism="Buddhism";
        $hindusm="Hindusm";
        $islam="Islam";
        $catholic="Catholic";
        $christianity="Christianity";
        $other = "Other";

        $married="Married";
        $unmarried="Not Married";
        $widow="Widow";
        $other="Other";

        $maildeliveryaddress="Mail Delivery Address";
        $contactnumber="Contact Number";
        $contactpersonforemergency ="Conatct Person for Emergency";
        $contactnumberforemergency ="Conatct Number for Emergency";

        $dateAppointedAsTeacher = "Date Appointed as Teacher/Principal";
        $dateJoinedSchool = "Date Joined this School";
        $employmentStatus = "Employment Status";
        $medium = "Medium";
        $positionInSchool = "Position in School";
        $section = "Section";
        $subjectMostTaught = "Subject Most Taught";
        $subjectSecondMostTaught = "Subject Second Most Taught";
        $serviceGrade = "Service Grade";
        $salary = "Salary";

        $fulltime="Full Time";
        $parttime="Part Time";
        $fulltime_Releasedtootherschool="Full Time (Released to other School)";
        $fulltime_Broughtfromotherschool="Full Time (Brought from other School)";
        $oncontract_Government="On Contract (Government)";
        $paidfromschoolfees="Paid from School Fees";
        $othergovernmentdepartment="Other government department";

        $sinhala="Sinhala";
        $tamil="Tamil";
        $english="English after 2001";


        $principal="Principal";
        $actingprincipal="Acting Principal";
        $deputyprincipal="Deputy Principal";
        $actingdeputyprincipal="Acting Deputy Principal";
        $assistantprincipal="Assistant Principal";
        $actingassistantprincipal="Acting Assistant Principal";
        $teacher="Teacher";

        $PrimaryMultiple="Primary Multiple";
        $PrimaryEnglish="Primary English";
        $PrimarySecondLanguage="Primary Second Language";
        $SecondaryScienceMaths="Secondary Science/Maths";
        $SecondaryEnglish="Secondary English";
        $SecondaryArts="Secondary Arts";
        $SecondaryTechnology="Secondary Technology";
        $SecondarySecondLanguage="Secondary Second Language";
        $SecondaryMultiple="Secondary Multiple";
        $ALevelScienceMain="A/Level Science Main";
        $ALevelArtsCommerce="A/Level Arts/Commerce";
        $ALevelTechnology="A/Level Technology";
        $ALevelOptional="A/Level Optional";
        $SpecialEducation="Special Education";
        $InformationTechnology="Information Technology";
        $PrimarySupervisor="Primary Supervisor";
        $SecondarySupervisor="Secondary Supervisor";
        $ALevelSupervisor="A/Level Supervisor";
        $Counselling="Counselling";
        $Library="Library";
        $HeathandPE="HeathandP.E.";
        $Optional="Optional";
        $Management="Management";
        $StaffAdvisorParttime="staffAdvisor(Part-Time)";
        $StaffAdvisorFulltime="StaffAdvisor(Full-Time)";
        $ReleasedtoOtherSchool="Released to OtherSchool";
        $Releasedtootherinstituteofficeservice="Released to other institute/office/service";
        $Onpaidleave="On paid leave";

        $SriLankaEducationAdministrativeServiceI="Sri Lanka Education Administrative Service I";
        $SriLankaEducationAdministrativeServiceII="Sri Lanka Education Administrative Service II";
        $SriLankaEducationAdministrativeServiceIII="Sri Lanka Education Administrative Service III";
        $SriLankaPrincipalServiceI="Sri Lanka Principal Service I";
        $SriLankaPrincipalService2I="Sri Lanka Principal Service 2-I";
        $SriLankaPrincipalService2II="Sri Lanka Principal Service 2-II";
        $SriLankaPrincipalService3="Sri Lanka Principal Service 3";
        $SriLankaTeacherServiceI="Sri Lanka Teacher Service I";
        $SriLankaTeacherService2I="Sri Lanka Teacher Service 2-I";
        $SriLankaTeacherService2II="Sri Lanka Teacher Service 2-II";
        $SriLankaTeacherService3I="Sri Lanka Teacher Service 3-I";
        $SriLankaTeacherService3II="Sri Lanka Teacher Service 3-II";
        $SriLankaTeacherServicePending="Sri Lanka Teacher Service (Pending)";

        $highestEducationalQualification = "Highest Educational Qualification";

        $BelowOLevel= "Below O/Level";
        $OLevel = "O/Level";
        $ALevel= "A/Level";
        $BABScBEd= "BA/BSc/BEd";
        $MAMScMEd = "MA/MSc/MEd";
        $MPhil= "MPhil";
        $PhD = "Ph.D";



        $highestProfessionalQualification = "Highest Professional Qualification";

        $PhDEd= "Ph.D.Ed";
        $MPhilEd= "MPhil.Ed";
        $MEd = "M.Ed";
        $MAinEd= "MA in Ed";
        $DipinEd  = "Dip. in Ed";
        $MScinEdMgmt  = "MSc. in Ed.Mgmt";
        $PGDipinEdMgmt  = "PGDip in Ed.Mgmt";
        $PGDipinEASL  = "PGDip in EASL";
        $BNIEBEd = "B.NIE/B.Ed";
        $DipinEASL  = "Dip. in EASL";
        $DipinLibrary  = "Dip. in Library";
        $CertinLibrary  = "Cert. in Library";
        $PGDipinLibraryScience  = "PGDip in Library Science";
        $MScinLibrary  = "MSc. in Library";
        $DipinAgriculture  = "Dip. in Agriculture";
        $CertinTeacherTrainingInstitute   = "Cert. in Teacher Training (Institute)";
        $CertinTeacherTrainingAway  = "Cert. in Teacher Training (Away)";
        $NatDipinTeaching  = "Nat.Dip. in Teaching";
        $None = "None";





        $courseOfStudy = "Course of Study";


        $BscinEducation = "Bsc. in Education";
        $BscinPhysics="Bsc. in Physics";
        $BscinBiology="Bsc. in Biology";
        $BscinCombinedMathematics="Bsc.in Combined Mathematics";
        $BScspecialisationinMathematics = "BSc. specialisation in Mathematics";
        $PassedMathswithoutadegreeinscience = "Passed Maths without a degree in science";
        $BscinAgriculture= "Bsc. in Agriculture";
        $BscinHomeScience = "Bsc. in Home Science";
        $BscinIT = "Bsc. in IT";
        $BscinCommerceBusinessMgmtAccountingoequivalentDip = "Bsc. in Commerce/Business Mgmt./Accounting (or equivalent Dip.)";
        $BscinSocialScience = "Bsc. in Social Science";
        $BAinEasternMusicorequivalentDip = "BA in Eastern Music (or equivalent Dip.)";
        $BAinArts = "BA in Arts";
        $BAinDancingorequivalentDip = "BA in Dancing (or equivalent Dip.)";
        $BADegreesorequivalent= "BA Degrees or equivalent";
        $BAinEnglishorequivalent = "BA in English (or equivalent)";
        $BAinaForeignLanguageexcludingEnglish = "BA in a Foreign Language (excluding English)";

        /* $myarr[17] = ""; */

        $IT = "IT";
        $English = "English";
        $Maths= "Maths";
        $Science = "Science";
        $ScienceandMaths = "Science and Maths";
        $SocialStudies = "Social Studies";
        $Commerce= "Commerce";
        $HomeScience = "Home Science";
        $BTecConstruction  = "BTec. Construction";
        $BTecMechanical  = "BTec. Mechanical";
        $BTecElectronicandElectrical = "BTec. Electronic and Electrical";
        $Arts  = "Arts";
        $Agriculture  = "Agriculture";
        $WesternMusic = "Western Music";
        $EasternMusic = "Eastern Music";
        $ArtsAgain = "Arts Again"	;
        $Dancing = "Dancing";
        $HealthandPhysicalEducation = "Health and Physical Education";
        $Buddhism = "Buddhism";
        $Hinduism= "Hinduism";
        $Islam = "Islam";
        $RomanCatholicism  = "Roman Catholicism";
        $NonRomanCatholicism  = "Non-Roman Catholicism";
        $SpecialEducation  = "Special Education";
        $Sinhala  = "Sinhala";
        $Tamil  = "Tamil";
        $Arabic  = "Arabic";
        $PrimaryGeneral = "Primary/General";
        $LibraryandInformationScience  = "Library and Information Science";
        $TheatreandDrama = "Theatre and Drama";
        $Other = "Other";

        /*$myarr[18] = "" */

        $myarr[49] = "";

        $Maths = "Maths";
        $Science = "Science";
        $ScienceandMaths = "Science and Maths";
        $English = "English";
        $Primary = "Primary";
        $Religion = "Religion";
        $SocialStudies = "Social Studies";
        $Commerce = "Commerce";
        $Technology = "Technology";
        $HomeScience = "Home Science";
        $Agriculture = "Agriculture";
        $Sinhala = "Sinhala";
        $Tamil = "Tamil";
        $WesternMusic = "Western Music";
        $EasternMusic = "Eastern Music";
        $Dancing = "Dancing";
        $Art = "Art";
        $ForeignLanguageExcludingEnglish = "Foreign Language (Excluding English)";
        $Malay = "Malay";
        $Other = "Other";

        $Untrainedsomethingelse = "!Untrained something else";

        $Maths = "Maths";
        $Science = "Science";
        $ScienceandMaths = "Science and Maths";
        $English = "English";
        $Primary = "Primary";
        $Religion = "Religion";
        $SocialStudies = "Social Studies";
        $Commerce = "Commerce";
        $Technology = "Technology";
        $HomeScience = "Home Science";
        $Agriculture = "Agriculture";
        $Sinhala = "Sinhala";
        $Tamil = "Tamil";
        $WesternMusic = "Western Music";
        $EasternMusic = "Eastern Music";
        $Dancing = "Dancing";
        $Art = "Art";
        $ForeignLanguageExcludingEnglish = "Foreign Language (Excluding English)";
        $Malay = "Malay";
        $Other = "Other";



        $Contractbaseandother= "Contract based and other";

        $Graduates= "Graduates";
        $ALevel = "A/Level";
        $OLevelandOther = "O/Level and Other";
        $submit="submit";
    }
    else
    {
        $generalInformation = "සාමාන්‍ය තොරතුරු";
        $employmentInformation = "සේවයේ තොරතුරු";
        $educationInformation = "අධ්‍යාපනික තොරතුරු";
        $leaveInformation = "නිවාඩු තොරතුරු (Not Sure)";

        $staffID = "අනුක්‍රමික අංකය";
        $nameWithInitials = "නම් මුලකුරු සමඟ";
        $nameinfull="සම්පුර්ණ නම";
        $dateOfBirth = "උපන් දිනය";
        $gender = "ස්ත්‍රී/පුරුෂ භාවය";
        $nationalityRace = "ජනවර්ගය";
        $religion = "ආගම";
        $civilStatus = "විවාහක /අවිවාහක බව";
        $nicNumber = "ජාතික හැඳුනුම් පත් අංකය";

        $male = "පිරිමි";
        $female = "ගැහැණු";

        $sinhala = "සිංහල";
        $srilankantamil ="ශ්‍රී ලාංකික දෙමළ";
        $indiantamil = "ඉන්දියානු  දෙමළ";
        $srilankanmuslim = "ශ්‍රී ලාංකික මුස්ලිම්";
        $other = "වෙනත්";

        $buddhism="බෞද්ධ";
        $hindusm="හින්දු";
        $islam="ඉස්ලාම්";
        $catholic="කතෝලික";
        $christianity="ක්‍රිස්තියානි";
        $other = "වෙනත්";

        $married="විවාහක";
        $unmarried="අවිවාහක";
        $widow="වැන්දබු";
        $other="වෙනත්";

        $maildeliveryaddress="ලිපිනය";
        $contactnumber="දුරකථන අංකය";
        $contactpersonforemergency ="හදිසි අවස්ථාවකදී  සමබන්ද කරගත යුතු පුදගලයාගේ නම";
        $contactnumberforemergency ="හදිසි අවස්ථාවකදී ඇමතිය යුතු දුරකථන අංකය";

        $dateAppointedAsTeacher = "සේවයට පත්වූ වර්ෂය හා මාසය";
        $dateJoinedSchool = "මෙම විදුහලේ පත්වීම භාරගත් වර්ෂය හා මාසය";
        $employmentStatus = "පාසලට පතවීමේ ස්වභාවය";
        $medium = "පත්වීම ලද මාධ්‍යය";
        $positionInSchool = "පාසලේ දරන තනතුර";
        $section = "නිරතවන කාර්යය";
        $subjectMostTaught = "වැඩිම කාලයක් උගන්වන විෂයය";
        $subjectSecondMostTaught = "දෙවනුව වැඩි කාලයක් උගන්වන විෂයය";
        $serviceGrade = "අදාල සේවය/ශ්‍රේණිය";
        $salary = "මුළු වැටුප";

        $fulltime="මෙම පාසලින් වැටුප් ලබනහ පාසලේ පුර්ණ කාලීනව සේවය කරන";
        $parttime="මෙම පාසලින් වැටුප් ලබන පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට අර්ධකලිනවා නිදහස් කර ඇති";
        $fulltime_Releasedtootherschool="මෙම පාසලින් වැටුප් ලබන හා පාසලකට/ආයතනයකට/කාර්යාලයකට/සේවයකට පුර්නකලිනව නිදහස් කර ඇති";
        $fulltime_Broughtfromotherschool="වෙනත් පාසලකින් වැටුප් ලබා මෙම පාසලේ පුර්නකලිනවා සේවය කරන ";
        $oncontract_Government="රජයෙන් වැටුප් ලබන කොන්ත්‍රාත් පදනම මත සේවයට බදවාගත් ";
        $paidfromschoolfees="පහසුකම් ගාස්තු/ වෙනත් මාර්ග වලින් දීමනා ලබන";
        $othergovernmentdepartment="වෙනත් රාජ්‍ය ආයතන වලින් පත්කළ(පොලිස් උපසේවය සමුර්ද්දී,මහවැලි හා දක්ෂිණ ලංකා සංවර්දන අදිකාරී වැනි";

        $sinhala="සිංහල";
        $tamil="දෙමළ";
        $english="ඉංග්‍රීසි 2001 ට පසු";

        $principal="විදුහල්පති";
        $actingprincipal="වැඩබලන විදුහල්පති";
        $deputyprincipal="නියෝජ්‍ය විදුහල්පති";
        $actingdeputyprincipal="වැඩබලන නියෝජ්‍ය විදුහල්පති";
        $assistantprincipal="සහකාර විදුහල්පති";
        $actingassistantprincipal="වැඩබලන සහකාර විදුහල්පති";
        $teacher="ගුරුවරයා";

        $PrimaryMultiple="ප්‍රාථමික පොදු";
        $PrimaryEnglish="ප්‍රාථමික ඉංග්‍රීසි";
        $PrimarySecondLanguage="ප්‍රාථමික දෙවන බස";
        $SecondaryScienceMaths="ද්විතීයික (6-11) විද්‍යා/ගණිත";
        $SecondaryEnglish="ද්විතීයික (6-11) ඉංග්‍රීසි";
        $SecondaryArts="ද්විතීයික (6-11) සෞන්දර්ය";
        $SecondaryTechnology="ද්විතීයික (6-11)තාක්ෂණික";
        $SecondarySecondLanguage="ද්විතීයික (6-11)දෙවන බස";
        $SecondaryMultiple="ද්විතීයික (6-11)පොදු";
        $ALevelScienceMain="උ.පෙළ (12-13)විද්‍යා ප්‍රදාන විෂයයන් ";
        $ALevelArtsCommerce="උ.පෙළ (12-13)කල/වාණිජ  ප්‍රදාන විෂයයන්";
        $ALevelTechnology="උ.පෙළ (12-13)තාක්ෂණික ප්‍රදාන විෂයයන්";
        $ALevelOptional="උ.පෙළ (12-13)අතිරේක විෂයයන්";
        $SpecialEducation="විශේෂ අධ්‍යාපනය";
        $InformationTechnology="තොරතරු තාක්ෂනය";
        $PrimarySupervisor="ප්‍රාථමික (1-5) අධීක්ෂණ ගුරු";
        $SecondarySupervisor="ද්විතීයික (6-11)අධීක්ෂණ ගුරු";
        $ALevelSupervisor ="උ.පෙළ (12-13)අධීක්ෂණ ගුරු";
        $Counselling="උපදේශනය";
        $Library="පුස්තකාල";
        $HeathandPE="ශාරීරික අද්‍යාපනය";
        $Optional="අතිරේක";
        $Management="පරිපාලනය";
        $StaffAdvisorParttime="ගුරු උපදේශක(අර්ධකාලින)";
        $StaffAdvisorFulltime="ගුරු උපදේශක(පුර්නකාලින)";
        $ReleasedtoOtherSchool="වෙනත් පාසලකට නිදහස් කල";
        $Releasedtootherinstituteofficeservice="වෙනත් ආයතනයකට/කාර්යාලයකට/සේවයකට";
        $Onpaidleave="වැටුප් සහිත පුර්නකාලින අද්යන නිවාඩු";

        $SriLankaEducationAdministrativeServiceI="ශ්‍රී ලංකා අධ්‍යා. ප. සේ I(SLEAS I)";
        $SriLankaEducationAdministrativeServiceII="ශ්‍රී ලංකා අධ්‍යා. ප. සේ II(SLEAS II)";
        $SriLankaEducationAdministrativeServiceIII="ශ්‍රී ලංකා අධ්‍යා. ප. සේ III(SLEAS III)";
        $SriLankaPrincipalServiceI="ශ්‍රී ලංකා විහාල්පති සේ. I(SLPS I)";
        $SriLankaPrincipalService2I="ශ්‍රී ලංකා විහාල්පති සේ. 2-I(SLPS 2-I)";
        $SriLankaPrincipalService2II="ශ්‍රී ලංකා විහාල්පති සේ. 2-II(SLPS 2-II)";
        $SriLankaPrincipalService3="ශ්‍රී ලංකා විහාල්පති සේ.3(SLPS 3)";
        $SriLankaTeacherServiceI="ශ්‍රී ලංකා ගුරු සේ I ";
        $SriLankaTeacherService2I="ශ්‍රී ලංකා ගුරු සේ  2-I";
        $SriLankaTeacherService2II="ශ්‍රී ලංකා ගුරු සේ 2-II";
        $SriLankaTeacherService3I="ශ්‍රී ලංකා ගුරු සේ  3-I";
        $SriLankaTeacherService3II="ශ්‍රී ලංකා ගුරු සේ 3-II";
        $SriLankaTeacherServicePending="ශ්‍රී ලංකා ගුරු සේවයට අන්තර්ග්‍රහණය කර නොමැත";

        $BelowOLevel= "අ.පො.ස(සා.පෙ) ට අඩු";
        $OLevel = "අ.පො.ස(සා.පෙ)/හෝ සමාන(o/l)";
        $ALevel= "අ.පො.ස(උ.පෙ)/හෝ සමාන(a/l)";
        $BABScBEd= "උපාධි හා ඊට සමාන";
        $MAMScMEd = "ශාස්ත්‍රපති හා ඊට සමාන්තර";
        $MPhil= "දර්ශනපති හා ඊට සමාන්තර";
        $PhD = "දර්ශනශුරී උපාධිහා ඊට සමාන්තර";




        $PhDEd= "දර්ශනශුරි - අධ්‍යාපනය පිළිබදව ";
        $MPhilEd= "දර්ශනපති -අධ්‍යාපනය පිළිබද";
        $MEd = "අධ්‍යාපනපති උපාධි";
        $MAinEd= "අධ්‍යාපනය පිළිබද ශ්‍රාස්ත්‍රපති උපාධිය";
        $DipinEd  = "පශ්චාත් උපාධි අධ්‍යාපන ඩිප්ලෝමාව";
        $MScinEdMgmt  = "අධ්‍යාපන කළමනාකරණය පිළිබද විද්‍යාපති";
        $PGDipinEdMgmt  = "අධ්‍යාපන කළමනාකරණය පිළිබද පශ්චාත් උපාධිඩිප්ලෝමාව";
        $PGDipinEASL  = "දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ පශ්චාත් උපාධිඩිප්ලෝමාව";
        $BNIEBEd = "හෝ විශ්ව.වි අද්යපනවේදී උපාධි";
        $DipinEASL  = "දෙවන භාෂාවක් ලෙස ඉංග්‍රීසි ඉගැන්වීමේ ඩිප්ලෝමා";
        $DipinLibrary  = "ගුරු පුස්තකාලයාලධිපති ඩිප්ලෝමා පාඨමාලාව";
        $CertinLibrary  = "ගුරු පුස්තකාලයාලධිපති සහතිකපත්‍ර   පාඨමාලාව";
        $PGDipinLibraryScience  = "ගුරු පුස්තකාල විද්‍යා පශ්චාත් උපාධි ඩිප්ලෝමා පාඨමාලාව";
        $MScinLibrary  = "ගුරු පුස්තකාලයාලධිපති විද්‍යාපති උපාධිය";
        $DipinAgriculture  = "කෘෂි අද්‍යාපනය පිළිබද ඩිප්ලෝමාව";
        $CertinTeacherTrainingInstitute = "ගුරු පුහුණු සහතිකය-ආයතනික";
        $CertinTeacherTrainingAway  = "ගුරු පුහුණු සහතිකය-දුරස්ථ";
        $NatDipinTeaching  = "ජාතික ශික්ෂණ විද්‍යා ඩිප්ලෝමාව";
        $None = "ව්හුර්තීය සුදුසුකම් ලබා නොමැති";




        $BscinEducation = "අධ්‍යාපනවේදී උපාධි(විශ්ව විද්‍යාලයිය)";
        $BscinPhysics="භාව්තීය විද්‍යා උපාධි";
        $BscinBiology="ජීව විද්‍යා උපාධි";
        $BscinCombinedMathematics= "සංයුක්ත ගණිතය";
        $BScspecialisationinMathematics = "විශේෂ ගණිත උපාධි";
        $PassedMathswithoutadegreeinscience = "ගණිතය විෂයක් ලෙස සමත් වු විද්‍යා නොවන උපාධි";
        $BscinAgriculture= "කෘෂි විද්‍යා උපාධි";
        $BscinHomeScience = "ගෘහ විද්‍යා උපාධි";
        $BscinIT = "තොරතුරු තාක්ෂණය";
        $BscinCommerceBusinessMgmtAccountingoequivalentDip= "වානිජ්‍ය/ව්‍යාපාර පරිපාලනය/ගණකාධිකරණය උපාධි හා සමාන උපාධි";
        $BscinSocialScience = "සමාජ විද්‍යා උපාධි";
        $BAinEasternMusicorequivalentDip = "පෙරදිග සංගීත උපාධි හා සමාන ඩිප්ලෝමා";
        $BAinArts = "චිත්‍ර කලා උපාධි හා සමාන  ඩිප්ලෝමා";
        $BAinDancingorequivalentDip = "නැටුම් උපාධි හා සමාන ඩිප්ලෝමා";
        $BADegreesorequivalent= "කල උපාධි හා සමාන උපාධි";
        $BAinEnglishorequivalent = "ඉංග්‍රීසි/ඉංග්‍රීසි  විෂයක් ලෙස සමත් උපාධි";
        $BAinaForeignLanguageexcludingEnglish = "විදේශ භාෂා  (ඉංග්‍රීසි හැර)උපාධි";

        /* $myarr[17] = ""; */

        $IT = "තොරතුරු තාක්ෂණය";
        $English = "ඉංග්‍රීසි";
        $Maths= "ගණිතය";
        $Science = "විද්‍යාව";
        $ScienceandMaths = "විද්‍යා -ගණිත";
        $SocialStudies = "සමාජ අධ්‍යනය";
        $Commerce= "වාණිජ්‍ය";
        $HomeScience = "ගෘහ විද්‍යාව";
        $BTecConstruction  = "ඉදිකිරීම් තාක්ෂණය";
        $BTecMechanical  = "යාන්ත්‍රික තාක්ෂණය";
        $BTecElectronicandElectrical = "විදුලිය හා ඉලෙක්ට්‍රොනික තාක්ෂණය";
        $Arts  = "කලා ශිල්ප";
        $Agriculture  = "කෘෂිකර්මය";
        $WesternMusic = "සංගීතය-පෙරදිග";
        $EasternMusic = "සංගීතය-අපරදිග";
        $ArtsAgain = "චිත්‍ර"	;
        $Dancing = "නැටුම්";
        $HealthandPhysicalEducation = "ශාරීරික අද්‍යාපනය";
        $Buddhism = "බුද්ධාගම";
        $Hinduism= "හින්දු ධර්මය";
        $Islam = "ඉස්ලාම් ධර්මය";
        $RomanCatholicism  = "රෝමානු කතෝලික";
        $NonRomanCatholicism  = "රෝමානු කතෝලික නොවන ක්‍රිස්තියානි";
        $SpecialEducation  = "විශේෂ අද්‍යාපනය";
        $Sinhala  = "සිංහල";
        $Tamil  = "දෙමළ";
        $Arabic  = "අරාබි";
        $PrimaryGeneral = "ප්‍රාථමික/සාමාන්‍ය";
        $LibraryandInformationScience  = "පුස්තකාල හා තොරතරු විද්‍යාව";
        $TheatreandDrama = "නාට්‍ය හා රංග කලාව";
        $Other = "වෙනත් පුහුණු";

        /*$myarr[18] = "" */

        $myarr[49] = "";

        $Maths = "ගණිත";
        $Science = "විද්‍යා";
        $ScienceandMaths = "විද්‍යා හා ගණිත";
        $English = "ඉංග්‍රීසි";
        $Primary = "ප්‍රාථමික";
        $Religion = "ආගම";
        $SocialStudies ="සමාජ අධ්‍යනය";
        $Commerce = "වාණිජ්‍ය";
        $Technology = "තාක්ෂණය";
        $HomeScience = "ගෘහ විද්‍යාව";
        $Agriculture = "කෘෂිකර්මය";
        $Sinhala = "සිංහල";
        $Tamil = "දෙමළ";
        $WesternMusic = "සංගීතය-පෙරදිග";
        $EasternMusic = "සංගීතය-අපරදිග";
        $Dancing = "නැටුම්";
        $Art = "චිත්‍ර";
        $ForeignLanguageExcludingEnglish = "විදේශ භාෂා(ඉංගිසි හැර)";
        $Malay = "මෞලවි";
        $Other = "වෙනත් නුපුහුනු(සදහන් කරන්න)";

        $Untrainedsomethingelse = "!Untrained something else";

        $Maths = "ගණිත";
        $Science = "විද්‍යා";
        $ScienceandMaths = "විද්‍යා හා ගණිත";
        $English = "ඉංග්‍රීසි";
        $Primary = "ප්‍රාථමික";
        $Religion = "ආගම";
        $SocialStudies ="සමාජ අධ්‍යනය";
        $Commerce = "වාණිජ්‍ය";
        $Technology = "තාක්ෂණය";
        $HomeScience = "ගෘහ විද්‍යාව";
        $Agriculture = "කෘෂිකර්මය";
        $Sinhala = "සිංහල";
        $Tamil = "දෙමළ";
        $WesternMusic = "සංගීතය-පෙරදිග";
        $EasternMusic = "සංගීතය-අපරදිග";
        $Dancing = "නැටුම්";
        $Art = "චිත්‍ර";
        $ForeignLanguageExcludingEnglish = "විදේශ භාෂා(ඉංගිසි හැර)";
        $Malay = "මෞලවි";
        $Other = "වෙනත් නුපුහුනු(සදහන් කරන්න)";

        $Contractbaseandother= "කොන්ත්‍රාත් පදනම හා වෙනත් මාර්ග වලින් දීමන ලබන ගුරුවරු";

        $Graduates= "උපාධි";
        $ALevel = "අ.පො.ස (උ.පෙ)";
        $OLevelandOther = "අ.පො.ස (ස.පෙ)/වෙනත්";



        $highestEducationalQualification = "ඉහලම අධ්‍යාපන සුදුසුකම";
        $highestProfessionalQualification = "ඉහලම වෘත්තීය සුදුසුකම";
        $courseOfStudy = "වර්ගමාන පත්වීමේ වර්ගීකරණය";
        $submit="තහවුරු කරන්න";
    }
    ?>
    <body>

    <div class="front">

    <h1>Staff Registration Form</h1>

    <form onsubmit="return validateEverything()" name="thisForm" method="post">
    <div class="staffimage">
        <img src="" alt="No any image">
    </div>
    <table class="general" cellspacing="0">
    <tr><th><?php echo $generalInformation?></th><th></th></tr>
    <tr>
        <td><?php echo $staffID?></td>
        <td><input name="staffID" type="text" value=""></td>
    </tr>
    <tr class="alt">
        <td><?php echo $nameWithInitials?></td>
        <td><input name="nameWithInitials" type="text" value=""></td>
    </tr>

    <tr>
        <td><?php echo $dateOfBirth?></td>
        <td><input name="dateOfBirth" type="date" value=""></td>
    </tr>
    <tr class="alt">
        <td><?php echo $gender?></td>
        <td>
            <input type="radio" name="gender" value="male"><?php echo $male?>
            <input type="radio" name="gender" value="female"><?php echo $female?>

        </td>
    </tr>
    <tr>
        <td><?php echo $nationalityRace?></td>
        <td><select name="nationalityRace" type="text" value="">
                <option value="1"><?php echo $sinhala?></option>
                <option value="2"><?php echo $srilankantamil?></option>
                <option value="3"><?php echo $indiantamil?></option>
                <option value="4"><?php echo $srilankanmuslim?></option>
                <option value="5"><?php echo $other?></option>
            </select></td>
    </tr>
    <tr class="alt">
        <td><?php echo $religion?></td>
        <td><select name="religion" type="text" value="">
                <option value="1"><?php echo $buddhism?></option>
                <option value="2"><?php echo $hindusm?></option>
                <option value="3"><?php echo $islam?></option>
                <option value="4"><?php echo $catholic?></option>
                <option value="5"><?php echo $christianity?></option>
                <option value="6"><?php echo $other?></option>
            </select></td>
    </tr>
    <tr class="alt">
        <td><?php echo $civilStatus?></td>
        <td><select name="civilStatus" type="text" value="">
                <option value="1"><?php echo $married?></option>
                <option value="2"><?php echo $unmarried?></option>
                <option value="3"><?php echo $widow?></option>
                <option value="4"><?php echo $other?></option>

            </select></td>
    </tr>
    <tr class="alt">
        <td><?php echo $nicNumber?></td>
        <td><input name="nicNumber" type="text" value=""></td>
    </tr>

    <tr class="alt">
        <td><?php echo $maildeliveryaddress?></td>
        <td><input name="maildeliveryaddress" type="text" size="55"  value=""></td>
    </tr>

    <tr class="alt">
        <td><?php echo $contactnumber?></td>
        <td><input name="contactnumber" type="text" value=""></td>
    </tr>

    <!--</table>

    <table class="employment" cellspacing="0"> -->
    <tr><th><?php echo $employmentInformation?></th><th></th></tr>
    <tr>
        <td><?php echo $dateAppointedAsTeacher?></td>
        <td><input name="dateAppointedAsTeacher" type="date" value=""></td>
    </tr>
    <tr class="alt">
        <td><?php echo $dateJoinedSchool?></td>
        <td><input name="dateJoinedSchool" type="date" value=""></td>
    </tr>

    <tr>
        <td><?php echo $employmentStatus?></td>
        <td><select name="employmentStatus" type="text" value="">
                <option value="1"><?php echo $fulltime?></option>
                <option value="2"><?php echo $parttime?></option>
                <option value="3"><?php echo $fulltime_Releasedtootherschool?></option>
                <option value="4"><?php echo $fulltime_Broughtfromotherschool?></option>
                <option value="5"><?php echo $oncontract_Government?></option>
                <option value="6"><?php echo $paidfromschoolfees?></option>
                <option value="7"><?php echo $othergovernmentdepartment?></option>
            </select>

        </td>
    </tr>

    <tr class="alt">
        <td><?php echo $medium?></td>
        <td><select name="medium" type="text" value="">
                <option value="1"><?php echo $sinhala?></option>
                <option value="2"><?php echo $tamil?></option>
                <option value="3"><?php echo $english?></option>

        </td>
    </tr>
    <tr class ="alt">
        <td><?php echo $positionInSchool?></td>
        <td><select name="positionInSchool" type="text" value="">
                <option value="1"><?php echo $principal?></option>
                <option value="2"><?php echo $actingprincipal?></option>
                <option value="3"><?php echo $deputyprincipal?></option>
                <option value="4"><?php echo $actingdeputyprincipal?></option>
                <option value="5"><?php echo $assistantprincipal?></option>
                <option value="6"><?php echo $actingassistantprincipal?></option>
                <option value="7"><?php echo $teacher?></option>
            </select>

        </td>
    </tr>
    <tr class="alt">
        <td><?php echo $section?></td>
        <td><select name="section" type="text" value="">
                <option value="1"><?php echo $PrimaryMultiple?></option>
                <option value="2"><?php echo $PrimaryEnglish?></option>
                <option value="3"><?php echo $PrimarySecondLanguage?></option>
                <option value="4"><?php echo $SecondaryScienceMaths?></option>
                <option value="5"><?php echo $SecondaryEnglish?></option>
                <option value="6"><?php echo $SecondaryArts?></option>
                <option value="7"><?php echo $SecondaryTechnology?></option>

                <option value="8"><?php echo $SecondarySecondLanguage?></option>
                <option value="9"><?php echo $SecondaryMultiple?></option>
                <option value="10"><?php echo $ALevelScienceMain?></option>
                <option value="11"><?php echo $ALevelArtsCommerce?></option>
                <option value="12"><?php echo $ALevelTechnology?></option>
                <option value="13"><?php echo $ALevelOptional?></option>
                <option value="14"><?php echo $SpecialEducation?></option>

                <option value="15"><?php echo $InformationTechnology?></option>
                <option value="16"><?php echo $PrimarySupervisor?></option>
                <option value="17"><?php echo $SecondarySupervisor?></option>
                <option value="18"><?php echo $ALevelSupervisor?></option>
                <option value="19"><?php echo $Counselling?></option>
                <option value="20"><?php echo $Library?></option>
                <option value="21"><?php echo $HeathandPE?></option>

                <option value="22"><?php echo $Optional?></option>
                <option value="23"><?php echo $Management?></option>
                <option value="24"><?php echo $StaffAdvisorParttime?></option>
                <option value="25"><?php echo $StaffAdvisorFulltime?></option>
                <option value="26"><?php echo $ReleasedtoOtherSchool?></option>
                <option value="27"><?php echo $Releasedtootherinstituteofficeservice?></option>
                <option value="28"><?php echo $Onpaidleave?></option>
            </select>

        </td>
    </tr>
    <tr>
        <td><?php echo $subjectMostTaught?></td>
        <td><select name="subjectMostTaught" type="text" value="">
                <option value="1">Baa</option>
                <option value="2">Baa</option>
                <option value="3">Black</option>
                <option value="4">Sheep</option>
        </td>
    </tr>
    <tr class="alt">
        <td><?php echo $subjectSecondMostTaught?></td>
        <td><select name="subjectSecondMostTaught" type="text" value="">
                <option value="1">Baa</option>
                <option value="2">Baa</option>
                <option value="3">Black</option>
                <option value="4">Sheep</option>
        </td>
    </tr>
    <tr class ="alt">
        <td><?php echo $serviceGrade?></td>
        <td><select name="serviceGrade" type="text" value="">
                <option value="1"><?php echo $SriLankaEducationAdministrativeServiceI?></option>
                <option value="2"><?php echo $SriLankaEducationAdministrativeServiceII?></option>
                <option value="3"><?php echo $SriLankaEducationAdministrativeServiceIII?></option>
                <option value="4"><?php echo $SriLankaPrincipalServiceI?></option>
                <option value="5"><?php echo $SriLankaPrincipalService2I?></option>
                <option value="6"><?php echo $SriLankaPrincipalService2II?></option>
                <option value="7"><?php echo $SriLankaPrincipalService3?></option>
                <option value="8"><?php echo $SriLankaTeacherServiceI?></option>
                <option value="9"><?php echo $SriLankaTeacherService2I?></option>
                <option value="10"><?php echo $SriLankaTeacherService2II?></option>
                <option value="11"><?php echo $SriLankaTeacherService3I?></option>
                <option value="12"><?php echo $SriLankaTeacherService3II?></option>
                <option value="13"><?php echo $SriLankaTeacherServicePending?></option>
            </select>
        </td>
    </tr>
    <tr class="alt">
        <td><?php echo $salary?></td>
        <td><input name="Salary" type="text" value=""></td>
    </tr>

    <!-- </table>

    <table class="education" cellspacing="0">-->
    <tr><th><?php echo $educationInformation?></th><th></th></tr>
    <tr>
        <td><?php echo $highestEducationalQualification?></td>
        <td><select name="highestEducationalQualification" type="text" value="">

                <option value="1"><?php echo $BelowOLevel?></option>
                <option value="2"><?php echo $OLevel?></option>
                <option value="3"><?php echo $ALevel?></option>
                <option value="4"><?php echo $BABScBEd?></option>
                <option value="5"><?php echo $MAMScMEd?></option>
                <option value="6"><?php echo $MPhil?></option>
                <option value="7"><?php echo $PhD?></option>


                <?php
                $c = 0;



                for($c = 0; $c < 7; $c++)
                {
                echo "<option value=\"$c\"></option>";
                }
                ?>
        </td>
    </tr>
    <tr class="alt">
        <td><?php echo $highestProfessionalQualification?></td>
        <td><select name="highestProfessionalQualification" type="text" value="">


                <option value="1"><?php echo $PhDEd?></option>
                <option value="2"><?php echo $MPhilEd?></option>
                <option value="3"><?php echo $MEd?></option>
                <option value="4"><?php echo $MAinEd?></option>
                <option value="5"><?php echo $DipinEd?></option>
                <option value="6"><?php echo $MScinEdMgmt?></option>
                <option value="7"><?php echo $PGDipinEdMgmt?></option>
                <option value="8"><?php echo $PGDipinEASL ?></option>
                <option value="9"><?php echo $BNIEBEd  ?></option>
                <option value="10"><?php echo $DipinEASL?></option>
                <option value="11"><?php echo $DipinLibrary?></option>
                <option value="12"><?php echo $CertinLibrary?></option>
                <option value="13"><?php echo $PGDipinLibraryScience?></option>
                <option value="14"><?php echo $MScinLibrary?></option>
                <option value="15"><?php echo $DipinAgriculture?></option>
                <option value="16"><?php echo $CertinTeacherTrainingInstitute?></option>
                <option value="17"><?php echo $CertinTeacherTrainingAway?></option>
                <option value="18"><?php echo $NatDipinTeaching?></option>
                <option value="19"><?php echo $None?></option>



                <?php
                for($c = 0; $c < 19; $c++)
                {
                echo "\t<option value=\"$c\"></option>\n";
                }
                ?>
        </td>
    </tr>
    <tr>
        <td><?php echo $courseOfStudy?></td>
        <td><select name="courseOfStudy" type="text" value="">



                <option value="1"><?php echo $BscinEducation?></option>
                <option value="2"><?php echo $BscinPhysics?></option>
                <option value="3"><?php echo $BscinBiology?></option>
                <option value="4"><?php echo $BscinCombinedMathematics?></option>
                <option value="5"><?php echo $BScspecialisationinMathematics?></option>
                <option value="6"><?php echo $PassedMathswithoutadegreeinscience?></option>
                <option value="7"><?php echo $BscinAgriculture?></option>
                <option value="8"><?php echo $BscinHomeScience?></option>
                <option value="9"><?php echo $BscinIT?></option>
                <option value="10"><?php echo $BscinCommerceBusinessMgmtAccountingoequivalentDip?></option>
                <option value="11"><?php echo $BscinSocialScience?></option>
                <option value="12"><?php echo $BAinEasternMusicorequivalentDip?></option>
                <option value="13"><?php echo $BAinArts?></option>
                <option value="14"><?php echo $BAinDancingorequivalentDip?></option>
                <option value="15"><?php echo $BADegreesorequivalent?></option>
                <option value="16"><?php echo $BAinEnglishorequivalent?></option>
                <option value="17"><?php echo $BAinaForeignLanguageexcludingEnglish?></option>



                <option value="18"><?php echo $IT?></option>
                <option value="19"><?php echo $English?></option>
                <option value="20"><?php echo $Maths?></option>
                <option value="21"><?php echo $Science?></option>
                <option value="22"><?php echo $ScienceandMaths?></option>
                <option value="23"><?php echo $SocialStudies?></option>
                <option value="24"><?php echo $Commerce?></option>
                <option value="25"><?php echo $HomeScience?></option>
                <option value="26"><?php echo $BTecConstruction?></option>
                <option value="27"><?php echo $BTecMechanical?></option>
                <option value="28"><?php echo $BTecElectronicandElectrical?></option>
                <option value="29"><?php echo $Arts?></option>
                <option value="30"><?php echo $Agriculture?></option>
                <option value="31"><?php echo $WesternMusic?></option>
                <option value="32"><?php echo $EasternMusic?></option>
                <option value="33"><?php echo $ArtsAgain?></option>
                <option value="34"><?php echo $Dancing?></option>
                <option value="35"><?php echo $HealthandPhysicalEducation?></option>
                <option value="36"><?php echo $Buddhism?></option>
                <option value="37"><?php echo $Hinduism?></option>
                <option value="38"><?php echo $Islam?></option>
                <option value="39"><?php echo $RomanCatholicism?></option>
                <option value="40"><?php echo $NonRomanCatholicism?></option>
                <option value="41"><?php echo $SpecialEducation?></option>
                <option value="42"><?php echo $Sinhala?></option>
                <option value="43"><?php echo $Tamil?></option>
                <option value="44"><?php echo $Arabic?></option>
                <option value="45"><?php echo $PrimaryGeneral?></option>
                <option value="46"><?php echo $LibraryandInformationScience?></option>
                <option value="47"><?php echo $TheatreandDrama?></option>
                <option value="48"><?php echo $Other?></option>



                <option value="49"><?php echo $Maths?></option>
                <option value="50"><?php echo $Science?></option>
                <option value="51"><?php echo $ScienceandMaths?></option>
                <option value="52"><?php echo $English?></option>
                <option value="53"><?php echo $Primary?></option>
                <option value="54"><?php echo $Religion?></option>
                <option value="55"><?php echo $SocialStudies?></option>
                <option value="56"><?php echo $Commerce?></option>
                <option value="57"><?php echo $Technology?></option>
                <option value="58"><?php echo $HomeScience?></option>
                <option value="59"><?php echo $Agriculture ?></option>
                <option value="60"><?php echo $Sinhala?></option>
                <option value="61"><?php echo $Tamil?></option>
                <option value="62"><?php echo $WesternMusic?></option>
                <option value="63"><?php echo $EasternMusic?></option>
                <option value="64"><?php echo $Dancing?></option>
                <option value="65"><?php echo $Art?></option>
                <option value="66"><?php echo $ForeignLanguageExcludingEnglish?></option>
                <option value="67"><?php echo $Malay?></option>
                <option value="68"><?php echo $Other?></option>




                <option value=""><?php echo $Maths?></option>
                <option value=""><?php echo $Science?></option>
                <option value=""><?php echo $ScienceandMaths?></option>
                <option value=""><?php echo $English?></option>
                <option value=""><?php echo $Primary?></option>
                <option value=""><?php echo $Religion?></option>
                <option value=""><?php echo $SocialStudies?></option>
                <option value=""><?php echo $Commerce?></option>
                <option value=""><?php echo $Technology?></option>
                <option value=""><?php echo $HomeScience?></option>
                <option value=""><?php echo $Agriculture ?></option>
                <option value=""><?php echo $Sinhala?></option>
                <option value=""><?php echo $Tamil?></option>
                <option value=""><?php echo $WesternMusic?></option>
                <option value=""><?php echo $EasternMusic?></option>
                <option value=""><?php echo $Dancing?></option>
                <option value=""><?php echo $Art?></option>
                <option value=""><?php echo $ForeignLanguageExcludingEnglish?></option>
                <option value=""><?php echo $Malay?></option>
                <option value=""><?php echo $Other?></option>


                <option value=""><?php echo $Graduates?></option>
                <option value=""><?php echo $ALevel?></option>
                <option value=""><?php echo $OLevelandOther?></option>


                <?php
                for($c = 0; $c < 95; $c++)
                {
                    if ($c == 17)
                    { 	echo "</optgroup>\n<optgroup label=\"Trained Teachers (Nat.Dip. in Teaching)\"";
                    } elseif ($c == 49) {
                    echo "</optgroup>\n<optgroup label=\"Untrained Teachers (Sri Lanka Teaching Service)\"";
                    } elseif ($c == 70) {
                    echo "</optgroup>\n<optgroup label=\"!Untrained something else\"";
                    } elseif ($c == 90) {
                    echo "</optgroup>\n<optgroup label=\"Contract-based and Other\"";
                    } else {
                    echo "\t<option value=\"$c\">" . $myarr[$c] . "</option>\n";
                    }
                }

                echo "</optgroup>";

                ?>
        </td>



        <td><input class="button" name="newStaff" type="submit" value="Submit"></td>
    </table>
    </form>
    </div>
    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1400;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>