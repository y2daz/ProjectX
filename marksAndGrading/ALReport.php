<?php
/**
 * Created by PhpStorm.
 * User: DR1215
 * Date: 9/26/14
 * Time: 7:02 PM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);
include(THISROOT . "/dbAccess.php");
include(THISROOT . "/common.php");
ob_start();

if(isset($_GET["indexNo"]))
{
    $indexNo = $_GET["indexNo"];
}
else
{
    $indexNo = "";
}

if(isset($_GET["AdmissionNo"]))
{
    $AdmissionNo = $_GET["AdmissionNo"];
}
else
{
    $AdmissionNo = "";
}

if(isset($_GET["Name"]))
{
    $Name = $_GET["Name"];
}
else
{
    $Name = "";
}

if(isset($_GET["Year"]))
{
    $Year = $_GET["Year"];
}
else
{
    $Year = "";
}

//echo $indexNo;
//echo $AdmissionNo;

?>



<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo PATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo PATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo PATHFRONT ?>/common.js"></script>


<!--    <script src="timetable.js"></script>-->
    <style type="text/css">
        #flag {
            position: relative;
            top: -70px;
            left:205pt;
            /*border: 5px solid black;*/
            width: 120px;
            height: 120px;
        }

        #sch{
            position:relative;
            font-size: 24pt;
            text-align: center;
            left:10pt;
            top: 170pt;

        }

        #hd{
            position: relative;
            font-size: 14pt;
            text-align: center;
            bottom: -50px;
            top: -60pt;
            left: 10pt;



        }

        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 170pt;

        }

        .insert
        {
            position: absolute;
            left: 220px;
            top: 350px;
            width: 300px;
            text-align: justify;



        }

        .insert2
        {
            position: absolute;
            left: 220px;
            top: 500px;
            width: 240px;


        }
        .insert td{
            padding: 2pt;
        }

        .insert2 td{
            padding: 2pt;
        }




        .insert2 th{
            text-align: left;
        }


        .text{
            position: absolute;
            top: 770px;
            text-align: justify;
            font-size: 12pt;
            right: 6px;
        }

        .text1{
            position: absolute;
            top: 900px;
            left: 50px;

        }

        .text2{
            position: absolute;
            top: 900px;
            left: 550px;

        }
    </style>

    
</head>
<body>

<h1 id="sch">D.S.Senanayake College</h1>
<h2>Gregory's Road, Colombo 07, Sri Lanka.</h2>
<h1 id="hd">THE GENERAL CERTIFICATE OF EDUCATION</h1>
<h1 id="hd">ADVANCED LEVEL</h1>

<!--    <h2>--><?php //echo getLanguage("chooseOption", $lang) ?><!--</h2>-->
<form method="get">
    <table id="info">
        <tr>
            <th>
                <img id="flag" src="/images/abc.jpg"/>


    </table>
</form>

<body>



<form method="get">

    <table class="insert">
        <th colspan="3">
            </th>
        <tr>
            <td>Index Number:</td>
            <td style="text-align: left"><?php echo $indexNo ?></td>
        </tr>
        <tr>
            <td>Admission Number:</td>
            <td style="text-align: left"><?php echo $AdmissionNo ?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td style="text-align: left"><?php echo $Name ?></td>
        </tr>
        <tr>
            <td>Year:</td>
            <td style="text-align: left"><?php echo $Year ?></td>
        </tr>




    </table>

    <table class="insert2">


        <th>Subject</th>
        <th colspan="2">Grade</th>

        <?php
            $result = searchALMarks($indexNo);

        if(isFilled($result))
        {
            $i = 1;

            foreach($result as $row){
//                        $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";
                $IndexNo = $row[0];
                $AdmissionNo = $row[1];
                $name=$row[2];
                $Year = $row[3];
                // echo "<td><input class='edit' type='button' name='$row[15]' value='Edit' /></td>";

                echo "<tr>";
                echo "<td id='Subject1'> $row[4]</td>";
                echo "<td id='S1Grade'>$row[7]</td>";
                echo "</tr><tr>";
                echo "<td id='Subject2'>$row[5]</td>";
                echo "<td id='S2Grade'>$row[8]</td>";
                echo "</tr><tr>";
                echo  "<td id='Subject3'>$row[6]</td>";
                echo  "<td id='S3Grade'>$row[9]</td>";
                echo "</tr><tr>";
                echo  "<td>General English Test</td>";
                echo  "<td id='GenGrade'>$row[10]</td>";
                echo "</tr><tr>";
                echo  "<td>Common General Test</td>";
                echo  "<td id='CommonGeneralTest'>$row[11]</td>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo "</tr><tr>";
                echo  "<td>Z-Score</td>";
                echo  "<td id='Zscore'>" . round( $row[12] , 3). "</td>";
                echo "</tr><tr>";

                echo  "<td>Island Rank</td>";
                echo  "<td id='IslandRank'>$row[13]</td>";
                echo "</tr><tr>";
                echo  "<td>District Rank</td>";
                echo  "<td id='DistrictRank'>$row[14]</td>";
                //echo "<td><input name=\"Edit" . "\" type=\"submit\" value=\"Edit\"  /> </td> ";
                echo "</tr>";



            }
            }
            else
            {
                sendNotification("Error");
            }


        ?>





    </table>
    <table class="text">

        <td> <?php echo "This is to certify that above student who sat the above examination as a candidate from this college was successful in the above subjects according to the schedule of results issued by Commissioner of Examinations. "?></td>

    </table>

    <table class="text1">

        <td> <?php echo "Date"?></td>


    </table>

    <table class="text2">
        <td><?php echo"Principal" ?></td>
    </table>











</form>



</body>


</html>


