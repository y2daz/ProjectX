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
    require_once("RoleClass.php");

//
///
/////  USER MANAGEMENT
///
//

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

            if (password_verify($password, $OUTuserPassword))
            {
                $_SESSION["user"]="$email";
                $_SESSION["accessLevel"] = "$OUTaccessLevel";
                $stmt->close();
                $mysqli->close();
                return 1;
            }
            else{
                $mysqli->close();
                return 0;
            }
        }
    }
    $mysqli->close();
    return 0;
}

function insertUser($email, $password, $accessLevel)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $isDeleted = 0;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT * FROM User WHERE userEmail=? AND isDeleted <> 0 LIMIT 1;"))
    {
        $stmt -> bind_param("s", $email);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0)
        {
            $isDeleted = 0;

            if ($stmt = $mysqli->prepare("UPDATE User SET userPassword=?, isDeleted=? WHERE userEmail=?;"))
            {
                $stmt -> bind_param("sis", $hashedPassword, $isDeleted, $email);
                if ($stmt->execute())
                {
                    $stmt->close();
                    $mysqli->close();
                    return true;
                }
            }
            $stmt->close();
            $mysqli->close();
            return false;
        }
        elseif ($stmt = $mysqli->prepare("INSERT INTO User values(?, ?, ?, ?);"))
        {
            $stmt -> bind_param("ssii", $email, $hashedPassword, $accessLevel, $isDeleted);
            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $stmt->close();
        $mysqli->close();
        return false;
    }
    $mysqli->close();
    return false;
}

function changePassword($email, $password)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    //        echo "Hashed password = " . $hashedPassword;
    if ($stmt = $mysqli->prepare("UPDATE User SET userPassword=? WHERE userEmail=?;"))
    {
        $stmt -> bind_param("ss", $hashedPassword, $email);
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

function deleteUser($email){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE User SET isDeleted=? WHERE userEmail=? AND isDeleted=0;"))
    {
        $deleteNo = 2;

        $stmt -> bind_param("is", $deleteNo, $email);

        if ($stmt->execute())
        {
            if ($stmt->affected_rows > 0)
            {
                $stmt->close();
                $mysqli->close();
                return TRUE;
            }
        }
    }
    $mysqli->close();
    return false;
}

function getAllUsers()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

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

function getRoles(){ //Get Cutlets and patties too.

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select RoleId, RoleName FROM Roles ORDER BY RoleId;"))
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

function getPermissions($role){ //Get Cutlets and patties too.

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT r.RoleId, p.PermId, p.PermDesc, p.OrderKey FROM RolePerm r RIGHT OUTER JOIN Permissions p on (p.permId = r.PermId) AND r.RoleId = ? ORDER BY p.OrderKey;"))
    {
        $stmt->bind_param("i", $role);
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

function savePermissions($role, $permArr){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("DELETE FROM RolePerm WHERE RoleId = ?")){
        $stmt->bind_param("i", $role);
        $stmt->execute();

        if ($stmt = $mysqli->prepare("INSERT INTO RolePerm (RoleId, PermId) VALUES (?, ?);"))
        {
            foreach($permArr as $permID){
                $stmt->bind_param("ii", $role, $permID);
                $stmt->execute();
            }
            $stmt->close();
            return true;
        }
    }
    $mysqli->close();
    return false;
}


//
///
/////  STAFF DETAILS
///
//

function checkStaffMember($StaffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if($stmt = $mysqli->prepare("SELECT StaffID from Staff WHERE StaffID = ?"))
    {
        $stmt->bind_param("s", $StaffID);

        if($stmt->execute())
        {
            $rowcount = mysqli_num_rows($stmt->get_result());

            if($rowcount>0)
            {
                $stmt->close();
                return true;
            }
            else
            {
                $stmt->close();
                return false;
            }
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



    if ($stmt = $mysqli->prepare("INSERT INTO Staff values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"))
    {
        $isdeleted = 0;
        $stmt -> bind_param("sssiiiisssssiiiiiiidiiii",$staffID, $NamewithInitials, $DateofBirth, $Gender, $NationalityRace, $Religion, $CivilStatus, $NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus, $Medium, $PositioninSchool, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $HighestEducationalQualification, $HighestProfessionalQualification, $CourseofStudy, $isdeleted);

        if ($stmt->execute())
        {
            $stmt->close();
            $mysqli->close();
            insertNewTimetable($staffID);
            insertNewLeaveData($staffID);
            return true;
        }
    }



    $mysqli->close();
    return false;
}

function Updatestaff($staffID, $NamewithInitials, $DateofBirth, $Gender, $NationalityRace, $Religion, $CivilStatus,$NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus,$Medium, $PositioninSchool, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $HighestEducationalQualification, $HighestProfessionalQualification, $CourseofStudy)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }
    /*if ($stmtCheck = $mysqli->prepare("SELECT * FROM Staff WHERE StaffID=? ;"))/*
    {
        $stmtCheck -> bind_param("s", $AdmissionNo);
        $stmtCheck -> execute();
        $result = $stmtCheck->get_result();

        if ($result -> num_rows == 1)
        {*/

    if ($stmt = $mysqli->prepare("UPDATE Staff SET NamewithInitials=?, DateofBirth=?, Gender=?, Nationality_Race=?, Religion=?, CivilStatus=?, NICNumber=?, MailDeliveryAddress=?, ContactNumber=?, DateAppointedastoPost=?, DateJoinedthisSchool=?, EmploymentStatus=?, Medium=?, PositioninSchool=?, Section=?, SubjectMostTaught=?, SubjectSecondMostTaught=?, ServiceGrade=?, Salary=?, HighestEducationalQualification=?, HighestProfessionalQualification=?, CourseofStudy=? WHERE StaffID = ?;"))
    {
        $stmt -> bind_param("ssiiiisssssiiiiiiisiiis", $NamewithInitials, $DateofBirth, $Gender, $NationalityRace, $Religion, $CivilStatus, $NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus, $Medium, $PositioninSchool, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $HighestEducationalQualification, $HighestProfessionalQualification, $CourseofStudy, $staffID);

        if ($stmt->execute())
        {
            $stmt->close();
            $mysqli->close();
            return true;
        }
        $stmt->close();
    }
    /*            }

        $stmt->close();

        }*/
    $mysqli->close();
    return false;
}

function getCivilStatus($staffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $result = null;
    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $row = 0;

    if ($stmt = $mysqli->prepare('SELECT CivilStatus FROM Staff WHERE StaffID = ? AND isDeleted = 0'))
    {
        $stmt -> bind_param("s",$staffID );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result->fetch_array();
        }
    }

    $mysqli->close();
    return $row[0];
}

function getGender($staffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $result = null ;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $row = 0;

    if ($stmt = $mysqli->prepare('SELECT Gender FROM Staff WHERE StaffID = ?'))
    {
        $stmt -> bind_param("s",$staffID );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result->fetch_array();
        }
    }

    $mysqli->close();
    return $row[0];
}

function getStaffMember($StaffID)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select * FROM Staff WHERE StaffID=? AND isDeleted = 0 LIMIT 1;"))
    {
        $stmt -> bind_param("s", $StaffID);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function deleteStaff($staffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $newStaffID="";

    if ($stmt = $mysqli->prepare("UPDATE Staff SET isDeleted=? WHERE StaffID=?; "))
    {
        $deleteNo = 2;
        $stmt -> bind_param("is", $deleteNo, $staffID);
        if ($stmt->execute())
        {
            if ($stmt = $mysqli->prepare("UPDATE ClassInformation SET StaffID = ? where StaffID = ? "))
            {
                $stmt -> bind_param("ss", $newStaffID, $staffID);
                if ($stmt->execute())
                {
                    if ($stmt = $mysqli->prepare("UPDATE Timetable SET isDeleted = ? where StaffID = ? ")){
                        $stmt -> bind_param("is", $deleteNo, $staffID);

                        if($stmt->execute()){
                            $stmt->close();
                            $mysqli->close();
                            return TRUE;
                        }
                    }
                }
            }
        }
        $stmt->close();
        deleteTimetable($staffID);
        $mysqli->close();
        return TRUE;
    }

    $mysqli->close();
    return false;
}

function searchStaff($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE StaffID LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        //  $id = "%" . $id . "%";
        $stmt -> bind_param("s", $id );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function SearchStaffbyname($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE NamewithInitials LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $id = "%" . $id . "%";
        $stmt -> bind_param("s", $id );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function SearchStaffbycontactnumber($id)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE ContactNumber LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $id = "%" . $id . "%";
        $stmt -> bind_param("s", $id );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function SearchStaffbynic($id)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE NICNumber LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $id = "%" . $id . "%";
        $stmt -> bind_param("s", $id );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function getNewStaffId()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT MAX(CAST(StaffID AS UNSIGNED))+1 FROM Staff LIMIT 1;"))
    {
        if ($stmt->execute())
        {
            $OUTvalue = "% NO Staff ID %";
            $stmt->bind_result($OUTvalue);
            $stmt->fetch();

            if (!isFilled($OUTvalue))
            {
                return 1;
            }

            $stmt->close();
            $mysqli->close();
            return $OUTvalue;
        }
    }
    $mysqli->close();
}

function getAllStaff()
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }

    $mysqli->close();
    return $set;
}

function getNoOfStaff()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT COUNT(StaffID) FROM Staff;"))
    {
        if ($stmt->execute())
        {
            $OUTValue = "";
            $stmt->bind_result($OUTvalue);
            $stmt->fetch();

            if (!isFilled($OUTvalue))
            {
                return 1;
            }

            $stmt->close();
            $mysqli->close();
            return $OUTvalue;
        }
    }
    $mysqli->close();
}

function getAllStaffDetailed( $initial )
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select * FROM Staff s WHERE s.isDeleted = 0 ORDER BY s.StaffId + 0 LIMIT ?, 20;"))
    {
        $stmt -> bind_param("i", $initial);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }

    $mysqli->close();
    return $set;
}

//
///
/////  LEAVE MANAGEMENT
///
//

function getLeave($StaffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT * FROM ApplyLeave WHERE StaffID = ? ORDER BY RequestDate"))
    {
        $stmt -> bind_param("s", $StaffID);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;

}

function insertLeave($staffid, $startdate, $enddate, $leavetype, $otherreasons)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO ApplyLeave values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
        $isdeleted = 0;
        $currentdate = date("Y-m-d");
        $status = 0;
        $reviewedby = null;
        $revieweddate = null;

        $stmt -> bind_param("ssssisissi", $staffid, $currentdate, $startdate, $enddate, $leavetype, $otherreasons, $status, $reviewedby, $revieweddate, $isdeleted);

        $query = $mysqli->prepare("SELECT * FROM LeaveData WHERE StaffID = $staffid");
        $query -> execute();
        $query -> store_result();

        $rows = $query->num_rows;

        $query->close();

        if($rows == 0)
        {
            $OfficialLeave = 50;
            $MaternityLeave = 100;
            $OtherLeave = 50;

            if($insertleavedata = $mysqli->prepare("INSERT INTO LeaveData VALUES (?, ?, ?, ?, ?)"))
            {
                $insertleavedata -> bind_param("siiii", $staffid, $OfficialLeave, $MaternityLeave, $OtherLeave, $isdeleted);

                if($insertleavedata->execute())
                {
                    $insertleavedata->close();
                }
            }
        }


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

function checkLeaveStatus($StaffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    $set = NULL;

    if($stmt  = $mysqli->prepare("SELECT RequestDate, Status, LeaveType, OtherInformation FROM ApplyLeave WHERE StaffID = ? ORDER BY RequestDate"))
    {
        $stmt->bind_param("s", $StaffID);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }

    $mysqli->close();
    return $set;

}

function insertNewLeaveData($staffID){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    $noOfficialLeave = 15;
    $noMaternityLeave = 90;
    $noOtherLeave = 15;

    if($stmt = $mysqli->prepare("INSERT INTO LeaveData (StaffID, OfficialLeave, MaternityLeave, OtherLeave) VALUES ( ?, ?, ?, ? );"))
    {
        $stmt->bind_param("siii", $staffID, $noOfficialLeave, $noMaternityLeave, $noOtherLeave);
        $stmt->execute();

        $stmt->close();
    }

    $mysqli->close();
}

function getLeaveData($StaffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }



    if($stmt = $mysqli->prepare("SELECT l.OfficialLeave, l.MaternityLeave, l.OtherLeave, s.NamewithInitials FROM LeaveData l, Staff s WHERE l.StaffID = ? AND s.StaffID = l.StaffID"))
    {
        $stmt->bind_param("s", $StaffID);

        if($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            if($result->num_rows == 0){
                insertNewLeaveData($StaffID);
                return null;
            }

            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }

        }
    }

    $mysqli->close();
    return $set;
}

function getLeaveToApprove(){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select l.StaffId, s.NamewithInitials, l.LeaveType, l.RequestDate, l.Status, l.StartDate, s.ContactNumber FROM ApplyLeave l, Staff s WHERE l.StaffId = s.StaffId AND l.Status = 0 AND l.isDeleted = 0 ORDER BY l.StartDate, l.RequestDate"))
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

function getStaffLeavetoApprove( $StaffID, $sDate ){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select l.StaffId, s.NamewithInitials , l.LeaveType, l.RequestDate, l.Status, l.StartDate, l.EndDate, l.OtherInformation,  ld.OfficialLeave, ld.MaternityLeave, ld.OtherLeave, s.ContactNumber FROM ApplyLeave l, Staff s, LeaveData ld WHERE l.StaffId=? AND s.StaffId = l.StaffId AND l.StartDate=? AND l.StaffId = ld.StaffId;"))
    {
        $stmt->bind_param("ss", $StaffID, $sDate);

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

function approveLeave($StaffID, $sDate, $eDate, $leavetype, $ReviewedBy)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $result = getLeaveData($StaffID);

    $startdate = $sDate;
    $enddate = $eDate;

    $start = strtotime($startdate);
    $end = strtotime($enddate);

    $datediff = $end - $start;

    $datediff = floor($datediff/(60*60*24));

    $datediff = abs($datediff);

    foreach($result as $row)
    {
        if(isFilled($result))
        {
            $OfficialLeave = $row[0];
            $MaternityLeave = $row[1];
            $OtherLeave = $row[2];
        }

    }

    if($leavetype == "Official Leave")
    {
        $OfficialLeave = $OfficialLeave - $datediff;
    }
    else if ($leavetype == "Maternity Leave")
    {
        $MaternityLeave = $MaternityLeave - $datediff;

    }
    else if ($leavetype == "Other Leave")
    {
        $OtherLeave = $OtherLeave - $datediff;
    }

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if($stmt = $mysqli->prepare("UPDATE  ApplyLeave l, LeaveData a SET l.Status = 1, l.ReviewedBy = ?,  l.ReviewedDate = ?,a.OfficialLeave=?, a.MaternityLeave=?, a.OtherLeave=? WHERE l.StaffID = a.StaffID AND l.StaffID =?  AND l.StartDate = ?"))
    {
        $ReviewedDate = date("Y-m-d");

        $stmt->bind_param("ssiiiss", $ReviewedBy, $ReviewedDate, $OfficialLeave, $MaternityLeave, $OtherLeave, $StaffID, $sDate);

        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }

    }
    $mysqli->close();
    return false;
}

function rejectLeave($StaffID, $sDate, $ReviewedBy)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    if($stmt = $mysqli->prepare("UPDATE ApplyLeave SET ReviewedBy=?, Status=?, ReviewedDate=? WHERE StaffID=? AND StartDate=?"))
    {
        $status = 2;
        $ReviewedDate = date("Y-m-d");

        $stmt->bind_param("sisss", $ReviewedBy, $status, $ReviewedDate, $StaffID, $sDate);

        if($stmt->execute())
        {
            if ($stmt -> affected_rows > 0)
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $stmt->close();
    }
    $mysqli->close();

    return false;
}

//
///
/////  CLASS MANAGEMENT
///
//

function insertClassroom($staffID, $grade, $class)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmtCheck = $mysqli->prepare("SELECT * FROM ClassInformation WHERE Grade=? AND Class=?;"))
    {
        $stmtCheck -> bind_param("is", $grade, $class);
        $stmtCheck -> execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows == 0)
        {
            if ($stmt = $mysqli->prepare("INSERT INTO ClassInformation values(?, ?, ?, ?);"))
            {
                $isDeleted = 0;
                $stmt -> bind_param("sisi",$staffID, $grade, $class, $isDeleted);

                if ($stmt->execute())
                {
                    $stmt->close();
                    $mysqli->close();
                    return 1; //Inserted new classroom
                }
            }
        }
        else
        {
            if ($stmt = $mysqli->prepare("UPDATE ClassInformation SET StaffID=?, isDeleted=? WHERE Grade=? AND Class=? ;"))
            {
                $isDeleted = 0;
                $stmt -> bind_param("iiis",$staffID, $isDeleted, $grade, $class );

                if ($stmt->execute())
                {
                    $stmt->close();
                    $mysqli->close();
                    return 2; //Updated old classroom
                }
            }
        }
    }
    $mysqli->close();
    return 0; //Failed Adding Classroom
}

function getAllClassroom()
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select ci.Grade, ci.Class, s.StaffID, s.NamewithInitials From ClassInformation ci LEFT OUTER JOIN Staff s ON (s.StaffID = ci.StaffID) WHERE ci.isDeleted=? ORDER BY ci.Grade, ci.Class;"))
    {
        $isDeleted = 0;

        $stmt->bind_param("i", $isDeleted);

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
//    $stmt->close();
    $mysqli->close();
    return $set;
}

function deleteClassroom($grade, $class)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE ClassInformation SET isDeleted=? WHERE Grade=? AND Class=? AND isDeleted=?"))
    {
        $deleteNo = 2;
        $oldDeleteNo = 0;

        $stmt -> bind_param("iisi", $deleteNo, $grade, $class, $oldDeleteNo);

        $stmt->execute();

        if ($stmt->affected_rows > 0)
        {
            $stmt->close();
            $mysqli->close();
            return TRUE;
        }
    }
    $mysqli->close();
    return FALSE;
}

//
///
/////  SUBJECTS, TIMETABLES AND SUBSTITUTION MANAGEMENT
///
//

/*function regenerateSubjectTable(){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }
    $query = "DELETE FROM Subject WHERE 1;";
    $query .= " INSERT INTO Subject (Name) SELECT DISTINCT Subject FROM Timetable WHERE Subject IS NOT NULL AND Subject <> '' ORDER BY Subject;";

    if ( $stmt = $mysqli->prepare($query) ){
        $stmt -> execute();
    }

    $mysqli->close();
    return false;
}*/

function getAllSubjects()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select Number, Name FROM Subject ORDER BY Number;"))
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

function insertNewTimetable($staffId)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare('INSERT INTO Timetable (Grade, Class, Day, Position, Subject, StaffID, isDeleted) values (?,?,?,?,?,?,?);' ))
    {
        $nullValue = null;

        for($day = 0; $day < 5; $day++)
        {
            for($position=0; $position < 8; $position++)
            {
                $stmt -> bind_param("isiissi",$nullValue,$nullValue,$day,$position,$nullValue, $staffId, $isDeleted  );
                $stmt->execute();
            }
        }
        $stmt->close();
        $mysqli->close();
        regenerateSubjectTable();
        return true;
    }

    $mysqli->close();
    return false;
}

function updateTimetable($staffId, $GradeArr, $ClassArr, $SubjectArr)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare('UPDATE Timetable set Grade=?, Class=?, Subject=?, isDeleted=? WHERE Day = ? AND Position = ? AND StaffId = ?;'))
    {

        for($i = 0; $i < 5; $i++){
            for($x = 0; $x < 8; $x++){
                $number = ($i * 8) + $x;

                $curGrade = ($GradeArr[$number] == 0 ? null : $GradeArr[$number]);

                $stmt -> bind_param("issiiii", $curGrade, $ClassArr[$number], $SubjectArr[$number], $isDeleted, $i, $x, $staffId);
                $stmt -> execute();
            }
        }
        $stmt->close();
        $mysqli->close();
        regenerateSubjectTable();
        return true;
    }
    $mysqli->close();
    return false;
}

function deleteTimetable($staffId)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE Timetable SET isDeleted=? WHERE StaffID=? AND isDeleted=0;"))
    {
        $deletetimetable = 2 ;
        $stmt->bind_param("is", $deletetimetable , $staffId);
        if ($stmt->execute())
        {
            if ($stmt->affected_rows > 0)
            {
                $stmt->close();
                $mysqli->close();
                return TRUE;
            }
        }
    }
    $mysqli->close();
    return false;

}

function getTimetable($staffId)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select Grade, Class, Day, Position, Subject  FROM Timetable WHERE isDeleted = 0 AND StaffId = ? ORDER BY Day,position ;"))
    {
        $stmt->bind_param("s", $staffId);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();

            if($result->num_rows == 0){
                insertNewTimetable($staffId);
                return null;
            }

            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function getTimetablebyClass($class , $grade)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select Grade, Class, Day, Position, Subject FROM Timetable WHERE isDeleted = 0  AND Grade = ? AND Class = ? ORDER BY Day, position ;"))
    {
        $stmt->bind_param("is", $grade, $class);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;

}

function substitute($subject)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, Grade FROM Timetable WHERE isDeleted = 0 AND Subject = ? ;"))
    {
        $stmt->bind_param("s", $subject);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;

}

function confirmSubstitution($replacementStaffID , $Grade , $Class , $Day , $Position , $Date , $SubstitutedTeacherID )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO IsSubstituted(StaffID, Grade, Class, Day, Position, Date, SubsttitutedTeachedID) VALUES (?,?,?,?,?,?,?);"))
    {
        $stmt->bind_param("iisiisi", $replacementStaffID , $Grade , $Class , $Day , $Position , $Date , $SubstitutedTeacherID);
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

function getFreeTeachers($position,$day,$id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT s.StaffID, s.NameWithInitials, sub.Name, s.ContactNumber FROM Staff s LEFT OUTER JOIN Subject sub ON (sub.Number = s.SubjectMostTaught) WHERE StaffID IN (SELECT staffID FROM Timetable t WHERE Position = ? AND Day = ? AND isDeleted = 0 AND (Subject IS NULL) AND StaffID <> ?);"))
    {
        //  $id = "%" . $id . "%";
        $stmt -> bind_param("iii", $position, $day, $id );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

//
///
/////  LANGUAGE
///
//

function getLanguage($label, $language)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $mysqli->set_charset("utf8") ;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT Value FROM LabelLanguage WHERE Label=? AND Language=? LIMIT 1;"))
    {
        $stmt -> bind_param("ss", $label, $language);

        if ($stmt->execute())
        {
            $OUTvalue = "% NO LANG VAL %";
            $stmt->bind_result($OUTvalue);
            $stmt->fetch();

            $stmt->close();
            $mysqli->close();
            return $OUTvalue;
        }
    }
    $mysqli->close();
    return null;
}

//
///
/////  YEAR PLAN
///
//

function isHoliday($date)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select * FROM Holiday WHERE Day = ? ;"))
    {
        $stmt->bind_param("s", $date);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            if($result->num_rows > 0)
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
        }
        $stmt->close();
    }
    $mysqli->close();
    return false;
}

function getHolidays($year){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = array();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select (DATE_FORMAT(Day, '%d/%m/%Y') ) FROM Holiday WHERE Year = ? ORDER BY Day;"))
    {
        $stmt -> bind_param("i", $year);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row[0];
            }
        }
    }
    $mysqli->close();
    return $set;
}

function insertHolidays($year, $dayArray)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

//        $isDeleted = 0;

//        $query = "SET AUTOCOMMIT = 0; START TRANSACTION; DELETE FROM Holiday WHERE Year=?; COMMIT;";

    if ($stmtDel = $mysqli->prepare("DELETE FROM Holiday WHERE Year=?;"))
    {
        $stmtDel -> bind_param("i", $year);
        $stmtDel -> execute();
        $stmtDel -> close();

        if ($stmtIns = $mysqli->prepare("INSERT INTO Holiday values(?, (SELECT STR_TO_DATE(?, '%d/%m/%Y') ));"))
        {
            for($i = 0; $i < count($dayArray); $i++)
            {
                $stmtIns -> bind_param("is", $year, $dayArray[$i]);
                $stmtIns -> execute();
            }

            $stmtIns->close();
            $mysqli->close();
            return 1;
        }
    }

    $mysqli->close();
    return 0;
}
