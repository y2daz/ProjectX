<?php
///**
// * Created by PhpStorm.
// * User: yazdaan
// * Date: 07/08/14
// * Time: 21:24
// */
//
//    require_once("dbAccess.php");
//
//    function createAttendanceColumns(){
//
//        $conn = mysqli_connect('localhost', "root", "secret", 'manaDB');
//
//        for ($columnNo = 0; $columnNo < 260; $columnNo++)
//        {
//            $columnName = chr( ($columnNo/26)+(65)) . ($columnNo%26);
//            echo $columnName . "<br />";
//            mysqli_query($conn, " ALTER TABLE 'Attendance' ADD $columnName BIT;");
//
//        }
//        mysqli_close($conn);
//    }
//
//    createAttendanceColumns();
//
//

//DONE

require_once("../dbAccess.php");
//$email="a";
//$password = "a";
//$accessLevel = 1;
//
//$dbObj = new dbConnect();
//$mysqli = $dbObj->getConnection();
//
//if ($mysqli->connect_errno) {
//    die ("Failed to connect to MySQL: " . $mysqli->connect_error );
//}
//
//$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//
//if ($stmt = $mysqli->prepare("INSERT INTO User values(?, ?, ?);"))
//{
//    $stmt -> bind_param("sss", $email, $hashedPassword, $accessLevel);
//    if ($stmt->execute())
//    {
//        $stmt->close();
//        $mysqli->close();
//        return true;
//    }
//}
//$mysqli->close();
//return false;
//
/**
 * This code will benchmark your server to determine how high of a cost you can
 * afford. You want to set the highest cost that you can without slowing down
 * you server too much. 10 is a good baseline, and more is good if your servers
 * are fast enough.
 */
//$timeTarget = .1;
//
//$cost = 9;
//do {
//    $cost++;
//    $start = microtime(true);
//    password_hash("test", PASSWORD_BCRYPT, ["cost" => $cost]);
//    $end = microtime(true);
//} while (($end - $start) < $timeTarget);
//
//echo "Appropriate Cost Found: " . $cost . "\n";
//
//
insertUser("man", 'a', 1);

?>