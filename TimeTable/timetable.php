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

$fullPageHeight = 1000;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";

$lang = $_COOKIE["language"];

?>
<html>
    <head>
        <link rel="stylesheet" href="timetable.css">
        <script src="timetable.js"></script>
    </head>
    <body>

    <form>

    <h1><?php echo getLanguage("createTimeTableForm", $lang) ?></h1>

    <h2><?php echo getLanguage("chooseOption", $lang) ?></h2>

    <table id="info">
        <tr>
            <td><input type="RADIO" name="Choice" value="Teacher" checked="1" onclick="clickedTeacher()"/><?php echo getLanguage("byTeacher",$lang)?> </td>
            <td><input type="RADIO" name="Choice" value="Class" onclick="clickedClass()" /> <?php echo getLanguage("byClass",$lang)?></td>
        </tr>
        <tr>
            <td colspan="2"><span id="selection"><?php echo getLanguage("teachersName",$lang)?> : </span><input type="text" class="text1" name="class" value=""></td>
        </tr>
    </table>

    <table id="timetable" >
        <tr>
            <th class="time"><?php echo getLanguage("time",$lang)?></th>
            <th><?php echo getLanguage("monday",$lang)?></th>
            <th><?php echo getLanguage("tuesday",$lang)?></th>
            <th><?php echo getLanguage("wednesday",$lang)?></th>
            <th><?php echo getLanguage("thursday",$lang)?></th>
            <th><?php echo getLanguage("friday",$lang)?></th>

        </tr>

        <tr>
            <td class="time">07.50-08.30</td>
            <td >
                <table id="collapse" border="0px">
                    <tr class="rowToHide" >
                        <td><input type="text"  name="txtClass1" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, '<?php echo getLanguage('class', $lang);?>')" onblur="makeGrayText(this, '<?php echo getLanguage('class', $lang);?>')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject1" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td ><input type="text" name="txtClass2" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject2" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass3" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject3" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass4" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject4" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass5" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject5" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>


        <tr>
            <td class="time">08.30-09.10</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass6" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject6" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass7" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject7" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass8" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject8" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass9" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject9" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass10" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject10" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr>
            <td class="time">09.10-09.50</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass11" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject11" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass12" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject12" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass13" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject13" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass14" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject14" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass15" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject15" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr>
            <td class="time">09.50-10.30</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass16" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject16" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass17" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject17" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass18" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject18" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass19" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject19" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass20" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject20" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td  class="time">10.30-10.50</td>
            <td  colspan="5" align="center"><?php echo getLanguage("interval",$lang)?></td>
        </tr>


        <tr>
            <td class="time">10.50-11.30</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass21" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject21" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass22" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject22" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass23" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject23" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass24" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject24" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass25" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject25" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>



        <tr>
            <td class="time">11.30-12.10</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass26" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject26" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass27" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject27" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass28" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject28" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass29" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject29" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass30" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject30" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>

        </tr>


        <tr>
            <td class="time">12.10-12.50</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass31" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr >
                        <td><input type="text" name="txtSubject31" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass32" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject32" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass33" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject33" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass34" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject34" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass35" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject35" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>

        </tr>


        <tr>
            <td class="time">12.50-01.30</td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text"  name="txtClass36" required="true" value="Class" class="grayText text  "
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject36" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass37" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject37" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass38" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject38" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass39" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject39" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
            <td >
                <table id="collapse">
                    <tr class="rowToHide">
                        <td><input type="text" name="txtClass40" required="true" value="Class" class="grayText text"
                                   onfocus="remGrayText(this, 'Class')" onblur="makeGrayText(this, 'Class')"/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="txtSubject40" required="true" value="Subject" class="grayText text"
                                   onfocus="remGrayText(this, 'Subject')" onblur="makeGrayText(this, 'Subject')"/></td>
                    </tr>
                </table>
            </td>
        </tr>


    </table>
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
            <th><input type="submit" name="submit" value="SUBMIT" onclick=""></th>
        </tr>
    </table>

    </form>

    </body>
</html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>