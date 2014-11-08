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
    header("Location: " . PATHFRONT . "/Menu.php");
}
if(isset($_GET["logout"]))
{
    $_SESSION["user"] = NULL;
    header("Location: " . PATHFRONT . "/Menu.php");
}


$result = getAllStaff();

/*LANGUAGE
 *
 * */
$line1 = "2013 ජුනි 01 දිනට පාසලේ අධ්‍යයන කාර්ය මණ්ඩලවල තොරතුරු";
$line2 = "සැම විදුහල්පති තනතුරු ධාරියකු හා ගුරුවරයකු සඳහා ම සියලුම තීරු සම්පුර්ණ කිරීම අනිවාර්යය වේ. මුල් පිටුවේ උපදෙස් හොදින් කියවන්න.";

$column0Header = "අනුක්‍රමික අංකය";
/**FIX */$column1Header1 = "විදුහල්පතිගේ නම මුලින්ම ලියන්න. මුලකුරු මුලට සිටින සේ ගුරුහවතුන්ගේ නම් ඉංග්‍රීසි කැපිටල් අකුරින් ලියන්න.";
/**FIX */$column1Header2 = "(විදුහල්පතිධුරය දරන්නේ පිරිමි අයෙකු නම් පිරිමින්ගේ විස්තර මුලින් ලියා කාන්තාවන්ගේ විස්තර දෙවනුව ලියන්න. විදුහල්පතිධුරය දරන්නේ ගැහැනු  අයෙකු නම් කාන්තාවන්ගේ විස්තර මුලින් ලියා පිරිමින්ගේ විස්තර දෙවනුව ලියන්න.) (පළමු පිටුවේ සඳහන් උපදෙස් පිළිපදින්න)";

$column234Header = "උපන් දිනය";
$column2Header = "වර්ෂය (අවසන් අංකය දෙක)";
$column3Header = "මාසය";
$column4Header = "දිනය";
$column5Header = "ස්ත්‍රී / පුරුෂ භාවය";
$column6Header = "ජනවර්ගය";
$column7Header = "ආගම";
$column8Header = "විවාහක / අවිවාහක බව";

$column910Header1 ="විදුහල්පති ධුරයට හෝ ගුරු සේවය";
$column910Header2 = "පනවූ වර්ෂය හා මාසය ";
$column9Header = "අවු";
$column10Header = "මාස";

$column1112Header1 = "මෙම විදුහලේ මන්වීම භාරගත";
$column1112Header2 = "වර්ෂය හා මාසය";
$column11Header = $column9Header;
$column12Header = $column10Header;
$column13Header = "පාසලට පත්වීමේ ස්වභාවය"; //Employment Status
$column14Header = "පැනවීමේ ලද මාධ‍යය"; //Medium
$column15Header = "පාසලේ දරන තනතුර";  //Position in School
$column16Header = "ඉහලම අධ්‍යාපන සුදුසුකම"; //Highest Educational
$column17Header = "ඉහලම වෘත්තීය  සුදුසුකම"; //Highest Professional
$column18Header = "වර්තමාන පත්වීමේ වර්ගීකරණය"; //Course of study
$column19Header = "නිරතවන කාර්යය"; //Section
$column20Header = "වැඩිම කාලයක් උගන්වන විෂයය"; //Subj most taught
$column21Header = "දෙවනුව වැඩි කාලයක් උගන්වන විෂයය"; //Subj 2nd most taught

$column222324Header = "2012.01.01 සිට 2012.12.31 දක්වා ලබාගෙන ඇති නිවාඩු ගණන ( පූර්ණ සංඛ්‍යාවලින් )";
$column22Header = "අදාළ සේවය / ශ්‍රේණීය"; //Service Grade
$column23Header = "අනියම් / විවේක"; //Other Leave
$column24Header = "රාජකාරි / අධ්‍යයන"; //Official
$column25Header = "ප්‍රසූත නිවාඩු"; //Maternity
$column26Header = "2013 මැයි මස මුළු වැටුප (සියලුම දීමනා ඇතුලත් කළ යුතු අතර අඩු කිරීම නොසලකන්න. පැරණි හිඟ මුදල් ශත ගණන් ඇතුලත් නොකරන්න)"; //salary
$column27Header1 = "සාම නිලධාරියකු සඳහාම අනිවාර්යයෙන් ම ජාතික හැඳුනුම් පත් අංකය සඳහන් කල යුතුය";
$column27Header2 = "ජාතික හැඳුනුම් පත් අංකය ";
$column27Header3 = "උදා 583021007 V";


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

    <script>
        $(document).ready( function(){
            $( '#PrintButton' ).on( 'click', function(){
                $("#PrintButton").attr( "hidden", "hidden" ) ;

                var print = setInterval( function(){
                    window.print();
                    clearInterval( print );
                }, 300 );
            });
        });
    </script>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        h1, h2, h3{
            text-align: center;
        }
        .report{
        }
        .report, .report th, .report td{
            /*text-align: justify;*/
            border: 1px solid black;
            border-collapse: collapse;
        }
        .report .headerRow{
            height:300px;
        }
        .report .salary{
            text-align: right;
        }
        .report .center{
            text-align: center;
        }
        .numbers td{
            text-align: center;
        }
        .secret td{
            border-top: 1px solid white;
            border-left: 1px solid white;
            border-right: 1px solid white;
        }
        .numberCol{
            text-align: left;
            white-space: nowrap;
            text-overflow: ellipsis;
            min-width: 25px;
            max-width: 25px;

            writing-mode: bt-rl;
            text-indent: -7.5em;
            padding: 0px 0px 0px 0px;
            margin: 0px;
        }
        .upcol{
            position: relative;
            text-align: left;
            white-space: nowrap;
            top: 50px;
            text-overflow: ellipsis;
            min-width: 25px;
            max-width: 25px;
            /*display: block;*/
            /*background-color: white;*/
            /*border-bottom: 1px solid black;*/

            writing-mode: bt-rl;
            /*text-indent: -7.5em;*/
            padding: 0px 0px 0px 0px;
            margin: 0px;

        }
        .upcol1{
            position: relative;
            text-align: left;
            white-space: nowrap;
            top: 265px;
            left: 0px;
            text-overflow: ellipsis;
            min-width: 25px;
            max-width: 25px;
            /*display: block;*/
            /*background-color: white;*/
            /*border-bottom: 1px solid black;*/

            writing-mode: bt-rl;
            /*text-indent: -7.5em;*/
            padding: 0px 0px 0px 0px;
            margin: 0px;

        }

        .whiteBox{
            display: block;
            position: relative;
            z-index: 3;
            background-color: #ffffff;
            left:1px;
            top:15px;
            padding-top: 10px;
            padding-bottom: 20px;
            width: 74px;
            height: 32px;
            border-bottom: 1px solid #000000;
        }
        .whiteBoxdown{
            display: block;
            position: relative;
            z-index: 1;
            /*background-color: #ffffff;*/
            text-indent:1em;
            left:-5px;
            top:0px;

            /*padding-top: 10px;*/

            width: 247px;
            border-left: 1px solid #000000;
            border-top: 5px solid #ffffff;
        }
        .whiteBoxup{
            display: block;
            position: relative;
            z-index: 1;
            /*background-color: #ffffff;*/
            text-indent:1em;
            left:-5px;
            top:0px;

            /*padding-top: 10px;*/

            width: 230px;
            border-left: 1px solid #000000;
            border-bottom: 1px solid #ffffff;
        }
        #col_0{
            text-indent: -6.5em;
            max-width: 50px;
            min-width: 50px;
        }
        #col_1{
            max-width: 300px;
            min-width: 300px;
            padding-left: 10px;
            padding-right: 10px;
        }
        #col_26{
            max-width: 180px;
            min-width: 180px;
            /*padding-left: 8px;*/
            /*padding-right: 8px;*/
        }
        #col_27{
            text-align: justify;
            padding-left: 14px;
            padding-right: 14px;

            max-width: 200px;
            min-width: 200px;
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

            /*vertical-align: top;*/
        }
        #PrintButton{
            position: absolute;
            top: 40px;
            left :40px;
            font-size: 1.5em;
        }
        #PrintButton .hidden{
            display: none;
        }
    </style>
</head>
<body>
    <h2><?php echo $line1 ?></h2>
    <h3><?php echo $line2 ?></h3>

    <table class="report">
        <tr class="secret">
            <td></td>
            <td></td>
            <td class="upcol"><div class="whiteBox"><?php echo $column234Header ?></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="upcol1 rotate"><div class="whiteBoxup"><?php echo $column910Header1 ?></div></td>
            <td class="upcol1 rotate"><div class="whiteBoxdown"><?php echo $column910Header2 ?></div></td>
            <td class="upcol1 rotate"><div class="whiteBoxup"><?php echo $column1112Header1 ?></div></td>
            <td class="upcol1 rotate"><div class="whiteBoxdown"><?php echo $column1112Header2 ?></div></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan="10"></td>
        </tr>
        <tr></tr>
        <tr class="headerRow">
            <td id="col_0" class="rotate numberCol"><?php echo $column0Header ?></td>
            <td id="col_1"><?php echo "<p>$column1Header1</p><p>$column1Header2</p>" ?></td>
            <td id="col_2" class="rotate numberCol"><?php echo $column2Header ?></td>
            <td id="col_3" class="rotate numberCol"><?php echo $column3Header ?></td>
            <td id="col_4" class="rotate numberCol"><?php echo $column4Header ?></td>
            <td id="col_5" class="rotate numberCol"><?php echo $column5Header ?></td>
            <td id="col_6" class="rotate numberCol"><?php echo $column6Header ?></td>
            <td id="col_7" class="rotate numberCol"><?php echo $column7Header ?></td>
            <td id="col_8" class="rotate numberCol"><?php echo $column8Header ?></td>
            <td id="col_9" class="rotate numberCol"><?php echo $column9Header ?></td>
            <td id="col_10" class="rotate numberCol"><?php echo $column10Header ?></td>
            <td id="col_11" class="rotate numberCol"><?php echo $column11Header ?></td>
            <td id="col_12" class="rotate numberCol"><?php echo $column12Header ?></td>
            <td id="col_13" class="rotate numberCol"><?php echo $column13Header ?></td>
            <td id="col_14" class="rotate numberCol"><?php echo $column14Header ?></td>
            <td id="col_15" class="rotate numberCol"><?php echo $column15Header ?></td>
            <td id="col_16" class="rotate numberCol"><?php echo $column16Header ?></td>
            <td id="col_17" class="rotate numberCol"><?php echo $column17Header ?></td>
            <td id="col_18" class="rotate numberCol"><?php echo $column18Header ?></td>
            <td id="col_19" class="rotate numberCol"><?php echo $column19Header ?></td>
            <td id="col_20" class="rotate numberCol"><?php echo $column20Header ?></td>
            <td id="col_21" class="rotate numberCol"><?php echo $column21Header ?></td>
            <td id="col_22" class="rotate numberCol"><?php echo $column22Header ?></td>
            <td id="col_23" class="rotate numberCol"><?php echo $column23Header ?></td>
            <td id="col_24" class="rotate numberCol"><?php echo $column24Header ?></td>
            <td id="col_25" class="rotate numberCol"><?php echo $column25Header ?></td>
            <td id="col_26" class="rotate"><?php echo $column26Header ?></td>
            <td id="col_27" class="" colspan="10"><?php echo "<p>$column27Header1</p><p>$column27Header2</p><p>$column27Header3</p>"  ?></td>
        </tr>
        <tr class="numbers">
            <td></td>
            <td>01</td>
            <td>02</td>
            <td>03</td>
            <td>04</td>
            <td>05</td>
            <td>06</td>
            <td>07</td>
            <td>08</td>
            <td>09</td>
            <td>10</td>
            <td>11</td>
            <td>12</td>
            <td>13</td>
            <td>14</td>
            <td>15</td>
            <td>16</td>
            <td>17</td>
            <td>18</td>
            <td>19</td>
            <td>20</td>
            <td>21</td>
            <td>22</td>
            <td>23</td>
            <td>24</td>
            <td>25</td>
            <td>26</td>
            <td colspan="10">27</td>
        </tr>

        <?php
        $initial = $_GET["start"];
        $result = getAllStaffDetailed( $initial );

        if ($result == null)
        {
            echo "<tr><td colspan='37'>There are no records to show.</td></tr>";
        }
        else
        {
            foreach($result as $row){
                echo "<tr>\n";
                echo "<td>$row[0]</td>";

                $date = strtotime($row[2]); //DOB
                echo "<td>$row[1]</td>";
                echo "<td>" . date("y",  $date) . "</td>";
                echo "<td>" . date("m",  $date) . "</td>";
                echo "<td>" . date("d",  $date) . "</td>";
                echo "<td>$row[3]</td>"; //Gender
                echo "<td>$row[4]</td>"; //Nat/Race
                echo "<td>$row[5]</td>"; //Religion
                echo "<td>$row[6]</td>"; //Civil Status
                $date = strtotime($row[10]); //Date Appointed to Post
                echo "<td>" . date("y",  $date) . "</td>";
                echo "<td>" . date("m",  $date) . "</td>";
                $date = strtotime($row[11]); //Date Appointed to Post
                echo "<td>" . date("y",  $date) . "</td>";
                echo "<td>" . date("m",  $date) . "</td>";
                echo "<td>$row[12]</td>"; //Employment Status
                echo "<td>$row[13]</td>"; //Medium
                echo "<td>$row[14]</td>"; //Position in School
                echo "<td>$row[20]</td>"; //Highest Educational Qualification
                echo "<td>$row[21]</td>"; //Highest Professional Qualification
                echo "<td>$row[22]</td>"; //Course of Study
                echo "<td>$row[15]</td>"; //Section
                echo "<td>$row[16]</td>"; //Subje Most
                echo "<td>$row[17]</td>"; //Subj 2nd Most
                echo "<td>$row[18]</td>"; //Service Grade
                echo "<td>$row[0]</td>"; //Other Leave
                echo "<td>$row[0]</td>"; //Offical Leave
                echo "<td>$row[0]</td>"; //Maternity
                echo "<td class='salary'>" . number_format( $row[19], 2, ".", "," ). "</td>"; //Salary


                echo "<td class='center'>" . substr($row[7], 0, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 1, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 2, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 3, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 4, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 5, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 6, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 7, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . substr($row[7], 8, 1) . "</td>";//NIC NUMBER
                echo "<td class='center'>" . strtoupper( substr($row[7], 9, 1) ) . "</td>";//NIC NUMBER
                echo "</tr>\n";
            }
        }


        ?>


    </table>

    <input id="PrintButton" type="button" value="Print Report" />

    <br />

</body>
</html>