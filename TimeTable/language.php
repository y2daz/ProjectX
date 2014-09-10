<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 8/8/14
 * Time: 10:56 PM
 */

define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once("../dbAccess.php");
require_once("../common.php");

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/scripts/jquery-impromptu.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>

    <script>
        $(document).ready(function() {

            function UCFirst(string)
            {
                return string.charAt(0).toUpperCase() + string.slice(1);
            }
            function LCFirst(string)
            {
                return string.charAt(0).toLowerCase() + string.slice(1);
            }

            $("#pasteZoneLab").on("input propertychange paste", function(){
                var enteredText = $(this).val().split("\n");
                var NoofLines = $(this).val().split("\n").length;

                if (NoofLines <= 10){
                    var i = 0;

                    for(i = 0; i < NoofLines; i++){
                        var currentLine = enteredText[i].split("=");
                        var currentLineE = currentLine[0];
                        var currentLineS = currentLine[1];

                        currentLineE = currentLineE.replace("$","");
                        currentLineE = currentLineE.replace('"',"");
                        currentLineE = currentLineE.replace('"',"");
                        currentLineE = currentLineE.replace('"',"");
                        currentLineE = currentLineE.trim();

                        currentLineS = currentLineS.replace("$","");
                        currentLineS = currentLineS.replace('"',"");
                        currentLineS = currentLineS.replace('"',"");
                        currentLineS = currentLineS.replace('"',"");
                        currentLineS = currentLineS.replace(';',"");
                        currentLineS = currentLineS.trim();


                        $("#label_" + i).val( LCFirst(currentLineE) );
                        $("#sinhalavalue_" + i).val( currentLineS );
                    }
                }
                else{
                    alert("Too many lines.");
                }
            });

            $("#translate").on("click", function(){
                var enteredText = $("#pasteZoneFun").val().split("\n");
                var NoofLines = $("#pasteZoneFun").val().split("\n").length;

                var i = 0;

                var complete = "";

                for(i = 0; i < NoofLines; i++){
                    var currentLine = enteredText[i].split("=");
                    var currentLine1 = currentLine[0];
                    var currentLine2 = "";

                    currentLine1 = currentLine1.trim();

                    currentLine2 = currentLine1;
//                    alert(currentLine2);
                    currentLine2 = currentLine2 + " = ";
//                    alert(currentLine2);
                    currentLine2 = currentLine2 + " getLanguage('";
//                    alert(currentLine2);
                    currentLine1 = currentLine1.replace("$","");
                    currentLine2 = currentLine2 + currentLine1 + "', $language);";

                    complete = complete + currentLine2 + "\n";

                    $("#pasteZoneFun").val( complete );
                }
            });

            $(".label").on("blur input propertychange paste", function(){
                var myValue = $(this).val();
                var i=0;
                var ch='';
                while (i < myValue.length){
                    ch = myValue.charAt(i);
                    if (ch == ch.toUpperCase()) {
                        myValue = myValue.substr(0, i) + " " + myValue.substr(i, myValue.length - i);
                        i += 2;
                    }
                    else
                    {
                        i++;
                    }
                }

                var idArr = $(this).attr("id").split("_");
                var id = idArr[1];

//                alert(id);
                $("#englishvalue_" + id + "").val( UCFirst(myValue) );

            });
        });

        function searchEmail(element){
            //                 alert(element.value)
            var text = $(element).val();

            if (text.length >= 1)
            {
                //                alert(text);
                $("td.searchLanguage").closest('tr').addClass("hide");
                $("td.searchLanguage").filter(function(){ return($.text([this]).toLowerCase().indexOf( text.toLowerCase() ) > -1); }).closest('tr').removeClass("hide");
            }
            else
            {
                $("td.searchLanguage").closest('tr').removeClass("hide");
            }
        };
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
        .search{
            background-color: #D8FFBD;
        }
        .hide{
            display: none;
        }
        .languagelist td{
            padding: 2px 6px 2px 6px;
        }
        .languagelist th {
            font-weight: 600;
        }
        .label{
            width:350px;
        }
        .pasteZone{
            height:200px;
            width:500px;
        }

    </style>

<!--    <link rel="stylesheet" href="../reportico/stylesheet/cleanandsimple.css" type="text/css" />-->

</head>

<body>
    <h1>Assign Label Language Data</h1>
    <h2>This is for labels and button text and stuff. <a href="optionLanguage.php">Click here for entering values for drop-down lists and such.</a></h2>
    <form method="post">

        <table>
            <tr>
                <td>Paste area for PHP language code</td>
<!--                <td>Paste area for english</td>-->
<!--                <td>Paste area for sinhala</td>-->
            </tr>
            <tr>
                <td><textarea id="pasteZoneLab" class="pasteZone"></textarea></td>
<!--                <td><textarea id="pasteZoneEng" class="pasteZone"></textarea></td>-->
<!--                <td><textarea id="pasteZoneSin" class="pasteZone"></textarea></td>-->
            </tr>
        </table>

    <table id="labelList">
        <tr>
            <th>Label</th>
            <th>English</th>
            <th>Sinhala</th>
            <th></th>
        </tr>
        <?php
            for($i=0; $i<10; $i++)
            {
        ?>
        <tr>
            <td><input id="label<?php echo "_$i" ?>" type='text'class="label text1" name="label<?php echo "_$i" ?>" onkeyup="searchEmail(this)" /></td>
            <td><input id="englishvalue<?php echo "_$i" ?>" type="text" class='englishvalue text1' name='english<?php echo "_$i" ?>' ></td>
            <td><input id="sinhalavalue<?php echo "_$i" ?>" type='text' class='text1' name='sinhala<?php echo "_$i" ?>'></td>


        <?php
                if($i != 9){
                    echo "</tr>";
                }
                else{
                    echo '<td><input name="Submit" type="Submit" value="Submit" /></td></tr>';
                }
            }
        ?>
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


    <br />

    <table>
        <tr>
            <td>Paste area for PHP language code for generating getLanguage Functions</td>
            <!--                <td>Paste area for english</td>-->
            <!--                <td>Paste area for sinhala</td>-->
        </tr>
        <tr>
            <td><textarea id="pasteZoneFun" class="pasteZone"></textarea><input type="button" id="translate" value="translate"/></td>
            <!--                <td><textarea id="pasteZoneEng" class="pasteZone"></textarea></td>-->
            <!--                <td><textarea id="pasteZoneSin" class="pasteZone"></textarea></td>-->
        </tr>
    </table>


<?php

if (isset($_POST["Submit"])) //User has clicked the submit button to add a user
{
    $true = 0;
    for ($i = 0; $i < 10; $i++){
        if ( isFilled($_POST["label" . "_" . $i]))
        {
            $operation = insertLanguage($_POST["label" . "_" . $i], $_POST["english" . "_" . $i], $_POST["sinhala" . "_" . $i]);
            if ($operation == true){
                $true++;
            }
        }
    }

    echo $true . " values inserted";
    sendNotification($true . " values inserted");
}

function insertLanguage($label, $english, $sinhala)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $mysqli->set_charset("utf8") ;


    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $noE = 0;
    $noS = 1;

    if ($stmt = $mysqli->prepare("DELETE FROM LabelLanguage WHERE Label=?;"))
    {
        $stmt -> bind_param("s", $label);
        $stmt -> execute();
    }


    if ($stmt = $mysqli->prepare("INSERT INTO LabelLanguage values(?, ?, ?);"))
    {
        $stmt -> bind_param("sis", $label, $noE, $english);
        if ($stmt->execute())
        {
            $stmt -> bind_param("sis", $label, $noS, $sinhala);
            if ($stmt->execute())
            {
                $mysqli->close();
                return true;
            }
        }
        $stmt->close();
    }
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