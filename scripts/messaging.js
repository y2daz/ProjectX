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

    $("#messageButton").on("click", function(){
        this.classList.toggle("active");

        if ($(this).hasClass('active')){
            $('#messaging').stop().animate({right:'-105%'}, 150);
        }
        else
        {
            $('#messaging').stop().animate({right: '0'}, 150);
            getSendingMessages();
        }
    });

    function getSendingMessages(){
        var postOb = { sending : "yesPlease" };
        $.post( "../requests/messaging.php", postOb, function( data, status ){
            $("#messaging").html( data );
        });
    }
//    $('.test2').on('click', function( e ){
//        console.log("clickety");
//        e.preventDefault();
//        $(this).slideUp(150);
//    });

} );