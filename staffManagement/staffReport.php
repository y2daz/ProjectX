<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 08/09/14
 * Time: 10:56
 */

session_start();

require_once("../dbAccess.php");
require_once("../common.php");

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

if(!isFilled($_COOKIE['language']))
{
    setcookie('language', '0'); //where 0 is English and 1 is Sinhala
}
if(!isFilled($_SESSION["user"]))
{
    header("Location: " . PATHFRONT . "/login.php");
}
if(isset($_GET["logout"]))
{
    $_SESSION["user"] = NULL;
    header("Location: " . PATHFRONT . "/login.php");
}


$result = getAllStaff();

/*LANGUAGE
 *
 * */
$line1 = "2013 ජුනි 01 දිනට පාසලේ අධ්‍යයන කාර්ය මණ්ඩලවල තොරතුරු";
$line2 = "සැම විදුහල්පති තනතුරු ධාරියකු හා ගුරුවර්යකු සඳහා ම සියලුම තීරු සම්පුඋර්ණ කිරීම අනිවාර්යය වේ. මුල් පිටුවේ උපදෙස් හොදින් කියවන්න.";

$column0Header = "අනුක්‍රමික අංකය";
$column1Header1 = "විදුහල්පතිගේ නම මුලින්ම ලියන්න. මුලකුරුර් මුලට සිටින සේ ගුරුහවතුන්ගේ නම් ඉංග්‍රීසි කැපිටල් අකුරින් ලියන්න.";
$column1Header2 = "(විදුහල්පතිධුරය දුරන්නේ පිරිමි අයෙකු නම් ප්රිමින්ගේ විස්තර මුලින් ලියා කාන්තාවන්ගේ විස්තර දෙවනුව ලියන්න. විදුහල්පතිධුරය දුරන්නේ ගැහැනු  අයෙකු නම් කාන්තාවන්ගේ විස්තර මුලින් ලියා ප්රිමින්ගේ විස්තර දෙවෙනුව ලියන්න.) (පළමු පිටුගේ සඳහන් උපදෙස පිළිපදින්න)";

$column234Header = "උපන් දිනය";
$column2Header = "වර්ෂය (අවසන් අංකය දෙක)";
$column3Header = "මාසය";
$column4Header = "දිනය";
$column5Header = "ස්ත්‍රී / පුරුෂ භාවය";
$column6Header = "ජනවර්ගය";
$column7Header = "ආගම";
$column8Header = "විවාහක / අවිවාහක බව";

$column910Header = "විදුහල්පති ධුරයට හෝ ගුරුවරයකු වශයෙන් සේවයට පනවූ වර්ෂය ( අවසන් අංක දෙක ) හා මාසය ";
$column9Header = "අවු";
$column10Header = "මාස";

$column1112Header = "මෙම විදුහලේ මන්වීම භාරගත් වර්ෂය හා මාසය ( අවසන් අංක දෙක )";
$column11Header = $column9Header;
$column12Header = $column10Header;
$column13Header = "පාසලට පනවීමේ සවභාවය";
$column14Header = "පැනවීමේ ලද මාද්‍යය";
$column15Header = "පාසලේ  දුරන තනතුර";
$column16Header = "ඉහලම අධ්‍යාපන් සුදුසුකම";
$column17Header = "ඉහලම වෘත්තීය  සුදුසුකම";
$column18Header = "වර්තමාන පත්වීමේ වර්ගීකරණය";
$column19Header = "නිරතවන කාර්යය";
$column20Header = "වැඩිම කාලයක් උගන්වන විෂයය";
$column21Header = "දෙවනු වැඩි කාලයක් උගන්වන විෂයය";

$column222324Header = "2012.01.01 සිට 2012.12.31 දක්වා ලබාගෙන ඇති නිවාඩු ගණන ( පූර්ණ සංඛ්‍යාවලින් )";
$column22Header = "අදාළ සේවය / ශ්‍රේනීය";
$column23Header = "අනියම් / විවේක";
$column24Header = "රාජකාරි / අධ්‍යයන";
$column25Header = "ප්‍රසූත නිවාඩු";
$column26Header = "2013 මැයි මස මුළු වැටුප ( සියලුම දීමනා ඇතුලත් කළ යුතු අතර අඩු කිරීම නොසලකන්න. පැරණි හිඟ මුදල් ශත ගණන් ඇතුලත් නොකරන්න)";
$column27Header1 = "සාම නිලධාරියකු සඳහාම අනිවාර්යයෙන් ම ජාතික හැඳුනුම් පත් අංකය සඳහන් කල යුතුය";
$column27Header2 = "ජාතික හැඳුනුම් පත් අංකය ";
$column27Header3 = "උදා 583021007 V";

/*LANGUAGE
 *
 */

?>
<!DOCTYPE html>
<html>
<head>
    <title>Staff Report</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        h1, h2, h3{
            text-align: center;
        }
        .report, th, td{
            text-align: justify;
            border: 1px solid black;
            border-collapse: collapse;
            padding-left: 4px;
            padding-right: 4px;
        }
        .numberCol{
            /*width:20px;*/
        }
        #col_0{
        }
        #col_1{
            width:300px;
        }
        .rotate { /*http://css-tricks.com/snippets/css/text-rotation/ */
            /* Safari */
            -webkit-transform: rotate(-90deg);
            /* Firefox */
            -moz-transform: rotate(-90deg);
            /* IE */
            -ms-transform: rotate(-90deg);
            /* Opera */
            -o-transform: rotate(-90deg);
            /* Internet Explorer */
            filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);

            writing-mode: bt-rl;
            /*text-indent: -3em;*/
            padding: 0px 0px 0px 0px;
            margin: 0px;
            text-align: left;
            /*vertical-align: top;*/
        }
    </style>
</head>

<body>

    <h2><?php echo $line1 ?></h2>
    <h3><?php echo $line2 ?></h3>

    <table class="report">
        <tr>
            <th id="col_0" class="rotate numberCol"><?php echo $column0Header ?></th>
            <th id="col_1"><?php echo "<p>$column1Header1</p><p>$column1Header2</p>" ?></th>
            <th id="col_2" class="rotate numberCol"><?php echo $column2Header ?></th>
            <th id="col_3" class="rotate numberCol"><?php echo $column3Header ?></th>
            <th id="col_4" class="rotate numberCol"><?php echo $column4Header ?></th>
        </tr>

    </table>

    <br />
</body>
</html>