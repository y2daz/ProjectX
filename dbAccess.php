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
    require_once("formValidation.php");

    function login($email, $password)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
                die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("Select userPassword, accessLevel FROM User WHERE userEmail=? AND isDeleted=0 LIMIT 1;"))
        {
            $stmt -> bind_param("s", $email);

            if ($stmt->execute())
            {
//                $stmt->store_result();

                $OUTuserPassword = NULL;
                $OUTaccessLevel = 0;

                $stmt->bind_result($OUTuserPassword, $OUTaccessLevel);
                $stmt->fetch();

//                echo $password . " " . $OUTuserPassword . "\n";
//                echo password_hash($password, PASSWORD_DEFAULT);

//                $hash=password_hash("rasmuslerdorf", PASSWORD_DEFAULT);

                if (password_verify($password, $OUTuserPassword))
                {
                    $_SESSION["user"]="$email";
                    $stmt->close();
                    $mysqli->close();
                    return true;
                }
            }
        }
        $mysqli->close();
        return false;
    }

    function insertEvent( $eventid, $name,$description,$location,$status, $date, $eventcreator,$starttime, $endtime)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//        echo "Hashed password = " . $hashedPassword;
        if ($stmt = $mysqli->prepare("INSERT INTO User values(?, ?, ?, ?, ?, ?, ?, ?, ?);"))
        {
            $stmt -> bind_param("sssssssss",  $eventid, $name,$description,$location,$status, $date, $eventcreator,$starttime, $endtime);
            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $mysqli->close();
        return false;
    }

    function insertUser($email, $password, $accessLevel)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        $isDeleted = 0;
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //        echo "Hashed password = " . $hashedPassword;
        if ($stmt = $mysqli->prepare("INSERT INTO User values(?, ?, ?, ?);"))
        {
            $stmt -> bind_param("sssi", $email, $hashedPassword, $accessLevel, $isDeleted);
            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $mysqli->close();
        return false;
    }

    function getAllUsers()
    {

        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("Select userEmail, accessLevel FROM User WHERE isDeleted = 0 ORDER BY accessLevel;"))
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

    function getLanguage($label, $language)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        $mysqli->set_charset("utf8") ;

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("SELECT `Value` FROM `LabelLanguage` WHERE `Label`=? AND `Language`=? AND isDeleted = 0 LIMIT 1;"))
        {
            $stmt -> bind_param("ss", $label, $language);

            if ($stmt->execute())
            {
                $OUTvalue = "% NO LANG VAL %";
                $stmt->bind_result($OUTvalue);
                $stmt->fetch();

                $stmt->close();
                return $OUTvalue;
            }
        }
        $mysqli->close();
    }

    function checkPrivelege() //Checking yo privelege
    {

    }

    function deleteUser($email){
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("UPDATE User SET isDeleted=? WHERE userEmail=?;"))
        {
            $deleteNo = 2;

            $stmt -> bind_param("is", $deleteNo, $email);

            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return TRUE;
            }
        }
        $mysqli->close();
        return false;
    }


    function insertStaffMember($staffID, $NamewithInitials, $DateofBirth, $Gender, $NationalityRace, $Religion, $CivilStatus,$NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus,$Medium, $PositioninSchool, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $HighestEducationalQualification, $HighestProfessionalQualification, $CourseofStudy)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

        if ($stmt = $mysqli->prepare("INSERT INTO staff values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"))
        {
            $isdeleted = 0;
            $stmt -> bind_param("sssiiiisssssiiiiiiidiiii",$staffID, $NamewithInitials, $DateofBirth, $Gender, $NationalityRace, $Religion, $CivilStatus, $NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus, $Medium, $PositioninSchool, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $HighestEducationalQualification, $HighestProfessionalQualification, $CourseofStudy, $isdeleted);

            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $mysqli->close();
        return false;


    }


    function deleteStaffMember($staffID)
    {
        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE staff SET isDeleted=? WHERE staffID=?"))

    {
        $deleteNo = 2;

        $stmt -> bind_param("is", $deleteNo, $staffID);

        if ($stmt->execute())
        {
            $stmt->close();
            $mysqli->close();
            return TRUE;
        }
    }
    $mysqli->close();
    return false;

    }

    function insertLeave($staffid, $startdate, $enddate, $leavetype, $otherreasons)
    {
        echo "it works here";

        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        if ($mysqli->connect_errno) {

            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }

       if ($stmt = $mysqli->prepare("INSERT INTO  applyleave values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
       {


           $isdeleted = 0;
           $currentdate = date("Y-M-D");
           $status = "Pending";
           $reviewedby = "adas";
           $revieweddate = "dasdasd";

           $stmt -> bind_param("ssssssssi", $staffid, $currentdate, $startdate, $enddate, $leavetype, $otherreasons, $status, $reviewedby, $revieweddate, $isdeleted);

           if ($stmt->execute())
           {
               $stmt->close();
               $mysqli->close();
               return true;
           }
       }
        $mysqli->close();
        return false;
    }

?>
