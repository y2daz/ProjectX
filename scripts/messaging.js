/**
 * Created by yazdaan on 16/12/14.
 */
$(document).ready( function(){
//    $('#messaging > li > a').click(function(){
//        if ($(this).attr('class') != 'active'){
//            $('#messaging li ul').slideUp(150);
//            $(this).next().slideToggle(150);
//            $('#messaging li a').removeClass('active');
//            $(this).addClass('active');
//        }
//        else{
//            $('#messaging li ul').slideUp(150);
//            $('#messaging li a').removeClass('active');
//        }
//    });
    var checkMessages;
    var i = 1;

    $( document ).keypress(function(e) {
//        console.log( parseInt(e.which) );
        if( parseInt(e.which) == 92 || parseInt(e.which) == 43){
            $("#messageButton").click();
        }
    });

    $("#messageButton").on("click", function(){
        this.classList.toggle("active");

        if ($(this).hasClass('active')){
            $('#messaging').stop().animate( {opacity:'0'}, 150 );
            clearInterval( checkMessages );
        }
        else
        {
            $('#messaging').stop().animate({opacity: '1'}, 150);
            updateMessages();
            checkMessages = setInterval( updateMessages, 5000 );
        }
    });

    $("#messagingReceived").on( "click", ".removeButton", function(){
//        console.log( "pears" );
        var idArr = $(this).attr('name').split( "_" );
        var id = idArr[1];

        var removeMessageId = "#textMessage_" + id;

        $( removeMessageId).slideUp( 150 );

        readMessage( id );
//        console.log( id );
    });



    function updateMessages(){
//        console.log( "refessh number " + i++);
        getSendingMessages();
        getReceivedMessages();
    }

    function getSendingMessages(){
        var postOb = { sending : "yesPlease" };
        $.post( "../requests/messaging.php", postOb, function( data, status ){
            $('#messagingSending').html( data );
        });
    }

    function getReceivedMessages(){
        var postOb = { received : "yesPlease" };
        $.post( "../requests/messaging.php", postOb, function( data, status ){
            $('#messagingReceived').html( data );
        });
    }

    function readMessage( id ){
        var postOb = { readMessage : id };
        $.post( "../requests/messaging.php", postOb, function( data, status ){
            $.noop();
        });
    }
//    $('.test2').on('click', function( e ){
//        console.log("clickety");
//        e.preventDefault();
//        $(this).slideUp(150);
//    });

} );