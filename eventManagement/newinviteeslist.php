<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 8/16/14
 * Time: 9:39 AM
 */



define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();

$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";


?>
<html>
<head>
    <style type=text/css>
        #main{ height:<?php echo "$fullPageHeight" . "px";?> }
        #footer{ top:<?php echo "$footerTop" . "px";?> }

        #general{
            /*width:50%;*/
            height:auto;
            text-align: center;
        }
        #ListTable{
            position: relative;
            left:25px;
            width:750px;
            border:1px solid #005e77;
            border-collapse: collapse;
        }
        #ListTable td{
            padding: 5px;
        }
        #ListTable #Studentid{
            width:200px;
        }
        #eventTable #parentname{
            width:300px;
        }
        #ListTable #contactno{
            width:200px;
        }
        #ListTable #address{
            width:200px;
        }
        #ListTable th{
            color:white;
            background-color: #005e77;
            height:30px;
            padding:5px;
        }



    </style>
</head>


<body>
<div class="" id="general" style="">

    <h1>Invitees List</h1>
    <table id="ListTable">
        <tr>
        <th id="Studentid">Student ID</th>
        <th id="parentname">Parent Name</th>
        <th id="contactno">Contact No</th>
        <th id="address">Mailing Address</th>


        <!--<span class="table" style="width:570px;height:auto">-->
        </tr>

        <tr>
            <td>1001</td>
            <td>Vimukthi Joseph</td>
            <td>0712234586</td>
            <td>Makola, Kiribathgoda</td>

        </tr>
        <tr>
            <td>1002</td>
            <td>Dulip Rathnayake</td>
            <td>0712578798</td>
            <td>Sarasawiya , Kottawa</td>
        </tr>
        <tr>
            <td>1003</td>
            <td>Isuru Jayakodi</td>
            <td>0712376435</td>
            <td>120 route, kasbawa</td>
        </tr>
        <tr>
            <td>1005</td>
            <td>Madhushan De Sliva</td>
            <td>0712278586</td>
            <td>Highway, Negombo</td>
        </tr>

    </table>

    <input type="button" name="button" id="button4" value="Add Invitee" /></center>
</div>

</body>
</html>

<?php
//Change these to what you want
$fullPageHeight = 900;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Template";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>
