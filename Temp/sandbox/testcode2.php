<?php
/**
 * Created by PhpStorm.
 * User: Shavin
 * Date: 9/10/14
 * Time: 11:55 PM
 */

?>

<html>

<head>

</head>

<body>

    <?php

        $Check = $_GET["Code"];

        echo $Check;

    ?>

    <form method="get">

        <input type="text" name="Code" value="<?php echo $Check ?>">

        <input type="submit" name="Submit">

    </form>

</body>

</html>