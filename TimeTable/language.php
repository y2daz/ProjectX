<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 8/8/14
 * Time: 10:56 PM
 */

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once("../dbAccess.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>

    <script>

        function searchEmail(element){
//                 alert(element.value)
            var text = $(element).val();

            if (text.length >= 1)
            {
//                alert(text);
                $("td.searchLanguage").closest('tr').addClass("hide");
                $("td.searchLanguage").filter(function(){ return($.text([this]).indexOf(text) > -1); }).closest('tr').removeClass("hide");
            }
            else
            {
                $("td.searchLanguage").closest('tr').removeClass("hide");
            }
        }


    </script>
    <style>
        *{
            font-family: "Open Sans";
            font-weight: 400;
        }
        h1{
            font-weight: 600;
        }
        .LanguageList{
            min-width: 600px;
        }
        .LanguageList td.content{
            min-width: 150px;
        }
        .LanguageList .alt{
            background-color: #bed9ff;
        }
        .LanguageList .noAlt{
            background-color: #ffffff;
        }
        .LanguageList .search{
            background-color: #D8FFBD;
        }
        .hide{
            display: none;
        }
        td{
            padding: 2px 6px 2px 6px;
        }
        th {
            font-weight: 600;
        }

    </style>

<!--    <link rel="stylesheet" href="../reportico/stylesheet/cleanandsimple.css" type="text/css" />-->

</head>

<body>
    <h1>Assign Label Language Data</h1>
    <h2>This is for labels and button text and stuff.<stuff class=""></stuff></h2>
    <form method="POST">

    <table id="labelList">
        <tr>
            <th>Label</th>
            <th>English</th>
            <th>Sinhala</th>
            <th></th>
        </tr>
        <tr>
            <td><input type='text'class="text1" name="label" required="true" onkeyup="searchEmail(this)"/></td>
            <td><input type='text' class='text1' name='english' required="true"></td>
            <td><input type='text' class='text1' name='sinhala' required="true"></td>
            <td><input name="Submit" type="Submit" value="Submit" /></td>
        </tr>
    </table>



    </form>

    <br />
        <table class="LanguageList">
            <tr>
                <th>#</th>
                <th>Label</th>
                <th>English</th>
                <th>Sinhala</th>
            </tr>

            <?php
            $result = getAllLanguage();
            $i = 0;

            foreach($result as $row){
                $top = ($i++ % 2 == 0)? "<tr class=\"alt \"><td>$i</td><td class=\"searchLanguage content\" >" : "<tr><td>$i</td><td class=\"searchLanguage content\" >\n";
                echo $top;
                echo "$row[0]";
                echo "<td class=\"content\">$row[1]</td>\n";
                echo "<td class=\"content\">$row[2]</td>\n";
                echo "</td></tr>\n";
            }
            ?>
        </table>


    <!-- Start of Reportico Report -->
    <?php
/*
    set_include_path('../reportico/');
    require('reportico.php');
    $a = new reportico();
    $a->initial_project = "test";
//    $a->initial_project_password = "password";
    $a->report = "TestRep.xml";
    $a->execute_mode= "EXECUTE";
    $a->target_format = "PDF";
    $a->target_style= "table";
//    $a->initial_output_format = "HTML";
    $a->access_mode = "REPORTOUTPUT";
    $a->embedded_report = false;
    $a->execute();

//    $a->forward_url_get_parameters = "x1=y1&x2=y2";
    */?>

<?php

if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    if ( $operation = insertLanguage($_POST["label"], $_POST["english"], $_POST["sinhala"]))
    {

    }
}

function insertLanguage($label, $english, $sinhala)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $mysqli->set_charset("utf8") ;


    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;
    $noE = 0;
    $noS = 1;

    if ($stmt = $mysqli->prepare("INSERT INTO LabelLanguage values(?, ?, ?, ?);"))
    {
        $stmt -> bind_param("sisi", $label, $noE, $english, $isDeleted);
        if ($stmt->execute())
        {
            $stmt -> bind_param("sisi", $label, $noS, $sinhala, $isDeleted);
            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
    }
    $stmt->close();
    $mysqli->close();
    return false;
}

function getAllLanguage(){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $mysqli->set_charset("utf8") ;


    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT l1.Label, l1.Value, l2.Value FROM LabelLanguage l1 LEFT OUTER JOIN LabelLanguage l2 ON (l1.Label = l2.Label) WHERE l1.Language=0 AND l2.Language=1 ORDER BY l1.Label;"))
    {
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row;
            }
        }
    }
    $mysqli->close();

    return $set;

}


?>

</body>

</html>