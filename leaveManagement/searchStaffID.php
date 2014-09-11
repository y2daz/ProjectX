<?php
define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
require_once(THISROOT . "/common.php");
include(THISROOT . "/dbAccess.php");

ob_start();

if(isset($_POST["searchStaff"]))
{
    $staffName = $_POST["staffname"];
    $displaytable = "block";

}
else
{
    $staffName = "";
    $displaytable = "none";
}

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }


            h1
            {
                text-align: center;
            }

            .insert
            {
                position:absolute;
                left:245px;
                top: 100px;
            }

            .viewTable
            {
                position:absolute;
                left: 210px;
                top: 250px;
                display: <?php echo $displaytable ?>;
            }

            .viewTable th
            {
                width: 100px;
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
            }

            .viewTable td
            {
                padding:10px;
            }

            .viewTable input.button
            {
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }

            .insert th
            {
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
            }

            .insert td
            {
                padding:10px;
            }

            .insert input.button{
                position:relative;
                font-weight:bold;
                font-size:15px;
                Right:-335px;
                top:20px;
            }



        </style>
    </head>
    <body>

        <h1>Search Staff ID</h1>

        <form method="post" class="insert">

            <table>

                <tr>
                    <td>Staff Name: </td>
                    <td><input type="text" name="staffname" value=""></td>
                </tr>

                <tr>
                    <td></td>
                    <td style="text-align: center"><input type="submit" name="searchStaff" value="Search Staff ID"</td>
                </tr>


            </table>

        </form>

        <form class="viewTable" method="get">
            <table>
                <tr>
                    <th>Staff ID</th>
                    <th>Name</th>
                    <th></th>
                </tr>

                <?php

                if($staffName == "")
                {
                    echo "<tr><td colspan='6'>Enter Staff Name to Search for Staff ID.</td></tr>";
                }
                else
                {
                    $result = SearchStaffbyname($staffName);
                    $i = 1;

                    if(!isFilled($result))
                    {
                        echo "<tr><td colspan='6'>No records found.</td></tr>";
                    }

                    if (isFilled($result))
                    {
                        foreach($result as $row)
                        {
                            $top = ($i++ % 2 == 0)? "<tr class=\"alt\">":"<tr>";

                            echo $top;
                            echo "<td>$row[0]</td>";
                            echo "<td>$row[1]</td>";
                            echo "<td><input name=\"ApplyforLeave" . "\" type=\"button\" value=\"Apply for Leave\" onclick=\"location.href='../leaveManagement/applyForLeave.php?StaffID=" . $row[0] . "'\" /> </td> ";
                            echo "</td></tr>";
                        }
                    }
                }
                ?>

            </table>

        </form>



    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 600;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Search Staff ID";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>