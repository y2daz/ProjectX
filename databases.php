<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 8/5/14
 * Time: 12:00 PM
 */

    require_once("dbConnect.php");

    $dbObj = new dbConnect();

    $mysqli = $dbObj->getConnection();

    if ($mysqli->connect_errno) {
        die ("Failed to connect to MySQL: " . $mysqli->connect_error );
    }

    $res = $mysqli->query("SELECT 'choices to please everybody.' AS _msg");
    $row = $res->fetch_assoc();
    echo $row['_msg'];


?>


<?php

    //2. prepare the sql query
//
//    $query = "SELECT * FROM sub";
//    $result = mysqli_query($connection, $query);
//
//    //test if there is an error
//    if(!$result){
//
//            die("Database query failed.");
//    }
//
//

?>

<html>

    <head><title>Database Connection</title></head>


    <body>

    <?php
	
        //3. use returned data if any
//
//        while($row = mysqli_fetch_row($result)){
//            //output data from each row
//            var_dump($row);
//            echo "<hr />";
//
//
//        }
//
//    ?>

    <?php

    //4. release the data
//    mysqli_free_result($result);

    ?>

    </body>
</html>


<?php


    //5 close the database

//    mysqli_close($connection);
    $mysqli->close();

?>
