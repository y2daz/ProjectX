<?php
/**
 * Created by PhpStorm.
 * User: Tharindu
 * Date: 8/8/14
 * Time: 10:56 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="main.css">
    <script src="script.js"></script>
</head>

<body>
    <h1>Assign Subjects for Grades </h1>
    <form>
    <table id="info">
        <tr>
            <th> Grade : </th>
           <th> <input type="text" class="text1" name="class" value=""> </th>
        </tr>
    </table>

    <table id="subjectList">
        <tr>
            <td>1</td>
            <td><input type='text' class='myText' name='sub' required="true"></td>
        </tr>
    </table>
    <input name="Add" type="Button" value="Add another subject" onclick="addTextbox();"/>
    <input name="Submit" type="Submit" value="Submit" />
    </form>
<?php
//echo"<table id='gradesubject''>";
//    for( $i =1 ;$i<=4 ; $i++)
//        {
//       echo"<tr>";
//               echo"<td>$i</td>";
//               echo"<td><input type='text' class='text' name='sub'+$i ></td>";
//        echo"</tr>";
//
//        }
//?>

</body>

</html>