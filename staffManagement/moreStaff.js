$(document).ready(function(){

    console.log("I came");

    $("input[name='moreApplyForLeave']").on("click", function(){
        console.log("Got Here");
        window.location.assign( "../leaveManagement/applyForLeave.php?StaffID=" + $(this).attr('id') );
    });
    $("input[name='moreViewTimetable']").on("click", function(){
        console.log("Got THere");
        window.location.assign( "../TimeTable/timetable.php?staffID=" + $(this).attr('id') + "&getTimetable=Get+Timetable" );
    });
    $("input[name='moreLeaveReport']").on("click", function(){
        console.log("Got THere");
        window.location.assign( "../leaveManagement/generateLeaveReport.php?staffId=" + $(this).attr('id') );
    });
    $("input[name='moreStaffReport']").on("click", function(){
        console.log("Got THere");
        window.location.assign( "../staffManagement/staffmemberreport.php?id=" + $(this).attr('id') );
    });
    $("input[name='moreDelete']").on("click", function(){
        $.prompt.goToState('stateDelete', false);
//        requestConfirmation('Are you sure you want to delete this staff member?', 'Delete Confirmation', 'Delete', $(this).attr('id') );
    });

    $("input[name='jTxtStaffID']").on("input propertychange paste", function(){
        var staffId = $(this).val();

        var postOb = { staffId : staffId };
        $.post( "../requests/getStaffName.php", postOb, function( data, status ){
            $('#jTxtStaffName').html( data );
        });
    });

});