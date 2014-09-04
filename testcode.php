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

$now = strtotime("2014-01-01"); // or your date as well
$your_date = strtotime("2014-01-02");
$datediff = $your_date - $now;
echo floor($datediff/(60*60*24));

?>

</body>

</html>