<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 9/17/14
 * Time: 9:11 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
define('THISPATHFRONT', 'http://'.$_SERVER['HTTP_HOST']);

require_once("../formValidation.php");
require_once("../dbAccess.php");
require_once(THISROOT . "/common.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Report</title>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?php echo THISPATHFRONT ?>/Styles/fonts.css" rel='stylesheet' type='text/css'>

    <script src="<?php echo THISPATHFRONT ?>/jquery-1.11.1.min.js"></script>
    <script src="<?php echo THISPATHFRONT ?>/jquery-extras.min.js"></script>
    <script src="<?php echo THISPATHFRONT ?>/common.js"></script>

    <script>
        function printPage(){
            console.log("printing");
            window.print();
            console.log("printing");
        }
    </script>

    <style>
        *{
            font-family: 'Open Sans', sans-serif;
            font-weight: 400;
        }
        #general{
            /*width:50%;*/
            height:auto;
            text-align: center;
        }

        #flag {
            position: relative;
            top: -120px;
            left:450px;
            /*border: 5pxxx solid black;*/
            width: 120px;
            height: 120px;
        }

        #TransactionReport{
            position: relative;
            left:25px;
            width:1000px;
            border:1px solid #000000;
            border-collapse: collapse;
            text-align: center;
        }
        #TransactionReport .alt{
            background-color: #ffffff;
        }
        #TransactionReport td{
            padding: 5px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        #TransactionReport #date{
            width:200px;
        }

        #TransactionReport #type{
            width:200px;
        }

        #TransactionReport #amount{
            width:200px;
        }

        #TransactionReport #Description{
            width:300px;
        }


        #TransactionReport th{
            color:black;
            /*background-color: #005e77;*/
            height:30px;
            padding:5px;
            border: 1px solid black;
            border-collapse: collapse;
        }

        input.button1 {
            position:relative;
            font-weight:bold;
            font-size:15px;
            width: 500px;

        }

        h2{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 105pt;

        }

        h1{
            position: relative;
            font-size: 12pt;
            text-align: center;
            left: 0pt;
            top: 105pt;

        }
        h3{
            position: relative;
            font-size: 15pt;
            text-align: center;
            left:0pt;
            top: 100pt;
        }




    </style>
</head>

    <body>

    <h1>D.S.Senanayake College</h1>
    <h2>Gregory's Road, Colombo 07, Sri Lanka.</h2>
    <h3>Transaction Report</h3>

        <div class="" id="general" style="">



            <form method="get">
                <table id="info">
                    <tr>
                    <th>
                        <img id="flag" src="/images/abc.jpg"/>


                </table>
            </form>

            <table id="TransactionReport">

                <tr>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Description</th>
                </tr>

                <?php



                $result = getTransactionReport($_GET["id"]);
                $i = 1;

                if(isFilled($result))
                {
                    foreach($result as $row){

                        $top = "<form method='post' action='TransactionReport.php'>";
                        $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                        echo $top;
                        echo "<td>$row[0]</td>";

                        if($row[1] == 0){
                            $TransactionType = "Income";
                        }
                        else{
                            $TransactionType = "Expenditure";
                        }
                        echo "<td>$TransactionType</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";

                        echo "</td></tr></form>";

                    }
                }
                else
                {
                    echo "<tr><td colspan='4'>No Data Found</td></tr>";
                }


                ?>



            </table>

        </div>

        <br>

        &nbsp;  &nbsp;&nbsp;&nbsp;
        <span id="totalreceived">Total Recieved =</span>
        &nbsp;
        <span id="totalReceived"> <?php echo getIncomes($_GET["id"])?></span>

        <br>


        &nbsp;  &nbsp;&nbsp;&nbsp;
        <span id="totalspent">Total Spent = </span>
        &nbsp;
        <span id="totalSpent"> <?php echo getExpenses($_GET["id"])?></span>

        <button id="PrintButton" onclick="printPage();" hidden="hidden" >Print Report</button>

    </body>
</html>
