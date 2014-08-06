<?php
/**
 * Created by PhpStorm.
 * User: Y2DaZ
 * Date: 19/07/14
 * Time: 17:04
 */
session_start();

require_once("dbAccess.php");
require_once("formValidation.php");

//Setting Language
if(!isset($_COOKIE['language']))
{
    setcookie('language', '0'); //where 0 is English and 1 is Sinhala
}

if (isset($_POST["submit"])) //USer has clicked the submit button
{
    //validate username and password

    if ((isFilled($_POST["email"])) && (isFilled($_POST["password"])))
    {
        if (login($_POST["email"],$_POST["password"]))
        {
            header("Location: Master.php");
            die();
        }
    }
    else
    {

    }

}

/*CHANGE THIS ACCORDING TO WHAT HEIGHT YOU WANT*/
$fullPageHeight = 450;

$footerTop = $fullPageHeight + 50;
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

    <script src="common.js"></script>

    <style type=text/css>

        /*DO NOT EDIT THE FOLLOWING*/

        /*Dynamic Styles*/
<!--        #main{ height:--><?php //echo "$fullPageHeight" . "px";?><!-- }-->
<!--        #footer{ top:--><?php //echo "$footerTop" . "px";?><!-- }-->
        /*Static Styles*/
        /*INSERT ALL YOUR CSS HERE*/
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        body {
            background-color: #2D2D2D;
            background-repeat: repeat;
        }
        #main {
            width:300px;
            height:400px;
            /*margin: 0px auto 0px auto;*/
            /*clear: both;*/
            left:800px;
            top:100px;
            background-color: #ffffff;
            border: 2px solid #f0f0f0;
            /*border-radius: 0px 0px 20px 20px;*/
            position:relative;
            display: block;
        }
        #content{
            position: relative;
            top:60px;
            left: 40px;
        }
        #title{
            position: relative;
            top: 40px;
        }
        #title > p{
            font-weight: 600;
            text-align: center;
        }
        #content > input {
            width: 220px;
        }
        #rightBody{
            position:absolute;
            top:0px;
            left:0px;
            z-index: -1;
            width:100%;
            height:100%;
            background-color: #003448;
        }
        #footer {
            position:absolute;
            top: 75%;
            left:0px;
            z-index: -1;
            width:100%;
            height:25%;
            background-color: #2d2d2d;
        }
        #language{
            position: relative;
            z-index: 7;
            margin: 0px auto 0px auto;
            top:100px;
            right:10px;
            width:100px;
            height: 30px;
            text-align: center;
        }
        #language ul{
            padding: 0;
            margin: 0;
            font-size: 12px;
            color: #cc7f00;
        }
        #language ul a{
            font-size: 12px;
            color: #cc7f00;
            padding: 0;
        }
        #description {
            position: absolute;
            color:#cc7f00;
            top:120px;
            left:150px;
            max-width: 500px;
        }
        #description h1{
            font-weight: 600;
        }
        #description p{
            font-weight: 600;
            font-size: 14px;
            color: #b3b3b3;
            text-align: justify;
        }

    </style>
</head>
<?php //Get language and make changes

if($_COOKIE["language"] == "0")
{
}
else
{
}
?>
<body>

<div id="main">

    <div id="title">
        <p> Sign in </p>

    </div>

    <div id="content">

        <form id="login" method="post">
            <p>Email</p>

            <input name="email" type="text" value=""/>

            <p>Password</p>
            <input name="password" type="password" value=""/>

            <br/><br/>
            <input id="submit" name="submit" type="submit" value="Sign in"/>
        </form>
    </div>

    <div id="language">
        <ul><a href="#" onClick="setCookie('language','1')">සිංහල</a> | <a href="#" onClick="setCookie('language','0')">English</a></ul>
    </div>
</div>


<!-- DO NOT EDIT FOLLOWING -->
<div id="rightBody">

</div>

<div id="footer">

</div>

<div id="description">
    <h1>
        Mana Staff Management System
    </h1>

    <p>The Mana System was developed for D.S. Senanayake College Colombo to manage school information by Students at SLIIT.
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue ligula, cursus et massa vel, blandit hendrerit nisi.
        Vivamus elementum consectetur risus in cursus.</p>
    <p>
        Integer et enim eget eros iaculis rutrum. Nunc ullamcorper risus et felis blandit accumsan.
        Donec scelerisque odio eget leo congue facilisis. Nunc lacinia, magna vel eleifend ornare, mauris elit congue erat,
        sit amet placerat dolor odio eu felis. Cras ornare malesuada adipiscing. Cras tincidunt pulvinar eleifend.
        Aenean dictum enim nec velit laoreet bibendum.
    </p>


</div>



</body>
</html>