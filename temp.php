<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 07/08/14
 * Time: 21:24
 */

    require_once("dbAccess.php");


    function createAttendanceColumns(){
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("ALTER TABLE Attendance(ADD COLUMN ? BIT);"))
        {
            $stmt -> bind_param("ss", $password, $username);

            if ($stmt->execute())
            {
                $stmt->store_result();

                $OUTenteredPassword = NULL;
                $OUTuserPassword = NULL;

                $stmt->bind_result($OUTenteredPassword, $OUTuserPassword);

                if( $stmt->num_rows > 0 )
                {
                    $stmt->fetch();
                    if (strcmp($OUTenteredPassword, $OUTuserPassword) == 0)
                    {
                        $_SESSION["user"]="$username";
                        return true;
                    }
                }
            }
        }
        $mysqli->close();
        return false;
    }