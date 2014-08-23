<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 8/16/14
 * Time: 10:50 PM
 */

?>


<html>

<title> Header </title>

<head>

    <script type="text/javascript" src="common.js"></script>
    <script type="text/javascript" src="jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="scripts/jquery-impromptu.min.js"></script>

    <link rel="stylesheet" href="scripts/jquery-impromptu.min.css"

</head>

<body>

    <?php

        $testcode = "Shavin Peiris";

        sendNotification("this is a sample test");
    ?>

   <!--<input type="button" value="Testing" onclick="sendMessage(<?php //echo $testcode ?>')" -->

</body>

</html>