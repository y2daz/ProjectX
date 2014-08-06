<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 8/5/14
 * Time: 12:00 PM
 */

/**
 * This is where all the sql commands are kept
 *
 */


require_once("dbConnect.php");

    $dbObj = new dbConnect();

    function login($username, $password)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
                die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("Select PASSWORD(?), userPassword FROM User WHERE userEmail=? LIMIT 1;"))
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
                        return true;
                    }
                }
            }
        }
        $mysqli->close();

        return false;
    }



?>
