<?php
/**
 * Created by PhpStorm.
 * User: Manoj
 * Date: 9/17/14
 * Time: 9:11 AM
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
include(THISROOT . "/dbAccess.php");
ob_start();
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



    </style>
</head>

    <body>
        <div class="" id="general" style="">

            <h1>Transaction Report</h1>
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

    </body>
</html>
