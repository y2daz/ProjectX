<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 07/08/14
 * Time: 21:24
 */

    require_once("dbAccess.php");

    function createAttendanceColumns(){
//        $dbObj = new dbConnect();
//        $mysqli = $dbObj->getConnection();

        $conn = mysqli_connect('localhost', "root", "secret", 'manaDB');
        $columnName = "";

        for ($columnNo = 0; $columnNo < 260; $columnNo++)
        {
//            $stmt -> bind_param('s', $columnName);
            $columnName = chr( ($columnNo/26)+(65)) . ($columnNo%26);
//            echo ($columnNo/26) . "<br />";
//            echo $columnNo . "<br />";
//            echo $columnName . "<br />";
//            $stmt -> execute();
            echo $columnName . "<br />";
            mysqli_query($conn, " ALTER TABLE 'Attendance' ADD $columnName BIT;");

        }

//
//            if ($stmt->execute())
//            {
//                $stmt->store_result();
//
//                $OUTenteredPassword = NULL;
//                $OUTuserPassword = NULL;
//
//                $stmt->bind_result($OUTenteredPassword, $OUTuserPassword);
//
//                if( $stmt->num_rows > 0 )
//                {
//                    $stmt->fetch();
//                    if (strcmp($OUTenteredPassword, $OUTuserPassword) == 0)
//                    {
//                        $_SESSION["user"]="$username";
//                        return true;
//                    }
//                }
//            }
//        }
        mysqli_close($conn);
    }

    createAttendanceColumns();

?>