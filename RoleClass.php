<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 27/09/14
 * Time: 15:02
 */

require_once("dbConnect.php");

class Role {
    protected $permissions;

    protected function __construct() {
        $this->permissions = array();
    }

    // return a role object with associated permissions
    public static function getRolePerms($roleId) {
        $role = new Role();

        $dbObj = new dbConnect();
        $mysqli = $dbObj->getConnection();

        $set = null;

        if ($mysqli->connect_errno) {
            die ("Failed to connect to MySQL: " . $mysqli->connect_error );
        }
        if ($stmt = $mysqli->prepare("SELECT t2.permDesc FROM RolePerm as t1
                JOIN Permissions as t2 ON t1.PermId = t2.PermId
                WHERE t1.RoleId = ?"))
        {
            $stmt->bind_param("i", $roleId);

            if ($stmt->execute())
            {
                $result = $stmt->get_result();
//                $i = 0;
                while($row = $result->fetch_assoc())
                {
                    $role->permissions[ $row["permDesc"] ] = true;
                }
            }
        }
        $stmt->close();
        $mysqli->close();
        return $role;
    }

    // check if a permission is set
    public function hasPerm($permission) {


//        var_dump( $this->permissions );
//        echo "<br />";
//        echo "<br />";
//        echo "<br />";

        return isset($this->permissions[$permission]);
    }
} 