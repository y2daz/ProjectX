$(document).ready(function(){

    $("input[name='moreApplyForLeave']").on("click", function(){
        window.location.assign( "../leaveManagement/applyForLeave.php?StaffID=" + $(this).attr('id') );
    });
    $("input[name='moreViewTimetable']").on("click", function(){
        window.location.assign( "../TimeTable/timetable.php?staffID=" + $(this).attr('id') + "&getTimetable=Get+Timetable" );
    });
    $("input[name='moreLeaveReport']").on("click", function(){
        window.location.assign( "../leaveManagement/generateLeaveReport.php?staffId=" + $(this).attr('id') );
    });
    $("input[name='moreStaffReport']").on("click", function(){
        window.location.assign( "../staffManagement/staffmemberreport.php?id=" + $(this).attr('id') );
    });
    $("input[name='moreDelete']").on("click", function(){
        $.prompt.goToState('stateDelete', false);
//        requestConfirmation('Are you sure you want to delete this staff member?', 'Delete Confirmation', 'Delete', $(this).attr('id') );
    });
    $("input[name='moreSendMessage']").on("click", function(){
        $.prompt.goToState('stateSendMessage', false);
//        requestConfirmation('Are you sure you want to delete this staff member?', 'Delete Confirmation', 'Delete', $(this).attr('id') );
    });

    $("input[name='jTxtStaffID']").on("input propertychange paste", function(){
        var staffId = $(this).val();

        var postOb = { staffId : staffId };
        $.post( "../requests/getStaffName.php", postOb, function( data, status ){
            $('#jTxtStaffName').html( data );
        });
    });


    var noOfCharsAllowed = 160;

    $("textarea[name='jTxtMessageArea']").on("input propertychange paste", function(){
//        console.log("got here");
        var data = $(this).val();

//        console.log(data + " is " + data.length );

        if( data.length > noOfCharsAllowed ){
            data = data.substring( 0, noOfCharsAllowed );
            $(this).val( data );
        }

        data = $(this).val();
        var countMsg = ( +noOfCharsAllowed - data.length ) + " characters left";
        if( data.length == (noOfCharsAllowed - 1) ){
            countMsg = "1 character left";
        }

        $("#charCount").html( countMsg );
    });

});