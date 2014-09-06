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
include(THISROOT . "/common.php");
include("timetableClass.php");
ob_start();


$lang = $_COOKIE["language"];

$_GET["getTimetable"] = $_GET["getTimetable"] | "";

$currentStaffId = "";
$currentStaffName = "";

error_reporting(0);//Temporarily turn of all errors

if (isFilled($_GET["getTimetable"]))
{
    $currentStaffId = $_GET["staffID"];
    $result = getStaffMember($_GET["staffID"]);

    $row = $result[0];
    $currentStaffName = $row[1];

    $myTime = new Timetable();

    $myTime->staffId = "$currentStaffId";
    $myTime->getTimetableFromDB();
}

?>
<html>
    <head>
        <link rel="stylesheet" href="timetable.css">
        <script src="timetable.js"></script>

        <script>
            $(document).ready(function() {

                var i = 0;

                setInterval(function(){
//                    alert("try");
                    $("#" + i).toggleClass("animated", 600);
                    i++;
                    if(i >= 40)
                        i=0;
                }, 12);

                var editable = false;

                $('#btnMakeEditable').on('click', function(e){
                    if (editable == false){
                        $('.classroom input').each( function(i, obj){
                            $(obj).attr("readonly", false);});
                        $('.subject textarea').each( function(i, obj){
                            $(obj).attr("readonly", false);});
                        editable = true;
                    }
                    else{
                        $('.classroom input').each( function(i, obj){
                            $(obj).attr("readonly", true);});
                        $('.subject textarea').each( function(i, obj){
                            $(obj).attr("readonly", true);});
                        editable = false;
                    }
                });


            });
        </script>
    </head>
    <body>

    <form>

    <h1><?php echo getLanguage("createTimetable", $lang) ?></h1>

<!--    <h2>--><?php //echo getLanguage("chooseOption", $lang) ?><!--</h2>-->
    <form method="get">
        <table id="info">
            <tr>
                <td><label><?php echo getLanguage("staffId",$lang)?></td>
                    <td><input type="text" class="text1" name="staffID" value="<?php echo $currentStaffId?>" /></td>
                    <td><input type="submit" class="text1" name="getTimetable" value="Submit" /></td>

            </tr>
            <tr><td></td>
                <td colspan="2"><label class="text1"><?php echo $currentStaffName;?></label></td>
            </tr>
        </table>
    </form>

    <table class="timetable" >
        <tr>
            <th class="time"><?php echo getLanguage("time",$lang)?></th>
            <th><?php echo getLanguage("monday",$lang)?></th>
            <th><?php echo getLanguage("tuesday",$lang)?></th>
            <th><?php echo getLanguage("wednesday",$lang)?></th>
            <th><?php echo getLanguage("thursday",$lang)?></th>
            <th><?php echo getLanguage("friday",$lang)?></th>
        </tr>

        <?php
            $timeArray = array("07.50-08.30", "08.30-09.10", "09.10-09.50", "09.50-10.30", "10.50-11.30", "11.30-12.10", "12.10-12.50", "12.50-01.30" );
            $colourArray = array("#f69988", "#f48fb1", "#ce93d8", "#b39ddb", "#9fa8da", "#afbfff", "#81d4fa", "#80deea", "#80cbc4", "#72d572", "#c5e1a5", "#e6ee9c", "#ffcc80", "#fff59d", "#ffe082"); //15

            $classColour = array();


            for($i = 0; $i < 8; $i++){

                if(($i == 4)){ //INTERVAL
                    $intervalRow = "\t<tr class=interval>\t<td>10.30-10.50</td> \t<td colspan=\"5\" >" . "INTERVAL" . "</td>\t</tr>\n";
                    echo $intervalRow;
                }

                for($x = 0; $x < 6; $x++){
                    $thisCell = "";
                    if($x == 0){
                        $thisCell = "\t<tr>\t";
                        $thisCell .= "<td>" . $timeArray[ $i ] . "</td>";
                    }
                    else{ //Normal rows are here.
                        $number=($i + (8 * ($x - 1) ));
                        $thisCell = "";

                        $subject = $myTime->slot[$number]->Subject;
                        $class = $myTime->slot[$number]->Grade . " " . $myTime->slot[$number]->Class;

                        $currColour = $colourArray[(rand(0,14))];
                        while ( in_array($currColour, $classColour) )
                        {
                            $currColour = $colourArray[(rand(0,14))];
                        }

                        if( trim($class) == ""){
                            $classColour[$class] = "#dedede";
                        }
                        if ($classColour[$class] == ""){
                            $classColour[$class] = $currColour;
                        }
                        else{
                            $currColour = $classColour[$class];
                        }

                        $classDiv = "<div class='classroom'><input readonly value='" . $class . "' /></div>";

                        $thisCell .= "\t<td class='subject' style='background-color:$currColour;'  id=\"" . $number . "\">" . $classDiv;  //($i + (8 * ($x - 1) )) Array position
                        $thisCell .= "<textarea readonly style='background-color:$currColour;'>" . $subject . "</textarea></td>";
                        if ($x % 5 == 0)
                            $thisCell .= "\t</tr>\n";
                    }
                    echo $thisCell;
                }
            }
        ?>
</table>

    <br/>
    <br/>
    <br/>
<!--    <table>-->
<!--        <tr>-->
<!--            <td class="time">07.50-08.30</td>-->
<!--            <td >-->
<!--                <table id="0" class="collapse" border="0px">-->
<!--                    <tr class="rowToHide" >-->
<!--                        <td><input type="text"  name="txtClass_0" required="true" value="--><?php //echo getLanguage('class', $lang);?><!--" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, '--><?php //echo getLanguage('class', $lang);?><!--')" onblur="makeGrayText(this, '--><?php //echo getLanguage('class', $lang);?><!--')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject1" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="8" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td ><input type="text" name="txtClass2" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject2" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="16" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass3" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject3" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="24" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass4" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject4" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="32" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass5" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject5" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">08.30-09.10</td>-->
<!--            <td >-->
<!--                <table id="1" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass6" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject6" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="9" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass7" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject7" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="17" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass8" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject8" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="25" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass9" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject9" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="33" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass10" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject10" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">09.10-09.50</td>-->
<!--            <td >-->
<!--                <table id="2" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass11" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject11" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="10" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass12" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject12" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="18" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass13" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject13" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="26" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass14" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject14" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="34" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass15" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject15" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">09.50-10.30</td>-->
<!--            <td >-->
<!--                <table id="3" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass16" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject16" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="11" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass17" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject17" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="19" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass18" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject18" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="27" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass19" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject19" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="35" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass20" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject20" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td  class="time">10.30-10.50</td>-->
<!--            <td  colspan="5" align="center">--><?php //echo getLanguage("interval",$lang)?><!--</td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">10.50-11.30</td>-->
<!--            <td >-->
<!--                <table id="4" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass21" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject21" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="12" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass22" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject22" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="20" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass23" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject23" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="28" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass24" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject24" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="36" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass25" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject25" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">11.30-12.10</td>-->
<!--            <td >-->
<!--                <table id="5" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass26" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject26" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="13" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass27" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject27" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="21" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass28" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject28" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="29" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass29" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject29" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="37" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass30" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject30" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!---->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">12.10-12.50</td>-->
<!--            <td >-->
<!--                <table id="6" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass31" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr >-->
<!--                        <td><input type="text" name="txtSubject31" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="14" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass32" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject32" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="22" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass33" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject33" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="30" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass34" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject34" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="38" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass35" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject35" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!---->
<!--        </tr>-->
<!---->
<!--        <tr>-->
<!--            <td class="time">12.50-01.30</td>-->
<!--            <td >-->
<!--                <table id="7" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text"  name="txtClass36" required="true" value="Class" class="grayText text  "-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject36" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="15" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass37" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject37" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="23" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass38" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject38" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="31" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass39" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject39" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--            <td >-->
<!--                <table id="39" class="collapse">-->
<!--                    <tr class="rowToHide">-->
<!--                        <td><input type="text" name="txtClass40" required="true" value="Class" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td><input type="text" name="txtSubject40" required="true" value="Subject" class="grayText text"-->
<!--                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!---->
<!--    </table>-->
    <br>
    <br>
    <div id="toHide" hidden="hidden">
        <h2>Assign Teachers</h2>

        <table id="assign" class="toHide" >
            <tr>
                <th>Subject</th>
                <th>Teacher</th>
            </tr>
            <tr>
                <td class="noOfSubject" >Subject 1</td>
                <td ><input type="text" class="text2" name="t1"></td>
            </tr>
        </table>
        <table id="submit">
            <tr>
                <th><input type="button" name="addNewSubject" value="Add New Subject" onclick="addNewRow()"></th>
            </tr>
            </table>
    </div>

    <table id="submit">
        <tr>
            <td><input id="btnMakeEditable" type="submit" name="btnMakeEditable" value="Edit Timetable"></td>
            <td><input type="submit" name="submit" value="Save Timetable" onclick="" ></td>
        </tr>
    </table>

    </form>

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 1100;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Timetable";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>