<?php
/**
 * Created by PhpStorm.
 * User: ISURU
 * Date: 7/26/14
 * Time: 3:24 PM
 */
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    define('THISROOT', $_SERVER['DOCUMENT_ROOT']);
    include(THISROOT . "/dbAccess.php");
    require_once(THISROOT . "/common.php");
    require_once(THISROOT . "/formValidation.php");
    error_reporting(E_ERROR | E_PARSE);
    ob_start();


/**
 * Access Rights Management
 */
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$user = Role::getRolePerms( $_SESSION["accessLevel"] );
if( !$user->hasPerm('Attendance System') ){
    header("Location: ../Menu.php?error=403");;
}
/**
 * Access Rights Management
 */

    $gradeandclass = "Grade and Class";
    $week = "Week";
    $markAttendance ="Mark Attendance";

    if (isset($_POST["submit"])) //User has clicked the submit button
    {

    }

if (isset($_GET["Grade"])){

}

$todayDate = time();
$todayDate = strftime("%Y-%m-%d", $todayDate);

if( isset( $_GET["dtDate"] ) ){
    $markedDate = $_GET["dtDate"];
}
else{
    $markedDate = $todayDate;
}


?>
<html>
    <head>
        <style type=text/css>
            #main{ height:<?php echo "$fullPageHeight" . "px";?> }
            #footer{ top:<?php echo "$footerTop" . "px";?> }

            h1{
                text-align: center;
            }
            #markDate{
                position:relative;
                left:30px;
<!--                display: --><?php //echo $classDateDisplay?><!--;-->
            }
            #markDate .smallButton{
                width: 100px;
            }
            #tblSearch{
                position: relative;
                left: 240px;;
            }
            #tblSearch input{
                padding: 4px;
            }
            #attendance{
                position: relative;
                top:0px;
                left:30px;
                border-collapse: collapse;
                /*min-width: 750px;*/
            }
            #attendance #tHeader th{
                color:white;
                background-color: #005e77;
                padding: 10px 20px;
            }
            #attendance td{
                padding: 5px;
            }
            #attendance td.disabled{
                background-color: #ececec;
            }
        </style>
        <script>
            $(document).ready( function(){


                $("#attendance").on('click', '.btnMark', function(){
                    var thisId = $(this).attr('id');
                    var staffId = thisId.substr(4);

                    var markedDate = $('input[name="txtMarkedDate"]').val();

                    markPresent( staffId, markedDate );
                });

                $("#attendance").on('click', '.btnUndo', function(){
                    var thisId = $(this).attr('id');
                    var staffId = thisId.substr(4);

                    var markedDate = $('input[name="txtMarkedDate"]').val();

                    undoMarkPresent( staffId, markedDate );
                });

                $("input[name='txtSearch']").on('input propertychange paste', function(){
                        var key =  $(this).val();

                        if( key.length >= 1 ){
                            $('.staffRow').hide();
                            $('#row_' + key).show();
                        }
                        else{
                            $('.staffRow').show();
                        }
                    })
                    .keydown( function(e){
                        if( e.which == 13 ){
                            var key =  $(this).val();

                            $('#row_' + key).children('.markedButtonContainer').children().click();
                        }
                    })
                    .keyup( function(e){
                        if( e.which == 109 ){
                            $(this).val("");
                        }
                    })

            });
        </script>
    </head>
    <body>

        <h1>Mark Attendance</h1>

        <form method="get">
            <table id="markDate">
                <tr><td>Date</td>
                    <td><input type="date" name="dtDate" max="<?php echo $todayDate ?>" value="<?php echo $markedDate ?>" required></td>
                <td> <input class="smallButton" type="submit" name="sbtDate" value="Mark" /> </td></tr>
            </table>
        </form>
        <br />
        <br />
        <table id="tblSearch">
            <tr><td>Search</td>
                <td> <input type="text" name="txtSearch" value="" class="right"> </td>
        </table>

        <br />
        <br />

        <table id="attendance">
            <tr id="tHeader">
                <th>Signature No</th><th>Name with Initials</th><th>Medium</th><th>&nbsp;</th>
            </tr>

            <?php
            $i = 1;

            $result = getStaffMembersToMarkAttendance( $markedDate );

//            $result = null;

            if( isset( $result ) ){
                $mediumArr =  array( "", "S", "T", "S" );

                foreach( $result as $row){
                    $i++;
                    echo "<tr id='row_{$row[1]}' class='staffRow'><td class='right'>";
                    echo $row[1];
                    echo "</td> <td class='left'> " . $row[2];
                    echo "</td> <td class='center'> " . $mediumArr[ $row[3] ] ;
                    echo "</td> <td class='center markedButtonContainer' id='markButtonContainer_{$row[0]}''>";

                    if( isset( $row[4] ) ){
                        echo "Marked &nbsp;&nbsp;<input type='button' id='und_{$row[0]}' class='btnUndo smallButton' value='Undo' />  ";
                    }
                    else{
                        echo "<input type='button' id='btn_{$row[0]}' class='btnMark smallButton' value='Mark Present' />  ";
                    }

                    echo "</td></tr>";
                    echo ($i++ % 5 == 0 ? "<tr class='blank staffRow'>\n<td colspan='6'>&nbsp;</td>\n\t\t</tr>" : "");
                }
            }
            else{
            ?>
                <tr><td colspan="4" class="center">There are no records to show.</td></tr>
            <?php
            }

            ?>

        </table>
        <br />
        <input name="txtMarkedDate" type="text" hidden="hidden" value="<?php echo $markedDate ?>" />
    </body>
</html>
<?php
    //Assign all Page Specific variables

    if( $i > 10 ){
        $fullPageHeight = 250 + ($i * 23);
    }
    else{
        $fullPageHeight = 600;
    }
    $footerTop = $fullPageHeight + 100;

    $pageContent = ob_get_contents();
    ob_end_clean();
    $pageTitle= "Mark Attendance";
    //Apply the template
    include("../Master.php");
?>

