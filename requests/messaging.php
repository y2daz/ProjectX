<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 16/12/14
 * Time: 22:57
 */
require_once("../dbAccess.php");
require_once("../common.php");

if( isset( $_POST["received"] ))
{
        echo "<li>\n";
        echo "<a>No new messages have been received.</a>";
        echo "</li>\n";
}

if( isset( $_POST["sending"] ))
{
    $pendingSMS = getAllSendingSMS();

    if( isset($pendingSMS) )
    {
        echo "<li>\n";
        $box = "<a>Messages being sent</a>\n";
        $box .= "<ul>\n";
        foreach( $pendingSMS as $message )
        {
            $box .= "<li ><a><span class='boldText'>" . getStaffNameFromPhoneNumber( $message[1] ) . "</span><br /> " . $message[2] . "</a></li>\n";
        }
        $box .= "</ul>\n";
        echo $box;
        echo "</li>\n";
    }
    else
    {
        echo "<li>\n";
        echo "<a>There are no messages being sent.</a>";
        echo "</li>\n";
    }
}
