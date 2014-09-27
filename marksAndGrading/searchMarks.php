<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 26/07/14
 * Time: 12:04
 */
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
error_reporting(E_ERROR | E_PARSE);
ob_start();

if (isset($_GET["search"]))
{
    $currentresult = null;

    if ($_GET["Choice"] == "AdmissionNo")
    {
        $currentresult =getOL($_GET["indexNo"]) ;
    }

    else if($_GET["Choice"] == "IndexNo")
    {
        $currentStudent = getOLadmission($_GET["admissinNo"]);
        //echo $_GET["value"];
    }
    else if($_GET["Choice"] == "Year")
    {
        $currentStudent = getOLyear($_GET["year"]);
        //echo $_GET["value"];
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

    h2{
        text-align: center;
        background-color: #005e77;
        color: #ffffff;
    }


    #term, th, td {
        border: 0px solid black;

    }


    #term td {
        text-align:center;
        height: 80px;
    }

    #term tr{
        height: 20px;
        width: 0px;

    }

    #OL, th, td {
        border: 0px solid black;

    }


    #OL td {
        text-align:center;
        height: 80px;
    }

    #OL tr{
        height: 20px;
    }

    #AL, th, td {
        border: 0px solid black;

    }


    #AL td {
        text-align:center;
        height: 80px;

    }

    #AL tr{
        height: 50px;
    }


    input.buttonterm {
        position:relative;
        font-weight:bold;
        font-size:20px;

    }


    input.buttonOL {
           position:relative;
           font-weight:bold;
           font-size:20px;

       }

    input.buttonAL {
        position:relative;
        font-weight:bold;
        font-size:20px;

    }



</style>
    </head>


<body>

    <h1>Search Results</h1>

    <h2>Search G.C.E.O/L Results</h2>

    <form action="OLevelSearch.php"method="get" class="insert">
        <form action="OLReport.php.php"method="get" class="insert">

            <table id="OL">
                <tr>
                    <td colspan="1"><span id="selection">Search : </span>
                        <input type="text" class="text1" name="value" id="value" value=""/>
                    </td>
                    <td ><input class="buttonOL" name="search" type="submit" value="Search"></td>
                </tr>

                <tr>
                    <td><input type="RADIO" name="Choice" value="AdmissionNo" checked/>By Admission Number</td>
                    <td><input type="RADIO" name="Choice" value="IndexNo"  />Index Number</td>
                    <td><input type="RADIO" name="Choice" value="Year"  />Year</td>
                </tr>

            </table>
        </form>
        </form>




    <h2>Search G.C.E. A/L Results</h2>

    <table id="AL">

        <form action="ALevelSearch.php" method="get" class="insert">

            <table id="OL">
                <tr>
                    <td colspan="1"><span id="selection">Search : </span>
                        <input type="text" class="text1" name="value" id="value" value=""/>
                    </td>
                    <td ><input class="buttonAL" name="search1" type="submit" value="Search"></td>
                </tr>

                <tr>
                    <td><input type="RADIO" name="Choice" value="AdmissionNo" />By Admission Number</td>
                    <td><input type="RADIO" name="Choice" value="IndexNo"  />Index Number</td>
                </tr>

            </table>
        </form>




    <h2>Search Term Test Marks</h2>

    <form>
    <table id="term">

    <tr>

        <td>Admission Number</td>
        <td><input name="admissionNo" type="text" value=""></td>
        <td>Year</td>
        <td><input name="year" type="text" value=""></td>
        <td>Term</td>
        <td><select name="Term" type="text" value="" >

                <option>Mid</option>
                <option>Final</option>
            </select></td>

        <td><input class="buttonterm" name="search2" type="submit" value="Search"></td>


        </tr>
        </table>
        </form>
















</body>
</html>

<?php
//Change these to what you want
$fullPageHeight = 800;

$footerTop = $fullPageHeight + 100;
$pageTitle= "Search Grading Information";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>