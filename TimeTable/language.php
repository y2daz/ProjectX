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
    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
</head>

<body>
    <h1>Assign Subjects for Grades </h1>
    <form method="POST">

    <table id="labelList">
        <tr>
            <th>Label</th>
            <th>English</th>
            <th>Sinhala</th>
        </tr>
        <tr>
            <td><input type='text'class="text1" name="label" required="true"/></td>
            <td><input type='text' class='text1' name='english' required="true"></td>
            <td><input type='text' class='text1' name='sinhala' required="true"></td>
        </tr>
    </table>

    <input name="Submit" type="Submit" value="Submit" />

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
                $top = ($i++ % 2 == 0)? "<tr class=\"alt\"><td>$i</td><td>" : "<tr><td>$i</td><td>";
                echo $top;
                echo "$row[0]";
                echo "<td>$row[1]</td>";
                echo "<td>$row[2]</td>";
                echo "</td></tr>";
            }
            ?>
        </table>

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

    if ($stmt = $mysqli->prepare("Select e.label, e.Value, s.Value FROM LabelLanguage e INNER JOIN LabelLanguage s ON e.Label=s.Label AND e.Language <> s.language  WHERE  s.isDeleted = 0 ORDER BY Label;"))
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