/**
 * Created by Yazdaan on 06/08/14.
 */

$(document).ready(function() {
    window.open    = function(){};

    if (false) {
        window.ontouchstart = function(){};
    }

    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (w <= 1420) //1120 + size of nav
    {
        moveNav();
    }
    $( document ).keypress(function(e) {
        if (w <= 1280){
            if( parseInt(e.which) == 96 || parseInt(e.which) == 167 ){
                $("#menuButton").click();
            }
        }
    });


    /*
     Copyright (c) 2014 by Pramod Kumar (http://codepen.io/Pro/pen/hwfen)

     Permission is hereby granted, free of charge, to any person obtaining a copy
     of this software and associated documentation files (the "Software"), to deal
     in the Software without restriction, including without limitation the rights
     to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
     copies of the Software, and to permit persons to whom the Software is
     furnished to do so, subject to the following conditions:

     The above copyright notice and this permission notice shall be included in
     all copies or substantial portions of the Software.

     THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
     */
    $('#menuButton').click(function(){
        this.classList.toggle("active");

        if ($(this).hasClass('active')){
            $('#nav').stop().animate({left:'0'}, 150);
        }
        else
        {
            $('#nav').stop().animate({left: '-105%'}, 150);
        }
    });

    $("#dsLogo").on("click", function(){
        refreshPage();
    });

    $('#PrintButton').on( 'click', function(){
        $("#PrintButton").attr( "hidden", "hidden" ) ;

        var print = setInterval( function(){
            window.print();
            clearInterval( print );
        }, 300 );
    });


});

function setCookie(cName,value) //Sets a cookie.
{
    document.cookie = cName + "=" + value /*+ "; path=/"*/;
    refreshPage();
}

function getCookie(cname) {
    var name = cname + "=";
    var cookieArr= document.cookie.split(';');
    alert (cookieArr.toString());

    for(var i=0; i < cookieArr.length; i++) {
        var current = cookieArr[i];
        while (current.charAt(0)==' ')
            current = current.substring(1);
        if (current.indexOf(name) != -1)
            return current.substring(name.length,current.length);
    }
    return "";
}


function refreshPage() //Reloads the page from the server
{
    location.reload(true);
}

function makeGrayText(element, text)
{
    var curText = element.value;

    if ((curText == text) || (curText == ""))
    {
        $(element).addClass('grayText');
        $(element).val(text);
        $(element).attr("type", "text");
    }
    else
    {
        $(element).removeClass('grayText');
        $(element).attr("type", "password");
    }
}

function remGrayText(element, text)
{
    var curText = element.value;

    if (curText == text)
    {
        $(element).removeClass('grayText');
        $(element).val("");
        $(element).attr("type", "password");
    }
}

function moveNav()
{
    var menuBut = document.getElementById('menuButton');
    $(menuBut).removeClass('hidden');
    var element = document.getElementById('nav');
    element.style.left = -300 + "px";
}

function sendMessage(message, relocatePath){
    if( relocatePath == null || relocatePath == ""){
        $.prompt(message);
    }
    else{
        $.prompt(message, {
            submit: function(e,v,m,f){
                // use e.preventDefault() to prevent closing when needed or return false.
//                e.preventDefault();
                window.location.assign(relocatePath);
            }
        });
    }
}

function requestConfirmation(message, title, valueName, valueMember){
    var states = {
        state0: {
            title: title,
            html:'<p>' + message + '</p>',
            buttons: { Yes: 1, No: -1 },
            submit:function( e, v, m, f){
                e.preventDefault();

                if( v == 1){
                    var params = {"confirm" : 1, "valueName" : valueName, "valueMember" : valueMember};
                    post(document.URL, params, "get"); //BEST POST
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function displayAbsenteesList(){
    var params;
    var states = {
        state0: {
            title: "Producing Absentees List",
            html:'<p>Select date to prepare absentees list for:</p>' +
                '<input type="date" name="jDtDate" />',
            buttons: { Okay: 1, Cancel: -1 },
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                var selectedDate = f["jDtDate"];

                if( v == 1){
                    window.location.replace("../attendance/absenteesList.php?date=" + selectedDate );
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function resetPassword(user){
    var message = "";
    if (user == null){
        message = "you";
        user = "";
    }
    var states = {
        state0: {
            title: "New Password for " + user + message,
            html:'<table><tr><td><label>Password </td><td><input type="password" name="jTxtPassword" value=""></label></td></tr>'+
                '<tr><td><label>Confirm Password </td><td><input type="password" name="jTxtConfirmPassword" value=""></label></td></tr></table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: "input[name='jTxtPassword']",
            submit:function(e,v,m,f){
                e.preventDefault();

                var password = f["jTxtPassword"];
                var confPassword = f["jTxtConfirmPassword"];

                if(v==1){
                    if (password === confPassword){
                        if (password !== ""){
//                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
//                            post(document.URL, params, "post");
                            var postOb = {"reset" : "Reset", "newPassword" : password, "user" : user};
                            $.post( "../requests/passwordReset.php", postOb, function( data, status ){
                                if( data ){
                                    $.prompt.goToState('state3');
                                }
                                else{
                                    $.prompt.goToState('state4');
                                }
                            });
                        }
                        else
                            $.prompt.goToState('state2');
                    }
                    else
                    {
                        $.prompt.goToState('state1');
                    }
                }
                else
                    $.prompt.close();
            }
        },
        state1: {
            title: "Error",
            html:'<span>Passwords do not match</span>',
            buttons: { Retry: 1, Cancel: -1 },
            submit:function(e,v,m,f){
                e.preventDefault();

                if(v==1)
                    $.prompt.goToState('state0');
                else
                    $.prompt.close();
            }
        },
        state2: {
            title: "Error",
            html:'<span>Password is invalid</span>',
            buttons: { Retry: 1, Cancel: -1 },
            submit:function(e,v,m,f){
                e.preventDefault();

                if(v==1)
                    $.prompt.goToState('state0');
                else
                    $.prompt.close();
            }
        },
        state3: {
            title: "Success",
            html:'<span>Password has been changed</span>',
            buttons: { Okay: 1 },
            submit:function(e,v,m,f){
                e.preventDefault();
                $.prompt.close();
            }
        },
        state4: {
            title: "Error",
            html:'<span>Something went wrong when changing the password. Try again later.</span>',
            buttons: { Okay: 1 },
            submit:function(e,v,m,f){
                e.preventDefault();
                $.prompt.close();
            }
        }
    }
    $.prompt(states);
}

function logIn(){
    var states = {
        state0: {
            title: "Log In to Mana",
            html:'<table><tr><td><label>Email </td><td><input type="text" name="jTxtUsername" value=""></label></td></tr>'+
                '<tr><td><label>Password </td><td><input type="password" name="jTxtPassword" value=""></label></td></tr></table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: "input[name='jTxtUsername']",
            submit:function( e, v, m, f){
                e.preventDefault();

                var username = f["jTxtUsername"];
                var password = f["jTxtPassword"];

                if( v == 1){
//                    if (password === confPassword){
//                    if (password !== ""){
                    var params = {"username" : username, "password" : password};
                    post(document.URL, params, "post");
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function changeClassTeacher( Class ){
    var states = {
        state0: {
            title: "New teacher for " + Class,
            html:
                '<script src="moreStaff.js"></script>' +
                '<table>' +
                    '<tr>' +
                    '<td>Serial No of New Teacher</td>' +
                    '<td><input type="text" name="jTxtStaffID" value=""></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>&nbsp;</td>' +
                    '<td id="jTxtStaffName"></td>' +
                    '</tr>' +
                '</table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: "input[name='jTxtStaffID']",
            submit:function( e, v, m, f){
                e.preventDefault();

                var staffID = f["jTxtStaffID"];

                if( v == 1){
                    var params = {"changeClass" : "true", "staffId" : staffID, "gradeAndClass" : Class};
                    post(document.URL, params, "post");
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function post(path, params, method) { //Allows us to set POST variables with javascript
    method = method || "post"; // Set method to post by default if not specified.

    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
        }
    }
    document.body.appendChild(form);
    form.submit();
}

function staffMore( staffId, name ){

    var valueName = 'Delete';
    var valueMember = staffId;

    var states = {
        state0: {
            title: "Staff Member " + name,
            html:
                '<script src="moreStaff.js"></script>' +
                '<style>' +
                    '.littleMenu{' +
                        'position: relative;' +
                        'left: 30px;' +
                    '}' +
                    '.littleMenu .smallButton{' +
                        'Width: 160px;' +
                    '}' +
                '</style>' +
                '<table class="littleMenu">' +
                '   <tr>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreApplyForLeave" value="Apply for Leave" /></td>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreViewTimetable" value="View timetable" /></td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td>&nbsp;</td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreLeaveReport" value="View Leave Report" /></td>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreStaffReport" value="View Staff Report" /></td>' +
                '   </tr>' +
                    '   <tr>' +
                    '       <td>&nbsp;</td>' +
                    '   </tr>' +
                '   <tr>' +
//                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreLocate" value="Locate Staff Member" /></td>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreSendMessage" value="Send SMS Message" /></td>' +
                '       <td class="center"><input class="smallButton" type="button" id="' + staffId + '" name="moreDelete" value="Delete" /></td>' +
                '   </tr>' +
                '</table>',
            buttons: { Done: 1},
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                $.prompt.close();
            }
        },
        stateDelete: {
            title: 'Delete Staff Member',
            html:'<p>Are you sure you want to delete staff member ' + name +'?</p>',
            buttons: { Yes: 1, No: -1 },
            submit:function( e, v, m, f){
                e.preventDefault();

                if( v == 1){
                    var params = {"confirm" : 1, "valueName" : valueName, "valueMember" : valueMember};
                    post(document.URL, params, "POST");
                }
                else
                    $.prompt.goToState('state0', false);
            }
        },
        stateSendMessage: {
            title: 'Message ' + name,
            html:
                '<script src="moreStaff.js"></script>' +
                '<style>' +
                    '.messageContent{' +
                        'width: 98%;' +
                        'height: 80px;' +
                    '}' +
                    '.characterCounter{' +
                        'float: right;' +
                    '}' +
                '</style>' +
                '<span>Message Content</span><span class="characterCounter" id="charCount">160 characters left</span>' +
                '<textarea name="jTxtMessageArea" class="messageContent"></textarea>',
            focus: "textarea[name='jTxtMessageArea']",
            buttons: { Send: 1, Cancel: -1 },
            submit:function( e, v, m, f){
                e.preventDefault();

                var message = f["jTxtMessageArea"];

//                console.log( message );

                if( v == 1){
                    var params = {"sendMessage" : staffId, "message" : message };
                    $.post( "../requests/messaging.php", params, function( data, status ){
                        if( $('#messageButton').hasClass('active') ){
                            $("#messageButton").click();
                        }
                        else{
                            $.noop();
                        }
                    });
                    $.prompt.close();
                }
                else
                    $.prompt.goToState('state0', false);
            }
        }
    };
    $.prompt(states);
}

function reviewLeave( staffId, startDate, reviewal ){
    /*
        reviewal = 1 for approved leaves.
        reviewal = 2 for rejected leaves.
    */

    reviewal = reviewal == 1 ? reviewal : ( reviewal == 2 ? reviewal : 1);

    var reviewText = reviewal == 1 ? "approval" : "rejection";
    var params;

    var states = {
        state0: {
            title: "Leave Review",
            html:
                '<p> Confirm leave ' + reviewText +  '?</p>' +
                '<label><input id="chkSendSMS" type="checkbox" name="chkSendSMS" />Send an SMS to the staff member to confirm</label>',
            buttons: { Okay: 1, Cancel: -1 },
            submit:function( e, v, m, f){
                e.preventDefault();

                var blnSend = $("#chkSendSMS").is(":checked");

                if( v == 1){
                    if( blnSend ){
                        if( reviewal == 1 ){
                            params = {"sendSMS" : "true", "staffId" : staffId, "startDate" : startDate, "approve" : "true"};
                        }
                        else{
                            params = {"sendSMS" : "true", "staffId" : staffId, "startDate" : startDate, "reject" : "true"};
                        }
                        post(document.URL, params, "post");
                    }
                    else{
                        if( reviewal == 1 ){
                            params = { "staffId" : staffId, "startDate" : startDate, "approve" : "true"};
                        }
                        else{
                            params = { "staffId" : staffId, "startDate" : startDate, "reject" : "true"};
                        }
                        post(document.URL, params, "post");
                    }
                    $.prompt.close();
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function markPresent( id, date ){
    var postOb = { markPresent : true, staffID : id, markedDate : date };
    $.post( "../requests/markAttendance.php", postOb, function( data, status ){
        $('#markButtonContainer_' + id).html( data );
    });
}

function undoMarkPresent( id, date ){
    var postOb = { undoMarkPresent : true, staffID : id, markedDate : date };
    $.post( "../requests/markAttendance.php", postOb, function( data, status ){
        $('#markButtonContainer_' + id).html( data );
    });
}


function substituteTeacher(day, position, originalID, replacementID, originalName, replacementName){
//    indexNo += subject;
    var weekday = new Array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    var period = new Array('1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th');
    var substitutionDate;
    var blnSend = false;
    var params;
    var states = {
        state0: {
            title: "Substituting " +  originalName,
            html:'<table>' +
                '   <tr>' +
                '       <td style="text-align: center">' + weekday[day] + ' ' + period[position] + ' period</td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td><label>Substituted teacher ' + replacementName + /*' with ID ' + replacementID +*/ ' </label></td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td><label>Date &nbsp;&nbsp;&nbsp;&nbsp; <input name="jDteSubstituted" type="date" min="' + getTodayDate() + '" /> </label></td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td colspan="3">&nbsp;</td>' +
                '   </tr>' +
                '   <tr>' +
                '       <td><label><input id="chkSendSMS" type="checkbox" name="chkSendSMS" />Send an SMS to the staff member to confirm</label></td>' +
                '   </tr>' +
                '</table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                var selectedDate = f["jDteSubstituted"];
                substitutionDate = f["jDteSubstituted"];
                var selectedDay = new Date(selectedDate);

                selectedDay = selectedDay.getDay() - 1;

                blnSend = $("#chkSendSMS").is(":checked");

                if (selectedDay == -1){
                    selectedDay = 6;
                }
                if( v == 1){
                    if ( selectedDay == day)
                    {
                        $.prompt.goToState('state1', true);
                    }
                    else{
                        $.prompt.goToState('state2', true);
                    }
                }
                else
                    $.prompt.close();
            }
        },
        state1: {
            html:'Confirm substitution?',
            buttons: { Okay: 1, Cancel: -1 },
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                if( v == 1 ){
                    if( blnSend ){
                        params = {"substitute" : true,
                            "replacementStaffID" : replacementID,
                            "Grade" : null,
                            "Class" : null,
                            "Day" : day,
                            "Position" : position,
                            "Date" : substitutionDate,
                            "originalID" : originalID,
                            "sendSMS" : true};
                    }
                    else{
                        params = {"substitute" : true,
                            "replacementStaffID" : replacementID,
                            "Grade" : null,
                            "Class" : null,
                            "Day" : day,
                            "Position" : position,
                            "Date" : substitutionDate,
                            "originalID" : originalID};
                    }
                    post(document.URL, params, "post");
                }
                else{
                    $.prompt.close();
                }
            }
        },
        state2: {
            html:'Please select a ' + weekday[day],
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                $.prompt.goToState('state0');
            }
        }
    }
    $.prompt(states);
}

function getTeachersForSubstition(staffID, absPosition){
    var relPosition = absPosition % 8;
    var day = parseInt( absPosition / 8);

    var params = {"getSubstitute" : "getSubstitute", "StaffID" : staffID, "Position" : relPosition, "Day" : day};
    post(document.URL, params, "post");
}

function getParameterByName(name) {
    var match = RegExp('[?&]' + name + '=([^&]*)').exec(window.location.search);
    return match && decodeURIComponent(match[1].replace(/\+/g, ' '));
}

function getTodayDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd < 10) {
        dd='0'+dd
    }

    if(mm < 10){
        mm='0'+mm
    }
    today = yyyy+'-'+mm+'-'+dd;
    return today;
}

function isNumeric(evt)
{
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
        return false;
    }

    return true;
}


/* For a given date, get the ISO week number
 *
 * Based on information at:
 *
 *    http://www.merlyn.demon.co.uk/weekcalc.htm#WNR
 *
 * Algorithm is to find nearest thursday, it's year
 * is the year of the week number. Then get weeks
 * between that date and the first day of that year.
 *
 * Note that dates in one year can be weeks of previous
 * or next year, overlap is up to 3 days.
 *
 * e.g. 2014/12/29 is Monday in week  1 of 2015
 *      2012/1/1   is Sunday in week 52 of 2011
 */
function getWeekNumber(d) {
    // Copy date so don't modify original
    d = new Date(+d);
    d.setHours(0,0,0);
    // Set to nearest Thursday: current date + 4 - current day number
    // Make Sunday's day number 7
    d.setDate(d.getDate() + 4 - (d.getDay()||7));
    // Get first day of year
    var yearStart = new Date(d.getFullYear(),0,1);
    // Calculate full weeks to nearest Thursday
    var weekNo = Math.ceil(( ( (d - yearStart) / 86400000) + 1)/7)
    // Return array of year and week number
    return d.getFullYear() + "-W"  + weekNo;
}
