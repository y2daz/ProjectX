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
    require_once("common.php");

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
} //Logs existing non-deleted user into system

function insertUser($email, $password, $accessLevel)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $isDeleted = 0;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT `userEmail`, `userPassword`, `accessLevel`, `isDeleted` FROM User WHERE userEmail=? AND isDeleted <> 0 LIMIT 1;"))
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
} //Saves new user record or updates a soft-deleted user to undeleted

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
} //Changes password to $password for $email

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
} //Soft-deletes $email

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
} //Returns all non-soft-deleted users

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
} //Get all roles

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
} //Get all permissions for a role

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
} //Saves new permissions for a role


//
///
/////  STAFF DETAILS
///
//

function checkStaffMember($staffID, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if($stmt = $mysqli->prepare("SELECT StaffID from Staff WHERE StaffID = ? AND isDeleted = 0 "))
    {
        $stmt->bind_param("s", $staffID);

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

} //Checks if a staff member exists and isn't soft-deleted

/*StaffNo*/function insertStaffMember($staffNo, $employeeID, $NameWithInitials, $DateOfBirth, $Gender, $Race, $Religion, $CivilStatus,$NICNumber,
                           $MailDeliveryAddress, $ContactNumber, $DateAppointedAsTeacherPrincipal, $DateJoinedThisSchool, $EmploymentStatus,$Medium,
                           $Designation, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary)
{
//    if ( isFilled( getStaffID( $staffID ) ) ){
//        return false;
//    }

    $staffID = getNewStaffId();

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO Staff values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"))
    {
        $isdeleted = 0;
        $stmt -> bind_param("ssssiiiisssssiiiiiiidi", $staffID, $employeeID, $NameWithInitials, $DateOfBirth, $Gender, $Race, $Religion,
                        $CivilStatus, $NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedAsTeacherPrincipal, $DateJoinedThisSchool,
                        $EmploymentStatus, $Medium, $Designation, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary, $isdeleted);

        if ($stmt->execute())
        {
            $stmt->close();

            if( $stmtStaffNo = $mysqli -> prepare("INSERT INTO `StaffNo`(`staffID`, `staffNo`, `year`) VALUES ( ?, ?, ?);") )
            {
                $year = getConfigData('currentYear');

                $stmtStaffNo -> bind_param("sii", $staffID, $staffNo, $year );
                echo $mysqli->error;
                if( $stmtStaffNo->execute() )
                {
                    $stmtStaffNo -> close();
                    $mysqli -> close();
                    insertNewTimetable( $staffID, false ); //Does not use StaffNo
                    return true;
                }
                else{
                    echo $mysqli->error;
                }
                echo $mysqli->error;
            }
        }
    }

    $mysqli->close();
    return false;
} //Inserts new staff member, then creates blank timetable and unused leave data

/*StaffNo*/function Updatestaff($staffID, $employeeID, $NamewithInitials, $DateofBirth, $Gender, $Race, $Religion, $CivilStatus, $NICNumber,
                     $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool, $EmploymentStatus, $Medium,
                     $Designation, $Section, $SubjectMostTaught, $SubjectSecondMostTaught, $ServiceGrade, $Salary)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if( checkStaffMember( $staffID ) ){
        if ($stmt = $mysqli->prepare("
            UPDATE Staff SET
                EmployeeID = ?,
                NamewithInitials = ?,
                DateofBirth = ?,
                Gender = ?,
                Race = ?,
                Religion = ?,
                CivilStatus = ?,
                NICNumber = ?,
                MailDeliveryAddress = ?,
                ContactNumber = ?,
                DateAppointedastoPost = ?,
                DateJoinedthisSchool = ?,
                EmploymentStatus = ?,
                Medium = ?,
                Designation = ?,
                Section = ?,
                SubjectMostTaught = ?,
                SubjectSecondMostTaught = ?,
                ServiceGrade = ?,
                Salary = ?
            WHERE StaffID = ?;"
        ))
        {
            $stmt -> bind_param("sssiiiisssssiiiiiiiis", $employeeID, $NamewithInitials, $DateofBirth, $Gender, $Race, $Religion, $CivilStatus,
                $NICNumber, $MailDeliveryAddress, $ContactNumber, $DateAppointedasTeacherPrincipal, $DatejoinedthisSchool,
                $EmploymentStatus, $Medium, $Designation, $Section, $SubjectMostTaught, $SubjectSecondMostTaught,
                $ServiceGrade, $Salary, $staffID);

            if ($stmt->execute())
            {
                $stmt->close();
                $mysqli->close();
                return true;
            }
            $stmt->close();
        }
    }
    $mysqli->close();
    return false;
} //Updates details of a staff member who hasn't been soft-deleted

function getCivilStatus($staffID, $usingStaffNo = false )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $result = null;

    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

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
} //Returns the civil status of a staff member

function getGender($staffID, $usingStaffNo = false )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();
    $result = null ;

    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

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
} //Returns the gender of a staff member

function getStaffMember($staffID, $usingStaffNo = false )
{
    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        Select `StaffID`, `NamewithInitials`, `DateofBirth`, `Gender`, `Race`,
            `Religion`, `CivilStatus`, `NICNumber`, `MailDeliveryAddress`, `ContactNumber`, `DateAppointedastoPost`,
            `DateJoinedthisSchool`, `EmploymentStatus`, `Medium`, `Designation`, `Section`, `SubjectMostTaught`,
            `SubjectSecondMostTaught`, `ServiceGrade`, `Salary`, `EmployeeID`, `isDeleted`
        FROM Staff WHERE StaffID=? AND isDeleted = 0 LIMIT 1;"))
    {
        $stmt -> bind_param("s", $staffID);

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
} //Returns the whole record of a staff member from the staff table

function deleteStaff($staffID, $usingStaffNo = false )
{
    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $newStaffID="";

    if ( checkStaffMember( $staffID ) ){

        if ($stmt = $mysqli->prepare("UPDATE Staff SET isDeleted=? WHERE StaffID=?; "))
        {
            $deleteNo = 2;
            $stmt -> bind_param("is", $deleteNo, $staffID);
            if ($stmt->execute())
            {
                if ($stmt = $mysqli->prepare("UPDATE ClassInformation SET StaffID = ? where StaffID = ? ")) //YAZDAAN, MAKE NEW FUNCTION TO DELETE THIS AND TIMETABLE
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
            deleteTimetable( $staffID, false ); //Does not use StaffNo
            $mysqli->close();
            return TRUE;
        }
    }

    $mysqli->close();
    return false;
} //Deletes a staff member along with their classroom and their timetable

/**/ function searchStaff( $field, $fieldValue, $operator = 0, $orderField = "StaffNo", $order = "asc", $start = 0, $limit = 20, $usingStaffNo = false ){ //Searches for $limit staff members with $field $operator $value from $start
    /**
     * $operator values
     * 0 = Exactly equal
     * 1 = Begins with
     * 2 = Ends with
     * 3 = Contains
     *
     */

    /*if( strcmp( $field, "StaffID" ) == 0 ){
        if( $usingStaffNo ){
            $fieldValue = getStaffID( $fieldValue );
        }
    }
    DOESN'T WORK LIKE THAT, Yazdaan.
    */

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $noOfRows = 0;

    $fieldValue = ( $operator == 0 ? $fieldValue : ( $operator == 1 ? $fieldValue . "%"  : ( $operator == 2 ? "%" . $fieldValue : "%" . $fieldValue . "%" ) ) );
    $operator = ( $operator == 0 ? "LIKE" : "LIKE" );
//    $operator = "LIKE";

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    //Yazdaan, open to attack. Get an array of possible $field values and check if it is in. Or something... Also $orderfield.
    $query = 'Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM VwCurrentStaffNo WHERE ' . ($field) . ' ' . $operator . ' ?  AND isDeleted = 0 ';
    $query .= 'ORDER BY ' . $orderField . ' + 0 ' . $order .  ' LIMIT ?, ?;';

    $numberQuery = 'Select COUNT(*) FROM VwCurrentStaffNo WHERE ' . ($field) . ' ' . $operator . ' ?  AND isDeleted = 0 ';

//    echo $numberQuery . "<br /> for rows <br />";
//    echo $query . "<br /> for data <br />";

    if ($stmt = $mysqli->prepare( $numberQuery )){
        $stmt -> bind_param("s", $fieldValue);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result -> fetch_array();
            $noOfRows = $row[0];
//            echo "No of rows = $noOfRows";
        }
    }

    if ($stmt = $mysqli->prepare( $query )){
        $stmt -> bind_param("sii", $fieldValue, $start, $limit );
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();

    $maxPages = intval( $noOfRows / $limit );
    if ( $noOfRows % $limit > 0 ){
        $maxPages++;
    }
    $maxPages = ( $maxPages == 0 ? 1 : $maxPages );
//    echo "max page = $maxPages";

    $returnArray = array($maxPages, $set);
    return $returnArray;
}

/*
function searchStaffByStaffID($key)
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
        $stmt -> bind_param("s", $key );

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
} //Returns non-deleted staff member with staffID $key
*/

function attendanceMarkedOnDay( $date = null ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if( !isset( $date ) ){
        $date = strftime( "%Y-%m-%d",  time() );
    }

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        Select a.StaffID, a.`Date`
        FROM  Attendance a
        WHERE a.`Date` = ?;"
    ))
    {
        $stmt -> bind_param("s", $date );
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $stmt->close();
            if( $result->num_rows > 0){
                $mysqli->close();
                return true;
            }
        }
    }
    $mysqli->close();
    return false;
}

function getAbsenteesList( $date = null ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $year = getConfigData( "currentYear" );

    if( !isset( $date ) ){
        $date = strftime( "%Y-%m-%d",  time() );
    }
    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if( !attendanceMarkedOnDay( $date) ){
        return null;
    }


    if ($stmt = $mysqli->prepare("
        Select s.StaffID, n.StaffNo, s.NamewithInitials, s.Medium, a.isPresent, s.`Section`
        FROM Staff s LEFT OUTER JOIN StaffNo n
                ON (s.StaffId = n.StaffId )
            LEFT OUTER JOIN Attendance a
                ON (s.StaffId = a.StaffID AND a.`Date` LIKE ? )
        WHERE s.isDeleted = 0
            AND n.Year = ?
        GROUP BY (s.StaffID)
        ORDER BY s.Section + 0;"
    ))
    {
        $stmt -> bind_param("si", $date, $year );
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $row[4] = isset( $row[4] ) ? $row[4] : 0;

                //Accepts NULL and 0 as absentees.
                if( $row[4] == 0 ){
                    $set[ $i++ ] = $row;
                }
            }
        }
    }
    $mysqli->close();
    return $set;
}

function getStaffMembersToMarkAttendance( $date = null ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $year = getConfigData( "currentYear" );

    if( !isset( $date ) ){
        $date = strftime( "%Y-%m-%d",  time() );
    }

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        Select s.StaffID, n.StaffNo, s.NamewithInitials, s.Medium, a.isPresent
        FROM Staff s LEFT OUTER JOIN StaffNo n
                ON (s.StaffId = n.StaffId )
            LEFT OUTER JOIN Attendance a
                ON (s.StaffId = a.StaffID AND a.`Date` LIKE ? )
        WHERE s.isDeleted = 0
            AND n.Year = ?
        ORDER BY n.StaffNo + 0;"
    ))
    {
        $stmt -> bind_param("si", $date, $year );
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[ $i++ ] = $row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function getNoOfSchoolDaysMarked( $startDate = null, $endDate = null ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $year = getConfigData( "currentYear" );

    if( !( isset( $startDate ) && ( isset( $endDate) ) ) ) {
        $startDate = $year . '-01-01';
        $endDate = $year . '-12-31';
    }

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        SELECT COUNT(DISTINCT `Date`) FROM `Attendance`
        WHERE `Date` BETWEEN ? AND ?"
    ))
    {
        $stmt -> bind_param("ss", $startDate, $endDate );
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[ $i++ ] = $row;
            }
        }
    }
    $mysqli->close();
    $row = $set[0];

    return $row[0];
}

function getToMarkedAttendanceReport( $startDate = null, $endDate = null ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $year = getConfigData( "currentYear" );

    if( !( isset( $startDate ) && ( isset( $endDate) ) ) ) {
        $startDate = $year . '-01-01';
        $endDate = $year . '-12-31';
    }

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $noOfSchoolDays = getNoOfSchoolDaysMarked( $startDate, $endDate );

    if ($stmt = $mysqli->prepare("
        Select s.StaffID, n.StaffNo, s.NamewithInitials, s.Medium, SUM(a.isPresent), s.Section
        FROM Staff s LEFT OUTER JOIN StaffNo n
                ON (s.StaffId = n.StaffId )
            LEFT OUTER JOIN Attendance a
                ON (s.StaffId = a.StaffID AND a.`Date` BETWEEN ? AND ? )
        WHERE s.isDeleted = 0
            AND n.Year = ?
        GROUP BY (s.StaffID)
        ORDER BY s.Section, SUM(a.isPresent);"
    ))
    {
        $stmt -> bind_param("ssi", $startDate, $endDate, $year );
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){

                $row[4] = $noOfSchoolDays - ( isset( $row[4] ) ? $row[4] : 0 );
                $set[ $i++ ] = $row;
            }
        }
    }

    $mysqli->close();
    return $set;
}

/*
function SearchStaffbyname($key)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE NamewithInitials LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $key = "%" . $key . "%";
        $stmt -> bind_param("s", $key );

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
} //Returns non-deleted staff member with namewithintials $key
*/

/* function SearchStaffbycontactnumber($key)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE ContactNumber LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $key = "%" . $key . "%";
        $stmt -> bind_param("s", $key );

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

} //Returns non-deleted staff member with contactnumber $key
*/

/*
function SearchStaffbynic($key)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select StaffID, NamewithInitials, NICNumber, ContactNumber FROM Staff WHERE NICNumber LIKE ? AND isDeleted = 0 ORDER BY StaffId + 0;"))
    {
        $key = "%" . $key . "%";
        $stmt -> bind_param("s", $key );

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
} //Returns non-deleted staff member with NIC $key
*/

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
} //Returns a new staffID as MAX( [currentStaffIDs] ) + 1

function getNewStaffNo()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT MAX(CAST(StaffNo AS UNSIGNED))+1 FROM StaffNo LIMIT 1;"))
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
} //Returns a new staffNo as MAX( [currentStaffNos] ) + 1

/**/function getAllStaff( $start = 0 , $limit = 20 )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $noOfRows = 0;
    $year = getConfigData( "currentYear" );

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare( "Select COUNT(*) FROM Staff WHERE isDeleted = 0 " )){
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $row = $result -> fetch_array();
            $noOfRows = $row[0];
//            echo "No of rows = $noOfRows";
        }
    }

    if ($stmt = $mysqli->prepare("
        Select s.StaffID, s.NamewithInitials, s.NICNumber, s.ContactNumber
        FROM Staff s LEFT OUTER JOIN StaffNo n
            ON (s.StaffId = n.StaffId )
        WHERE s.isDeleted = 0
            AND n.Year = ?
        ORDER BY n.StaffNo + 0 LIMIT ?, ?;"
    ))
    {
        $stmt -> bind_param("iii", $year, $start, $limit);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[ $i++ ] = $row;
            }
        }
    }
    $mysqli->close();

    $maxPages = intval( $noOfRows / $limit );
    if ( $noOfRows % $limit > 0 ){
        $maxPages++;
    }
//    echo "max page = $maxPages";

    $returnArray = array($maxPages, $set);
    return $returnArray;
} //Returns select attributes of all non-deleted staff members

function getNoOfStaff()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT COUNT(StaffID) FROM Staff WHERE isDeleted = 0;"))
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
} //Returns number of non-deleted staff records

function getAllStaffDetailed( $initial )
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select s.`StaffID`, s.`NamewithInitials`, s.`DateofBirth`, s.`Gender`, s.`Race`, s.`Religion`,
                                    s.`CivilStatus`, s.`DateAppointedastoPost`, s.`DateJoinedthisSchool`, s.`EmploymentStatus`,
                                    s.`Medium`, s.`Designation`, '1', '1', '1', s.`Section`, s.`SubjectMostTaught`,
                                    s.`SubjectSecondMostTaught`, s.`ServiceGrade`, IFNULL( l.`OtherLeave`, 0) , IFNULL( l.`DutyLeave`, 0),
                                    IFNULL( l.`MedicalLeave`, 0) , s.`Salary`, s.`NICNumber`
                                    FROM Staff s LEFT OUTER JOIN VwLeaveNumbers l ON (l.StaffID = s.StaffID)
                                    WHERE s.isDeleted = 0
                                    GROUP BY s.StaffID
                                    ORDER BY s.StaffId + 0 LIMIT ?, 20;"))
    {
        $stmt -> bind_param("i", $initial);
        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while( $row = $result -> fetch_array() ){
                $set[ $i++ ]=$row;
            }
//            echo "<pre> " . var_dump($set) ." </pre><br />\n";
        }
    }

    $mysqli->close();
    return $set;
} //Returns 20 records of non-deleted staff records starting from $initial

function getStaffID( $staffNo ) //Gets the staffNo of a member with $staffId
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $result = null;
    $year = getConfigData( "currentYear" );

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $row = 0;

    if ($stmt = $mysqli->prepare('SELECT StaffID FROM StaffNo WHERE StaffNo = ? and Year = ?'))
    {
        $stmt -> bind_param("ii", $staffNo, $year );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $mysqli->close();
            $stmt ->close();

            if( $result->num_rows > 1){
                return -1; //More than one staff member
            }
            elseif( $result->num_rows == 0 ){
                return 0; //No staff members
            }
            else{
                $row = $result->fetch_array();
            }
        }
    }
    $name = $row[0];
    return $name;
}

function getStaffNo( $staffId ) //Gets the staffId of a member with $staffNo
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $result = null;
    $year = getConfigData( "currentYear" );

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $row = 0;

    if ($stmt = $mysqli->prepare('SELECT StaffNo FROM StaffNo WHERE StaffId = ? and Year = ?'))
    {
        $stmt -> bind_param("ii", $staffId, $year );

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $mysqli->close();
            $stmt ->close();

            if( $result->num_rows > 1){
                return -1; //More than one staff member
            }
            elseif( $result->num_rows == 0 ){
                return NULL; //No staff members
            }
            else{
                $row = $result->fetch_array();
            }
        }
    }
    $name = $row[0];
    return $name;
}

function renewStaffNos( $year ) //Sets the new staff numbers for the given year
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $mysqli->begin_transaction();

    $stmtDrop = $mysqli->prepare('DROP TABLE IF EXISTS tempStaffNo;');
    $stmtDrop -> execute();
    $stmtDrop -> close();

    $stmtCreateTemp = $mysqli->prepare('
        CREATE TABLE tempStaffNo(
            StaffID VARCHAR(5),
            StaffNo INT(11)
        );' );
    $stmtCreateTemp -> execute();
    $stmtCreateTemp -> close();

    $numRows = 0;

    if( $stmtInsertTemp = $mysqli->prepare('
        SELECT StaffID
        FROM Staff
        WHERE isDeleted = 0
        ORDER BY Designation, DateJoinedThisSchool;') )
    {
        $stmtInsertTemp -> execute();
    }
    else
    {
        echo $mysqli->errno . " " . $mysqli->error . "<br /";
    }

    $result = $stmtInsertTemp -> get_result();
    $numRows = $result -> num_rows;;
//    echo $numRows . " rows <br />";

    $arrStaffNo = array();
    $i = 0;

    while( $row = $result -> fetch_array() )
    {
        $arrStaffNo[ $i++ ] = $row[ 0 ];
    }
//    echo $i . " looping <br />";

    $stmtInsertTemp ->close();

    if( $stmtUpdateTemp = $mysqli->prepare('
        INSERT INTO `tempStaffNo`
          (`StaffNo`, `StaffID`)
        VALUES ( ?, ? );
        ') )
    {
        $i = 1;
        $curStaffNo = "";
        $stmtUpdateTemp -> bind_param( "is",  $i, $curStaffNo );
        for( $i = 1; $i <= $numRows; $i++ )
        {
            $curStaffNo = $arrStaffNo[ $i - 1 ];
            $stmtUpdateTemp -> execute();
//            echo "$i " . $arrStaffNo[ $i - 1 ] . " <br />";
        }
        $stmtUpdateTemp -> close();
    }
    else{
        echo $mysqli->errno . " " . $mysqli->error . "<br /";
        die;
    }

    IF( $stmtDeleteStaffNo = $mysqli -> prepare( '
        DELETE FROM `StaffNo`
        WHERE year = ?;' ))
    {
        $stmtDeleteStaffNo -> bind_param('i', $year);
        $stmtDeleteStaffNo -> execute();
        $stmtDeleteStaffNo -> close();
    }
    else
    {
        echo $mysqli->errno . " " . $mysqli->error . "<br /";
        die;
    }

    IF( $stmtInsertStaffNo = $mysqli -> prepare( '
        INSERT INTO StaffNo
        (StaffID, StaffNo, `Year`)
        SELECT StaffID, StaffNo, ?
        FROM tempStaffNo
        ' ))
    {
        $stmtInsertStaffNo -> bind_param('i', $year);
        $stmtInsertStaffNo -> execute();

        $stmtInsertStaffNo -> store_result();
        $numRows = $stmtInsertStaffNo -> affected_rows;
        $stmtInsertStaffNo -> close();
    }
    else
    {
        echo $mysqli->errno . " " . $mysqli->error . "<br /";
        die;
    }

    $stmtDrop = $mysqli->prepare('DROP TABLE tempStaffNo;');
    $stmtDrop -> execute();
    $stmtDrop -> close();

    $mysqli->commit();
    $mysqli->close();
    return $numRows;
}

function recreateCurrentStaffNoView( $year )
{
    /**
     * CREATE VIEW VwCurrentStaffNo
        AS
        SELECT s.`StaffID`, `NamewithInitials`, `DateofBirth`, `Gender`, `Race`, `Religion`, `CivilStatus`, `NICNumber`, `MailDeliveryAddress`, `ContactNumber`, `DateAppointedastoPost`, `DateJoinedthisSchool`, `EmploymentStatus`, `Medium`, `Designation`, `Section`, `SubjectMostTaught`, `SubjectSecondMostTaught`, `ServiceGrade`, `Salary`, `isDeleted`, sn.`StaffNo`
        FROM `Staff` s LEFT OUTER JOIN `StaffNo` sn
        ON( s.`StaffId` = sn.`StaffId` )
        WHERE s.`isDeleted` = 0
        AND sn.`Year` = '2014'
     */

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $mysqli->begin_transaction();

    if( !$stmtDrop = $mysqli->prepare('DROP VIEW IF EXISTS VwCurrentStaffNo;') )
    {
        echo "Error: " . $mysqli -> errno , ". " . $mysqli -> error . "<br />";
        die;
    };
    $stmtDrop -> execute();
    $stmtDrop -> close();

    if( !$stmtCreate = $mysqli->prepare("
        CREATE VIEW VwCurrentStaffNo
        AS
        SELECT s.`StaffID`, `NamewithInitials`, `DateofBirth`, `Gender`, `Race`, `Religion`, `CivilStatus`, `NICNumber`, `MailDeliveryAddress`, `ContactNumber`, `DateAppointedastoPost`, `DateJoinedthisSchool`, `EmploymentStatus`, `Medium`, `Designation`, `Section`, `SubjectMostTaught`, `SubjectSecondMostTaught`, `ServiceGrade`, `Salary`, `isDeleted`, sn.`StaffNo`
        FROM `Staff` s LEFT OUTER JOIN `StaffNo` sn
        ON( s.`StaffId` = sn.`StaffId` )
        WHERE s.`isDeleted` = 0
        AND sn.`Year` = '" . $mysqli -> real_escape_string( $year ) . "';"
    ) )
    {
        echo "Error: " . $mysqli -> errno , ". " . $mysqli -> error . "<br />";
        die;
    };

    $stmtCreate -> execute();
    $stmtCreate -> close();

    return;
}

//
///
/////  LEAVE MANAGEMENT
///
//

function getLeave($staffID, $startDate, $endDate, $orderField = NULL, $usingStaffNo = false){
    /**
     * $startDate and $endDate shouuld be in the yyyy-mm-dd format
     */

    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $orderField = ( strcmp( $orderField, "startDate" ) == 0 ? $orderField : "RequestDate" );

    $set = NULL;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }
    if ($stmt = $mysqli->prepare("  SELECT f.`StaffID`, s.NameWithInitials, `NoOfCasual` + `NoOfNoPay` , `NoOfMedical`, `NoOfDuty`, `RequestDate`, `StartDate`,
                                      `EndDate`, `AddressOnLeave`, `Reason`, `Status`, `ReviewedBy`, `ReviewedDate`
                                    FROM FullLeave f INNER JOIN Staff s ON (s.StaffID = f.StaffId )
                                    WHERE f.StaffID = ?
                                      AND f.isDeleted = 0
                                      AND Status = 1
                                      AND `StartDate` >= ?
                                      AND `EndDate` < ?
                                    ORDER BY $orderField; "))
    {
        $stmt -> bind_param("sss", $staffID, $startDate, $endDate);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++ ]=$row;
            }
        }
    }

    $mysqli->close();
    return $set;

} //Returns all the applied fullLeave of a non deleted staff member

/**/function getStaffLeave( $startDate, $endDate ){ //Returns all the applied approved fullLeave of all non deleted staff members
    /*
        BEGIN TRANSACTION;

        DROP VIEW IF EXISTS TempLeaveNumbers;

        CREATE VIEW TempLeaveNumbers
        AS
        SELECT `StaffID`, SUM(`NoOfCasual` + `NoOfNoPay`) AS 'OtherLeave', SUM(`NoOfMedical`) AS 'MedicalLeave', SUM(`NoOfDuty`) AS 'DutyLeave'
        FROM `FullLeave`
        WHERE isDeleted = 0
            AND Status = 1
            AND StartDate >= '2014-01-01'
            AND EndDate < '2015-01-01'
        GROUP BY StaffID;

        SELECT s.`StaffID`,  s.NameWithInitials, IFNULL(`OtherLeave`, 0) AS 'OtherLeave' , IFNULL(`MedicalLeave`, 0) AS 'MedicalLeave',
            IFNULL(`DutyLeave`, 0) AS 'DutyLeave', IFNULL( `OtherLeave` + `DutyLeave` + `medicalLeave`, 0 ) AS 'Total'
        FROM Staff s LEFT OUTER JOIN TempLeaveNumbers n ON (n.StaffId = s.StaffId)
        WHERE s.isDeleted = 0;

        COMMIT TRANSACTION;
        DROP VIEW IF EXISTS TempLeaveNumbers;
    */


    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }
    $mysqli -> begin_transaction();
    $dropStmt = $mysqli->prepare("DROP VIEW IF EXISTS TempLeaveNumbers;");
    $dropStmt -> execute();

    $startDate = $mysqli -> real_escape_string( $startDate );
    $endDate = $mysqli -> real_escape_string( $endDate );

    if( $createStmt = $mysqli->prepare("CREATE VIEW TempLeaveNumbers AS
                            SELECT `StaffID`, SUM(`NoOfCasual` + `NoOfNoPay`) AS 'OtherLeave', SUM(`NoOfMedical`) AS 'MedicalLeave', SUM(`NoOfDuty`) AS 'DutyLeave'
                            FROM `FullLeave`
                            WHERE isDeleted = 0
                                AND Status = 1
                                AND StartDate >= '$startDate'
                                AND EndDate < '$endDate'
                            GROUP BY StaffID;") )
    {
        $createStmt -> execute();
        $createStmt -> close();
    }
    else{
        $mysqli -> rollback();
        return NULL;
    }

    $selectStmt = $mysqli->prepare("SELECT s.`StaffID`,  s.NameWithInitials, IFNULL(`OtherLeave`, 0) AS 'OtherLeave',
                                    IFNULL(`MedicalLeave`, 0) AS 'MedicalLeave', IFNULL(`DutyLeave`, 0) AS 'DutyLeave',
                                    IFNULL( `OtherLeave` + `medicalLeave`, 0 ) AS 'Total'
                                FROM Staff s LEFT OUTER JOIN TempLeaveNumbers n ON (n.StaffId = s.StaffId)
                                WHERE s.isDeleted = 0
                                ORDER BY Total ASC;");
    if ($selectStmt->execute()){
        $result = $selectStmt->get_result();
        $i = 0;
        while($row = $result->fetch_array()){
            $set[$i++ ]=$row;
        }
    }
    $selectStmt -> close();

    $mysqli -> commit();
    $dropStmt -> execute();

    $mysqli->close();
    return $set;
} //Returns all the applied approved fullLeave of all non deleted staff members

function getDaysOnLeave( $startDate = null, $endDate = null ){ //Redundant function not used,
/*
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    $startDate = ( isset( $startDate ) ? $startDate : getConfigData( 'currentYear' ) . '-01-01' );
    $endDate = ( isset( $endDate ) ? $endDate : ( getConfigData( 'currentYear' ) + 1 ) . '-01-01' );

    if( $stmt = $mysqli->prepare("SELECT `StaffID`, `StartDate`, `EndDate`, `NoOfCasual`, `NoOfMedical`, `NoOfDuty`, `NoOfNoPay`
                                    FROM `FullLeave`
                                    WHERE Status = 1
                                        AND StartDate >= '2014-01-01'
                                        AND EndDate < '2015-01-01'
                                        AND STaffId = 4") )
    {
        $stmt -> bind_param( "ss", $startDate, $endDate );
        if ( $stmt -> execute() ){
            $result = $stmt -> get_result();
            $i = 0;
            while($row = $result -> fetch_array()){
                $set[$i++ ]=$row;
            }
        }
        $stmt -> close();
    }

    $mysqli -> close();
    return $set;
*/
} //Redundant function. Not used.

/**/function insertFullLeave($staffId, $noOfCasual, $noOfMedical, $noOfDuty, $noOfNoPay, $startDate, $endDate, $addressOnLeave, $reason, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO FullLeave values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
        $isDeleted = 0;
        $currentDate = date("Y-m-d");
        $status = 0;
        $reviewedBy = null;
        $reviewedDate = null;

        $stmt -> bind_param("siiiisssssissi", $staffId,  $noOfCasual, $noOfMedical, $noOfDuty, $noOfNoPay, $currentDate, $startDate, $endDate, $addressOnLeave,
            $reason, $status, $reviewedBy, $reviewedDate, $isDeleted);

        /*$query = $mysqli->prepare("SELECT `StaffID`, `CasualLeave`, `MedicalLeave`, `DutyLeave`, `isDeleted` FROM LeaveData WHERE StaffID = ?");
        $query -> bind_param("i", $staffId);
        $query -> execute();
        $query -> store_result();

        $rows = $query->num_rows;
        $query->close();

        if($rows == 0){
            insertNewLeaveData( $staffId );
        }*/

        if ($stmt->execute()){
            $stmt->close();
            $mysqli->close();
            return true;
        }
    }
    $mysqli->close();
    return false;
} //Inserts a leave application for a staff member

/**/function insertOtherLeave( $staffId, $leaveType, $leaveDate, $reason, $usingStaffNo = false ){
    /**
     * FOR LeaveType
     * 0 = None
     * 1 = Late
     * 2 = Half day
     * 3 = Short leave
     */
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;
    $currentDate = date("Y-m-d");
    $status = 0;
    $reviewedBy = null;
    $reviewedDate = null;

    if ($stmt = $mysqli->prepare("INSERT INTO `OtherLeave` (`StaffID`, `LeaveType`, `RequestDate`, `LeaveDate`, `Reason`, `Status`, `ReviewedBy`,
            `ReviewedDate`, `isDeleted`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ? )"))
    {
        $stmt -> bind_param("sisssissi", $staffId,  $leaveType, $currentDate, $leaveDate, $reason, $status, $reviewedBy, $reviewedDate, $isDeleted );

        if ($stmt->execute()){
            $stmt->close();
            $mysqli->close();
            return true;
        }
    }
    $mysqli->close();
    return false;
} //Inserts a (-n other) leave application for a staff member

/**/function checkLeaveStatus($staffId, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    $set = NULL;

    if($stmt  = $mysqli->prepare("SELECT RequestDate, Status, Reason FROM FullLeave WHERE StaffID = ? ORDER BY RequestDate"))
    {
        $stmt->bind_param("s", $staffId);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++ ]=$row;
            }
        }
    }

    $mysqli->close();
    return $set;

} //Returns select records of a staff members applied leaves

/*UNUSEDfunction insertNewLeaveData($staffID){
/*
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = NULL;

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    $config = getConfigData();

    $noCasualLeave = $config[ "noCasualLeave" ];
    $noMedicalLeave = $config[ "noMedicalLeave" ];
    $noDutyLeave = $config[ "noDutyLeave" ];

    if($stmt = $mysqli->prepare("INSERT INTO LeaveData (StaffID, CasualLeave, MedicalLeave, DutyLeave) VALUES ( ?, ?, ?, ? );"))
    {
        $stmt->bind_param("siii", $staffID, $noCasualLeave, $noMedicalLeave, $noDutyLeave);
        $stmt->execute();
        $stmt->close();
    }

    $mysqli->close();
    return;
} //Insert new set of numbers to a staff members leavedata (Remaining leave days) */

function getFullLeaveData($staffId, $startDate = NULL, $endDate = NULL, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = array( NULL );

    $year = getConfigData( "currentYear" );

    $startDate = ( isset( $startDate ) ? $startDate : $year . '-01-01' );
    $endDate = ( isset( $endDate ) ? $endDate : ( $year + 1 ) . '-01-01' );

    if($mysqli->connect_errno)
    {
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    if( $checkStmt = $mysqli -> prepare( "SELECT SUM( l.NoOfCasual ), SUM( l.NoOfMedical ), SUM( l.NoOfDuty ),
                                                SUM( l.NoOfNoPay )
                                            FROM FullLeave l
                                            WHERE l.StaffId = ?
                                                AND l.status = 1
                                                AND l.StartDate >= ?
                                                AND l.EndDate < ?
                                            GROUP BY l.Staffid;" ) )
    {
        $checkStmt -> bind_param("sss", $staffId, $startDate, $endDate );
        if($checkStmt -> execute()){
            $result = $checkStmt -> get_result();

            if( $result -> num_rows == 0){
                $set[ 0 ][ 0 ] = 0;
                $set[ 0 ][ 1 ] = 0;
                $set[ 0 ][ 2 ] = 0;
                $set[ 0 ][ 3 ] = 0;
            }
            else{
                $row = $result -> fetch_array();
                $set[ 0 ] = $row;
            }
        }
    }
    $checkStmt -> close();

    if($stmt = $mysqli->prepare("SELECT s.NameWithInitials, fSection.Data as 'Section',
                                        fDesignation.Data as 'Designation',  s.ContactNumber
                                    FROM Staff s , FormOption fSection, FormOption fDesignation
                                    WHERE s.StaffId = ?
                                        AND fSection.Number = s.Section
                                        AND fSection.Label = 'Section'
                                        AND fDesignation.Number = s.Designation
                                        AND fDesignation.Label = 'Designation'; "))
    {
        $stmt->bind_param("s", $staffId );

        if($stmt->execute()){
            $result = $stmt->get_result();

            $row = $result->fetch_array();
                $set[ 0 ][ 4 ] = $row[ 0 ];
                $set[ 0 ][ 5 ] = $row[ 1 ];
                $set[ 0 ][ 6 ] = $row[ 2 ];
                $set[ 0 ][ 7 ] = $row[ 3 ];
        }
    }
    $mysqli->close();
    return $set;
} //Returns full leave numbers for the staff member.

function getOtherLeaveData($staffId, $month = NULL, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if( !isset( $month ) || ( $month > 12 || $month < 1 ) ){
        $month = date( "m");
    }

//    echo "MONTH IS $month";

    $year = getConfigData( "currentYear" );

    $nextYear = ( $month == 12 ? $year + 1 : $year );
    $nextMonth = ( $month == 12 ? 1 : $month + 1 );

    $startDate = "$year-$month-01";
    $endDate = "$nextYear-$nextMonth-01";

    $set = NULL;

    if($mysqli->connect_errno){
        die ("Failed to connect to MySQL: " . $mysqli->connect_errno );
    }

    if($stmt = $mysqli->prepare("SELECT `LeaveType`, COUNT(`LeaveType`)
                                    FROM `OtherLeave`
                                    WHERE StaffID = ?
                                        AND isDeleted = 0
										AND `LeaveDate` >= ?
										AND `LeaveDate` < ?
                                    GROUP BY `LeaveType`; "))
    {
        $stmt->bind_param("sss", $staffId, $startDate, $endDate );

        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows == 0){
//                insertNewLeaveData($StaffID);
                return null;
            }
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++ ]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
} //Returns other leave numbers for the staff member.

/**/function getAllLeaveToApprove(){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT s.`StaffID`, s.NameWithInitials, `NoOfCasual`, `NoOfMedical`, `NoOfDuty`, `NoOfNoPay`,
                                        `RequestDate`, `StartDate`, `EndDate`, `AddressOnLeave`, `Reason`, `Status`, `ReviewedBy`, `ReviewedDate`
                                    FROM `FullLeave` fl INNER JOIN `Staff` s ON (s.StaffId = fl.StaffId)
                                    WHERE fl.isDeleted = 0
                                        AND fl.Status = 0
                                    ORDER BY fl.RequestDate, s.NameWithInitials"))
    {
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;

            while($row = $result->fetch_array()){
                $row[6] = date_format( date_create( $row[6] ), 'd-m-Y' );
                $row[7] = date_format( date_create( $row[7] ), 'd-m-Y' );
                $row[8] = date_format( date_create( $row[8] ), 'd-m-Y' );
//                echo date_format($test, 'Y-m-d
                $set[$i++]=$row;
            }
        }
    }

//    $set = null;
    $mysqli->close();
    return $set;
} //Returns all leaves not reviewed along with their staff member's details

/**/function getStaffLeavetoApprove( $staffId, $sDate, $usingStaffNo = false )
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;
    $sDate = date_format( date_create( $sDate ), "Y-m-d");

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("  SELECT fl.`StaffID`, `NoOfCasual`, `NoOfMedical`, `NoOfDuty`,
                                        `NoOfNoPay`, `RequestDate`, `StartDate`, `EndDate`, `AddressOnLeave`, `Reason`
                                    FROM `FullLeave` fl
                                    WHERE fl.`StaffId` = ?
                                        AND fl.`startDate` = ?
                                        AND fl.`Status` = 0;"))
    {
        $stmt->bind_param("ss", $staffId, $sDate);
        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++]=$row;
            }
        }
    }
    $mysqli->close();
    return $set;
} //Gets a single instance of applied leave for a staff member

/**/function reviewLeave($staffId, $sDate, $ReviewedBy = null, $status = 1, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $ReviewedDate = date("Y-m-d");

    if($stmt = $mysqli->prepare("  UPDATE FullLeave l
                                    SET l.Status = ?, l.ReviewedBy = ?,  l.ReviewedDate = ?
                                    WHERE l.StaffID = ?
                                      AND l.StartDate = ? "))
    {
        $stmt->bind_param("issss", $status, $ReviewedBy, $ReviewedDate, $staffId, $sDate);
        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }
    }
    $mysqli->close();
    return false;
}

//
///
/////  CLASS MANAGEMENT
///
//

function insertClassroom($staffId, $grade, $class, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmtCheck = $mysqli->prepare("SELECT `StaffID`, `Grade`, `Class`, `isDeleted` FROM ClassInformation WHERE Grade=? AND Class=?;"))
    {
        $stmtCheck -> bind_param("is", $grade, $class);
        $stmtCheck -> execute();
        $result = $stmtCheck->get_result();

        if ($result->num_rows == 0)
        {
            if ($stmt = $mysqli->prepare("INSERT INTO ClassInformation values(?, ?, ?, ?);"))
            {
                $isDeleted = 0;
                $stmt -> bind_param("sisi",$staffId, $grade, $class, $isDeleted);

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
                $stmt -> bind_param("iiis",$staffId, $isDeleted, $grade, $class );

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
} //Inserts new classroom teacher information or updates existing deleted one

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
} //Returns all undeleted classroom information and their teacher's information

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
} //Soft-deletes classroom information

//
///
/////  SUBJECTS, TIMETABLES AND SUBSTITUTION MANAGEMENT
///
//

function getAllSubjects()
{
    return getFormOptions('SubjectAppointed', 1);
} //Self-explanatory

function insertNewTimetable($staffId, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare('INSERT INTO Timetable (Grade, Class, Day, Position, Subject, StaffID, isDeleted) values (?,?,?,?,?,?,?);' ))
    {
        $nullValue = null;

        $day = 0;
        $position = 0;
        for($day = 0; $day < 5; $day++){
            for($position=0; $position < 8; $position++){
                $stmt -> bind_param("isiissi",$nullValue,$nullValue,$day,$position,$nullValue, $staffId, $isDeleted  );
                $stmt->execute();
            }
        }
        $stmt->close();
        $mysqli->close();
//        regenerateSubjectTable();
        return true;
    }

    $mysqli->close();
    return false;
} //Inserts blank timetable for a staff member

function updateTimetable($staffId, $GradeArr, $ClassArr, $SubjectArr, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare('UPDATE Timetable set Grade=?, Class=?, Subject=?, isDeleted=? WHERE Day = ? AND Position = ? AND StaffId = ?;'))
    {

        $i = $x = $number = 0;

        for($i = 0; $i < 5; $i++){
            for($x = 0; $x < 8; $x++){
                $number = ($i * 8) + $x;
                $stmt -> bind_param("issiiii", $curGrade, $ClassArr[ $number ], $SubjectArr[ $number ], $isDeleted, $i, $x, $staffId);
                $curGrade = ($GradeArr[$number] == 0 ? null : $GradeArr[$number]);
                $stmt -> execute();
            }
        }
        $stmt->close();
        $mysqli->close();
//        regenerateSubjectTable();
        return true;
    }
    $mysqli->close();
    return false;
} //Self-explanatory

function deleteTimetable($staffId, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

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

} //Self-explanatory

function getTimetable($staffId, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

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
                insertNewTimetable( $staffId, false ); //Does not use StaffNo
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
} //Self-explanatory

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

} //Self-explanatory

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

} //Unused

function confirmSubstitution($replacementStaffID , $Grade , $Class , $Day , $Position , $Date , $SubstitutedTeacherID, $usingStaffNo = false )
{
    if( $usingStaffNo ){
        $replacementStaffID = getStaffID( $replacementStaffID );
        $SubstitutedTeacherID = getStaffID( $SubstitutedTeacherID );
    }

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
} //Inserts into isSubstituted the substitution record

function getFreeTeachers($position, $day, $staffId, $usingStaffNo = false)
{
    if( $usingStaffNo ){
        $staffId = getStaffID( $staffId );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT s.StaffID, s.NameWithInitials, sub.Name, s.ContactNumber
                                    FROM Staff s LEFT OUTER JOIN Subject sub ON (sub.Number = s.SubjectMostTaught)
                                    WHERE s.StaffID IN
                                        (SELECT staffID
                                        FROM Timetable t
                                        WHERE Position = ?
                                            AND Day = ?
                                            AND isDeleted = 0
                                            AND (Subject IS NULL)
                                            AND StaffID <> ?)
                                        AND s.isDeleted = 0
                                     ORDER BY sub.Name;"))
    {
        //  $id = "%" . $id . "%";
        $stmt -> bind_param("iii", $position, $day, $staffId );

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
} //Returns all free staff members on a slot in the timetable

//
///
/////  STAFF ATTENDANCE
///
//

function markPresent( $staffID, $date, $usingStaffNo = false ){

    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $query = "INSERT INTO Attendance (`StaffID`, `Date`, `isPresent`) VALUES ( ?, ?, 1)";

    $stmt = $mysqli->prepare( $query );
    if ( $stmt )
    {
        $stmt -> bind_param("ss", $staffID,  $date );
        if ( $stmt -> execute() ){
            $stmt -> close();
            $mysqli -> close();
            return true;
        }
    }
    $mysqli->close();
    return false;
}

function undoMarkPresent( $staffID, $date, $usingStaffNo = false ){

    if( $usingStaffNo ){
        $staffID = getStaffID( $staffID );
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {

        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $query = "DELETE FROM Attendance WHERE `StaffID` = ? AND `Date` = ? ";

    $stmt = $mysqli->prepare( $query );
    if ( $stmt )
    {
        $stmt -> bind_param("ss", $staffID,  $date );
        if ( $stmt -> execute() ){
            $stmt -> close();
            $mysqli -> close();
            return true;
        }
    }
    $mysqli->close();
    return false;
}


//
///
/////  LANGUAGE AND UTITLITY
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
} //Returns language data of a $label for $language

function getFormOptions($label, $OrderBy = 0){ //Returns numbers and options for that form drop-down box
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $query = "SELECT `Number`, `Data`, `OrderingGroup` FROM FormOption WHERE Label LIKE ? ORDER BY Number + 0 ";

    if( $OrderBy != 0 ){
        $query = "SELECT `Number`, `Data`, `OrderingGroup`, `Type` FROM FormOption WHERE Label LIKE ? ORDER BY OrderingGroup + 0 ";
    }

    if ($stmt = $mysqli->prepare( $query ))
    {
        $stmt -> bind_param("s", $label);
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
} //Returns numbers and options for that form drop-down box

function getStaffFormOption( $field ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $query = "SELECT `Number`, `Data`, `OrderingGroup`, `Type` FROM FormOption WHERE Label = 'searchStaff' and Number = ? LIMIT 1;";

    if ($stmt = $mysqli->prepare( $query ))
    {
        $stmt -> bind_param("s", $field);
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
    if ( $set[0][3] == 0 ){
        return getFormOptions( $field );
    }
    else{
        return null;
    }
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

    if ($stmt = $mysqli->prepare("Select `Year`, `Day` FROM Holiday WHERE Day = ? ;"))
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
} //Checks if $date is a $holiday

function getHolidays($year){

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = array();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select (DATE_FORMAT(Day, '%d/%m/%Y') ) FROM Holiday WHERE Year = ? ORDER BY Day;"))
    {
        $stmt -> bind_param("i", $year);

        if ($stmt->execute()){
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array()){
                $set[$i++]=$row[0];
            }
        }
    }
    $mysqli->close();
    return $set;
} //Returns all holidays of a $year

function insertHolidays($year, $dayArray)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmtDel = $mysqli->prepare("DELETE FROM Holiday WHERE Year=?;"))
    {
        $stmtDel -> bind_param("i", $year);
        $stmtDel -> execute();
        $stmtDel -> close();

        if ($stmtIns = $mysqli->prepare("INSERT INTO Holiday values(?, (SELECT STR_TO_DATE(?, '%d/%m/%Y') ), null, null);"))
        {
            for($i = 0; $i < count($dayArray); $i++)
            {
                $stmtIns -> bind_param("is", $year, $dayArray[$i]);
                $stmtIns -> execute();
            }

            $stmtIns->close();
            $mysqli->close();
            return true;
        }
    }

    $mysqli->close();
    return false;
} //Deletes records of $year and inserts new holidays

//
///
/////  SMS System
///
//

function sendSMS( $phoneNumber, $message )
{
    $sender = 'manaSystem';
    $status = 'send';
    $phoneNumber = preparePhoneNumber( $phoneNumber );

    if( !isFilled( $phoneNumber ) )
    {
        return false;
    }

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getSMSConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        INSERT INTO ozekimessageout (sender, receiver, msg, status)
        VALUES ( ?, ?, ?, ?);"
    ) )
    {
        $stmt->bind_param("ssss", $sender, $phoneNumber, $message, $status);
        if ( $stmt->execute() )
        {
            if( $stmt->affected_rows == 1 )
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

function markMessageAsRead( $id ){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getSMSConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("
        UPDATE `ozekimessagein` SET status='read'
        WHERE `id`= ?"
    ) )
    {
        $stmt->bind_param("s", $id);
        if ( $stmt->execute() )
        {
            if( $stmt->affected_rows == 1 )
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

function getAllReceivedSMS()
{
    $i = 0;

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getSMSConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $set = array();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT id, sender, msg FROM ozekimessagein WHERE status = 'unread'"))
    {
        if ($stmt->execute()){
            $result = $stmt->get_result();
            while($row = $result->fetch_array()){
                $set[$i++]=$row;
            }
        }
    }
    $mysqli->close();

    if( $i != 0)
    {
        return $set;
    }
    else
    {
        return null;
    }
}

function getAllSendingSMS()
{
    $i = 0;

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getSMSConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $set = array();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT id, receiver, msg FROM ozekimessageout WHERE status='sending' OR status='send'"))
    {
        if ($stmt->execute()){
            $result = $stmt->get_result();
            while($row = $result->fetch_array()){
                $set[$i++]=$row;
            }
        }
    }
    $mysqli->close();

    if( $i != 0)
    {
        return $set;
    }
    else
    {
        return null;
    }
}

function getStaffNameFromPhoneNumber( $phoneNumber )
{
    $len = strlen( $phoneNumber );
    if( $len >= 9 )
    {
        $key = substr( $phoneNumber, $len - 9, 9);
        $result = searchStaff( "ContactNumber", $key, 2, "StaffNo", "asc", "0", "4", true );
        $maxPage = $result[0];
        $tableData = $result[1];
        if( isset( $tableData ) )
        {
            $row = $tableData[0];
            return array( getStaffNo( $row[0] ), $row[1] );
        }
    }

    return array( 0, $phoneNumber . " (Unknown Number)"  );
}

//
///
/////  UNCATALOGUED
///
//

function insertEvent( $eventid, $name, $description, $location, $status, $date, $eventcreator, $starttime, $endtime)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare("INSERT INTO Event values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"))
    {
        $stmt -> bind_param("ssssissssi",  $eventid, $name, $description, $location, $status, $date, $eventcreator, $starttime, $endtime, $isDeleted);
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

function editEvent($name, $description, $location, $date, $starttime, $endtime, $eventID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE Event SET Name=?, Description=?, Location=?, EventDate=?, StartTime=?, EndTime=? WHERE EventID=?;"))
    {
        $stmt -> bind_param("ssssssi", $name, $description, $location, $date, $starttime, $endtime, $eventID);
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

function getAllEvents()
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }


    if ($stmt = $mysqli->prepare("Select EventID, Name, EventDate, Description FROM Event WHERE isDeleted = 0 ORDER BY EventDate;"))
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

function getEventdetails($EventID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }


    if ($stmt = $mysqli->prepare("Select Name, Description, EventDate, Location, StartTime, EndTime FROM Event WHERE EventID=?"))
    {
        $stmt->bind_param('i', $EventID);

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

function insertStudent($admissionNo, $name, $dateofbirth, $nat_race, $religion, $medium, $address, $grade, $class, $house)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare("INSERT INTO Student values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
        $stmt -> bind_param("sssiiisissi", $admissionNo, $name, $dateofbirth ,$nat_race, $religion, $medium, $address, $grade, $class, $house, $isDeleted);
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

function getParent($key)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select NamewithInitials, Occupation, PhoneLand, PhoneMobile, HomeAddress, OfficeAddress FROM ParentsInformation WHERE isDeleted = 0 AND AdmissionNo = ?;"))
    {
        $stmt->bind_param("s", $key);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row;
            }
        }
        $stmt -> close();
    }

    $mysqli->close();
    return $set;
}

function insertParent($admin_no, $par_gur, $p_name,$occupation, $p_number, $m_number, $address, $o_address )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }



    if ($stmt = $mysqli->prepare("INSERT INTO ParentsInformation (AdmissionNo, NamewithInitials, Parent_Guardian, Occupation, PhoneLand, PhoneMobile, HomeAddress, OfficeAddress, isDeleted) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {
        $isDeleted = 0;

        $stmt -> bind_param("ssisssssi", $admin_no, $p_name, $par_gur, $occupation, $p_number, $m_number, $address, $o_address , $isDeleted);


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

function SearchStudentByName($key)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, NameWithInitials, DateOfBirth, CONCAT(Grade, ' ', Class) FROM Student WHERE NameWithInitials LIKE ? AND isDeleted = 0 ORDER BY AdmissionNo;"))
    {
        $id = "%" . $key . "%";
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

function SearchStudent($key)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, NameWithInitials, DateOfBirth, CONCAT(Grade, ' ', Class) FROM Student WHERE AdmissionNo = ? AND isDeleted = 0;"))
    {
        $stmt -> bind_param("s", $key);

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

function SearchStudentbyclass($key)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }
    $arrGradeAndClass = array();
    $arrGradeAndClass = getGradeAndClass($key);

    if ($stmt = $mysqli->prepare("Select s1.AdmissionNo, s1.NameWithInitials, s1.DateOfBirth, CONCAT(s1.Grade, ' ', s1.Class) FROM Student s1 WHERE Grade = ? AND Class = ?;"))
    {
        $stmt -> bind_param("is", $arrGradeAndClass[0], $arrGradeAndClass[1]);

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

function UpdateStudent($AdmissionNo, $NamewithInitials, $DOB, $Race, $Religion, $Medium, $Address, $Grade, $Class, $House)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmtCheck = $mysqli->prepare("SELECT * FROM Student WHERE AdmissionNo=? ;"))
    {
        $stmtCheck -> bind_param("s", $AdmissionNo);
        $stmtCheck -> execute();
        $result = $stmtCheck->get_result();

//        echo "YAZDAAN LOOK HERE" . $result->num_rows;

        if ($result -> num_rows == 1)
        {
            if ($stmt = $mysqli->prepare("UPDATE Student SET NameWithInitials=?, DateOfBirth=?, Nationality_Race=?, Religion=?, Medium=?, Address=?, Grade=?, Class=?, House=?, isDeleted=? WHERE AdmissionNo=?"))
            {
                $isDeleted = 0;
                $stmt -> bind_param("ssiiisissis",$NamewithInitials, $DOB, $Race, $Religion, $Medium, $Address, $Grade, $Class, $House, $isDeleted, $AdmissionNo);

                if ($stmt->execute())
                {
                    $stmt->close();
                    $mysqli->close();
                    return true;
                }
                $stmt->close();
            }
        }

        $stmtCheck->close();

    }
    $mysqli->close();
    return false;
}

function insertManager( $eventId, $staffID)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare("INSERT INTO EventManager values(?, ?, ?);"))
    {


        $stmt -> bind_param("isi",  $eventId, $staffID, $isDeleted);
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

function insertTransaction($eventID, $tDate, $tType, $amount, $description )
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $isDeleted = 0;

    if ($stmt = $mysqli->prepare("SELECT MAX(TransactionID)FROM Transaction where eventID = ?;" )){
        $stmt -> bind_param("i", $eventID);
        $stmt->execute();

        $result = $stmt -> get_result();
        $result = $result -> fetch_array();
        $result = $result[0];
        $result++;

//        return "MANOJ LOOK HERE" . $result;

    }

    if ($stmt = $mysqli->prepare("INSERT INTO Transaction (EventID, TransactionID, TransactionDate, TransactionType, Amount, Description, isDeleted) values(?, ?, ?, ?, ?, ?, ?)"))
    {
        $stmt -> bind_param("iisissi",$eventID, $result, $tDate, $tType, $amount, $description, $isDeleted);
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

function getEventManagers($eventid)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select s.StaffID, s.NamewithInitials, s.ContactNumber  FROM Staff s RIGHT OUTER JOIN EventManager e on( e.StaffID = s.staffID) where e.eventid = ?"))
    {
        $stmt -> bind_param("i", $eventid);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++ ] = $row;
            }
        }
    }
    $mysqli->close();
    return $set;
}

function getEventTransactions($eventid)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select TransactionID, TransactionDate, TransactionType, Amount, Description  FROM Transaction where eventId = ?"))
    {
        $stmt -> bind_param("i", $eventid);

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

function getTransactionReport($eventid)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select  TransactionDate, TransactionType, Amount, Description  FROM Transaction where EventID = ?"))
    {
        $stmt -> bind_param("i", $eventid);

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

function getExpenses($eventid)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $result = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT SUM(Amount) from Transaction where EventID = ? and TransactionType= 1"))
    {
        $stmt -> bind_param("s", $eventid);

        $stmt->execute();

        $result = $stmt -> get_result();
        $result = $result -> fetch_array();
        $result = $result[0];
    }
    $stmt->close();
    $mysqli->close();
    return $result;
}

function getIncomes($eventid)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $result = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT SUM(Amount) from Transaction where EventID = ? and TransactionType = 0"))
    {
        $stmt -> bind_param("s", $eventid);

        if ($stmt->execute())
            $stmt->execute();

        $result = $stmt -> get_result();
        $result = $result -> fetch_array();
        $result = $result[0];
    }
    $stmt->close();
    $mysqli->close();
    return $result;
}

function getAllStudents()
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, NameWithInitials, DateOfBirth, Grade, Class, FROM Student WHERE isDeleted = 0 ORDER BY accessLevel;"))
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

function studentReport($Grade, $Class)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, NameWithInitials, DateOfBirth, Grade, Class FROM Student WHERE Grade = ? and Class = ?;"))
    {
        $stmt -> bind_param("is", $Grade,$Class);

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

function getStudent($AdmissionNo)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select * FROM Student WHERE isDeleted = 0 AND AdmissionNo = ?;"))
    {
        $stmt->bind_param("s", $AdmissionNo);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row;
            }
        }
        $stmt -> close();
    }

    $mysqli->close();
    return $set;
}

function getClassOfStudents($grade, $class){
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, NameWithInitials FROM Student WHERE isDeleted = 0 AND Class = ? AND Grade = ?;"))
    {
        $stmt->bind_param("si", $class, $grade);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row;
            }
        }
        $stmt -> close();
    }
    $mysqli->close();
    return $set;
}

function insertOLMarks($admissionNo,$indexNo,$year,$subjectArr,$GradeArr)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO OLMarks (IndexNo, AdmissionNo,Year, Subject, Grade) VALUES(?, ?, ? ,?, ?)"))
    {
        $noRows = 0;
        for($i=0;$i<9;$i++){
            $stmt->bind_param("isiss", $indexNo,$admissionNo,$year,$subjectArr[$i],$GradeArr[$i]);
            $stmt->execute();
            $noRows += $stmt->affected_rows;
        }

        $stmt->close();

        if ($noRows != -9){
            $mysqli->close();
            return true;
        }
    }

    $mysqli->close();
    return false;

}

function insertALMarks($admissionNo,$indexNo,$year, $Subject1, $Subject2, $Subject3,$Grade1, $Grade2, $Grade3, $GeneralEnglish,$CommonGenaralTest,$ZScore,$IslandRank,$DistrictRank)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO ALMarks VALUES(?, ?, ? , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))
    {

        $stmt->bind_param("isisssssssidii", $indexNo, $admissionNo, $year, $Subject1, $Subject2, $Subject3, $Grade1, $Grade2, $Grade3, $GeneralEnglish, $CommonGenaralTest, $ZScore, $IslandRank, $DistrictRank);

        if($stmt->execute())
        {
            $stmt->close();
            return true;
        }

    }

    $mysqli->close();
    return false;

}

function insertTermTestMarks($AdmissionNoArr, $Subject, $Term, $Year, $MarksArr, $RemarksArr)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO TermMarks VALUES(?, ?, ?, ?, ?, ?, ?)"))
    {
        $isDeleted = 0;

        foreach($AdmissionNoArr as $AdmissionNo){
//            echo $AdmissionNo . " " . $MarksArr[$AdmissionNo] . " " . $RemarksArr[$AdmissionNo] . "<br/>";
            $MarkVar = $MarksArr[$AdmissionNo];
            $RemarksVar = $RemarksArr[$AdmissionNo];

            $stmt->bind_param("ssiiisi", $AdmissionNo,$Subject, $Term, $Year, $MarkVar, $RemarksVar, $isDeleted);
            $stmt->execute();
        }
        $stmt->close();
        $mysqli->close();
        return true;
    }
    $mysqli->close();
    return false;
}

function searchOLMarks($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select o.IndexNo, o.AdmissionNo,s.NameWithInitials, o.Year, o.Subject, o.Grade From OLMarks o, Student s WHERE o.IndexNo=? AND o.AdmissionNo=s.AdmissionNo"))
    {
        $stmt -> bind_param("i", $id );

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

function searchOLbyAdmission($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select o.IndexNo, o.AdmissionNo,s.NameWithInitials, o.Year, o.Subject, o.Grade From OLMarks o , Student s WHERE o.AdmissionNo=? AND o.AdmissionNo=s.AdmissionNo"))
    {
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

function searchOLbyYear($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select o.IndexNo, o.AdmissionNo,s.NameWithInitials, o.Year, o.Subject, o.Grade From OLMarks o , Student s WHERE o.Year=? AND o.AdmissionNo=s.AdmissionNo"))
    {
        $stmt -> bind_param("i", $id );

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

function getOlResults($AdmissionNo)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select o.IndexNo, o.AdmissionNo,s.NameWithInitials, o.Year, o.Subject, o.Grade From OLMarks o , Student s WHERE o.AdmissionNo=? AND o.AdmissionNo=s.AdmissionNo;"))
    {
        $stmt->bind_param("s", $AdmissionNo);

        if ($stmt->execute())
        {
            $result = $stmt->get_result();
            $i = 0;
            while($row = $result->fetch_array())
            {
                $set[$i++]=$row;
            }
        }
        $stmt -> close();
    }

    $mysqli->close();
    return $set;
}

function updateOLResults($IndexNo, $Subject, $Grade)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE OLMarks SET Grade=? WHERE IndexNo=? AND Subject=?"))
    {

        $stmt -> bind_param("sis",$Grade, $IndexNo, $Subject);

        if ($stmt->execute())
        {
            $stmt->close();
            $mysqli->close();
            return true;
        }
        $stmt->close();
    }


    $mysqli->close();
    return false;
}

function searchALMarks($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select a.IndexNo, a.AdmissionNo, s.NameWithInitials ,a.Year, a.Subject_1,a.Subject_2,a.Subject_3, a.Grade_1,a.Grade_2,a.Grade_3,a.Gen_Eng_Grade,a.Cmn_Gen_Mark,a.Z_Score,a.Island_Rank,a.District_Rank From ALMarks a, Student s WHERE a.IndexNo=? AND a.AdmissionNo=s.AdmissionNo ;"))
    {
        $stmt -> bind_param("i", $id );

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

function searchALByAdmission($id)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select a.IndexNo, a.AdmissionNo, s.NameWithInitials ,a.Year, a.Subject_1,a.Subject_2,a.Subject_3, a.Grade_1,a.Grade_2,a.Grade_3,a.Gen_Eng_Grade,a.Cmn_Gen_Mark,a.Z_Score,a.Island_Rank,a.District_Rank From ALMarks a, Student s WHERE a.AdmissionNo=? AND a.AdmissionNo=s.AdmissionNo ;"))
    {
        $stmt -> bind_param("i", $id );

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

function updateALResults($IndexNo, $Grade1, $Grade2, $Grade3, $GeneralEnglish, $CommonGeneralTest, $ZScore, $IslandRank, $DistrictRank)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("UPDATE ALMarks SET Grade_1=?, Grade_2=?, Grade_3=?, Gen_Eng_Grade=?, Cmn_Gen_Mark=?, Z_Score=?, Island_Rank=?, District_Rank=? WHERE IndexNo=?"))
    {
        $stmt -> bind_param("sssssdiii", $Grade1, $Grade2, $Grade3, $GeneralEnglish, $CommonGeneralTest, $ZScore, $IslandRank, $DistrictRank, $IndexNo);

        if ($stmt->execute())
        {
            $stmt->close();
            $mysqli->close();
            return true;
        }
        $stmt->close();
    }

    $mysqli->close();
    return false;
}

function markAttendance($AdmissionNoArr, $DateArr, $isPresentArr)
{
    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("INSERT INTO Attendance values(?, ?, ?);"))
    {
        $i = 0;
        foreach($AdmissionNoArr as $AdmissionNo){
            $stmt -> bind_param("isi",  $AdmissionNo, $DateArr[$i], $isPresentArr[$i]);
            $stmt->execute();
            $i++;
        }
        if ($stmt->affected_rows > 0){
            $stmt -> close();
            $mysqli->close();
            return true;
        };
        $stmt -> close();
        $mysqli->close();
    }
    $mysqli->close();
    return false;
}

function getAttendance($minDate, $maxDate)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("Select AdmissionNo, Date, isPresent FROM Attendance WHERE  Date BETWEEN ? AND ? ORDER BY AdmissionNo;"))
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

function getAttendanceReport($startDate,$endDate,$grade,$class)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT a.AdmissionNo, s.NamewithInitials, SUM(a.isPresent), COUNT(a.isPresent) FROM Attendance a JOIN Student s ON (a.AdmissionNo = s.AdmissionNo)WHERE (a.Date BETWEEN ? AND ? ) AND  s.Grade=? AND s.Class=? GROUP BY a.AdmissionNo, s.NamewithInitials"))
    {
        $stmt->bind_param("ssis",$startDate,$endDate,$grade, $class);
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

function getAttendanceReport2($startDate,$endDate,$admissionNo)
{

    $dbObj = new dbConnect();
    $mysqli = $dbObj->getConnection();

    $set = null;

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    if ($stmt = $mysqli->prepare("SELECT a.AdmissionNo, s.NamewithInitials, SUM(a.isPresent), COUNT(a.isPresent) FROM Attendance a JOIN Student s ON (a.AdmissionNo = s.AdmissionNo)WHERE (a.Date BETWEEN ? AND ? ) AND  s.Grade=? AND s.Class=? GROUP BY a.AdmissionNo, s.NamewithInitials "))
    {
        $stmt->bind_param("ssis",$startDate,$endDate,$admissionNo);
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
