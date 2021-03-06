<?php
/**
 * Created by PhpStorm.
 * User: Yazdaan
 * Date: 6/8/14
 *
 * THIS IS THE NEW TEMPLATE
 *
 * ONLY EDIT WHERE MENTIONED
 *
 * Page title, and height are php variables you have to edit at the bottom.
 *
 */

define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
require_once(THISROOT . "/dbAccess.php");
require_once(THISROOT . "/formValidation.php");
require_once(THISROOT . "/common.php");
ob_start();

/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Leave Approval') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */

?>
    <html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            .insert{
                position: relative;
                left:40px;
            }
            .insert th{
                color:white;
                background-color: #005e77;
                height:30px;
                padding:5px;
                text-align: left;
            }
            .insert td{
                padding:10px;
            }
            input[name='Submit']{
                position: relative;
                left: 220px;
            }
            .btnDateSet{
                position: relative;
                top: -10px;
            }
        </style>
        <script type="text/javascript">
            $(document).ready( function(){

                $("#setStartDate").on( "click", function(){
                    $("#startDate").val( getDayOneDate() );
                });

                $("#setEndDate").on( "click", function(){
                    $("#endDate").val( getDayFinalate() );
                });

                function getDayOneDate(){
                    var yyyy = '<?php echo getConfigData( "currentYear" ); ?>';
                    var mm = '01';
                    var dd = '01';

                    var day = yyyy + '-' + mm + '-' + dd;

                    return day;
                }
                function getDayFinalate(){
                    var yyyy = '<?php echo getConfigData( "currentYear" ); ?>';
                    var mm = '12';
                    var dd = '31';

                    var day = yyyy + '-' + mm + '-' + dd;

                    return day;
                }

            });
        </script>
    </head>
    <body>

        <h1 align="center"> Staff Leave Report </h1>

        <form method="get" action="staffLeaveReport.php">

            <table class="insert">
                <tr>
                    <td> <label>From </label> </td>
                    <td> <input type="date" name="startDate" id="startDate" required/></td>
                    <td> <label>To </label> </td>
                    <td> <input type="date" name="endDate" id="endDate" required/> </td>
                </tr>
                <tr>
                    <td> &nbsp; </td>
                    <td><input type="button" class="btnDateSet" name="setStartDate" id="setStartDate" value="Jan 1st <?php echo getConfigData("currentYear")?>" /></td>
                    <td> &nbsp; </td>
                    <td><input type="button" class="btnDateSet" name="setEndDate" id="setEndDate" value="Dec 31st <?php echo getConfigData("currentYear")?>" /></td>
                </tr>
            </table>
            <input type="submit"  name="Submit" value="Generate Report" >
        </form>
    </body>
    </html>
<?php
//Change these to what you want
$fullPageHeight = 800;
$footerTop = $fullPageHeight + 100;
$pageTitle= "Leave Report";
//Only change above

$pageContent = ob_get_contents();
ob_end_clean();
require_once(THISROOT . "/Master.php");
?>