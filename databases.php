<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/5/14
 * Time: 12:00 PM
 */

    //1. create tbe database connection

    $dbhost = "localhost";
    $dbuser = "shavin";
    $dbpass = "secretpassword";
    $dbname = "testdb";
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    //test if connection occured

    if(mysqli_connect_errno()){
        die("Database connection failed: " .
                mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
        );

    }

?>


<?php

    //2. prepare the sql query

    $query = "SELECT * FROM sub";
    $result = mysqli_query($connection, $query);

    //test if there is an error
    if(!$result){

            die("Database query failed.");
    }



?>

<html>

    <head><title>Database Connection</title></head>


    <body>

    <?php
	
        //3. use returned data if any

        while($row = mysqli_fetch_row($result)){
            //output data from each row
            var_dump($row);
            echo "<hr />";


        }

    ?>

    <?php

    //4. release the data
    mysqli_free_result($result);

    ?>

    </body>
</html>


<?php


    //5 close the database

    mysqli_close($connection);

?>
