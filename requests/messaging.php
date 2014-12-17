<?php
/**
 * Created by PhpStorm.
 * User: yazdaan
 * Date: 16/12/14
 * Time: 22:57
 */
require_once("../dbAccess.php");
require_once("../common.php");

if( isset( $_POST["readMessage"] ) )
{
    markMessageAsRead( $_POST["readMessage"] );
}

if( isset( $_POST["received"] ))
{
    $receivedSMS = getAllReceivedSMS();

    if( isset($receivedSMS) )
    {
        echo "<li>\n";
        $box = "<a class='message'>Messages received</a>\n";
        $box .= "<ul>\n";
        foreach( $receivedSMS as $message )
        {
            $staff = getStaffNameFromPhoneNumber( $message[1] );
            $number = intval( $staff[0] ) == 0 ? "" : " - " . $staff[0];
            $box .= "<li id='textMessage_" . $message[0] . "' >\n\t<a><span class='boldText'>" . $staff[1] . $number . "</span><br /> " . $message[2] . "</a>\n ";
            $box .= "\t<input type='button' class='removeButton smallButton' value='Remove' name='btnReadMessage_" . $message[0] . "' /> ";
            $box .= "</li>\n";
        }
        $box .= "</ul>\n";
        echo $box;
        echo "</li>\n";
    }
    else
    {
        echo "<li>\n";
        echo "<a class='message'>No new messages received.</a>";
        echo "</li>\n";
    }
}

if( isset( $_POST["sending"] ))
{
    $sendingSMS = getAllSendingSMS();

    if( isset($sendingSMS) )
    {
        echo "<li>\n";
        $box = "<a>Messages being sent</a>\n";
        $box .= "<ul>\n";
        foreach( $sendingSMS as $message )
        {
            $staff = getStaffNameFromPhoneNumber( $message[1] );
            $number = intval( $staff[0] ) == 0 ? "" : " - " . $staff[0];
            $box .= "<li ><a><span class='boldText'>" . $staff[1] . $number . "</span><br /> " . $message[2] . "</a></li>\n";
        }
        $box .= "</ul>\n";
        echo $box;
        echo "</li>\n";
    }
    else
    {
        echo "<li>\n";
        echo "<a class='message'>No messages being sent.</a>";
        echo "</li>\n";
    }
}
