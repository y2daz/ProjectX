/**
 * Created by Yazdaan on 06/08/14.
 */

$(document).ready(function() {
    window.open    = function(){};
    window.print   = function(){};
    // Support hover state for mobile.
    if (false) {
        window.ontouchstart = function(){};
    }

    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if (w <= 1280)
    {
        moveNav();
    }
    $( document ).keypress(function(e) {
        if (w <= 1280){
            if( parseInt(e.which) == 62 || parseInt(e.which) == 60 ){
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
            $('#nav').stop().animate({left:'0'}, 200);
        }
        else
        {
            $('#nav').stop().animate({left: '-100%'}, 200);
        }
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
    element.style.left = -230 + "px";
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
                    post(document.URL, params, "get");
                }
                else
                    $.prompt.close();
            }
        }
    };
    $.prompt(states);
}

function resetPassword(user){
    var states = {
        state0: {
            title: "New Password for " + user,
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
                            var params = {"reset" : "Reset", "newPassword" : password, "user" : user};
                            post(document.URL, params, "post");
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
    }
    $.prompt(states);
}

function editOLGrade(indexNo, subject){
//    indexNo += subject;
    var states = {
        state0: {
            title: "Enter new grade",
            html:'<table><tr><td><label>Grade</td><td><input type="text" name="jTxtGrade" value=""></label></td></tr></table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: "input[name='jTxtGrade']",
            submit:function( e, v, m, f){
                e.preventDefault();
                var grade = f["jTxtGrade"];

                if( v == 1){
                    var params = {"IndexNo" : indexNo, "Subject" : subject, "Grade" : grade, "NewGrade" : "NewGrade"};
                    post(document.URL, params, "post");
                }
                else
                    $.prompt.close();
            }
        }
    }
    $.prompt(states);
}

function editALGrade(indexNo,Subject1,S1Grade,Subject2,S2Grade,Subject3,S3Grade,GenGrade,CommonGeneralTest,Zscore,IslandRank,DistrictRank){
//    indexNo += subject;
    var states = {
        state0: {
            title: "Enter new grades for Index Number" + indexNo,
            html:'<table><tr><td><label>' + Subject1 + '</td><td><input type="text" name="jTxtS1Grade" value="' + S1Grade + '"></label></td></tr>' +
                '<tr><td><label>' + Subject2 + '</td><td><input type="text" name="jTxtS2Grade" value="' + S2Grade + '"></label></td></tr>' +
                '<tr><td><label>' + Subject3 + '</td><td><input type="text" name="jTxtS3Grade" value="' + S3Grade + '"></label></td></tr>' +
                '<tr><td><label>General English</td><td><input type="text" name="jTxtGenGrade" value="' + GenGrade + '"></label></td></tr>' +
                '<tr><td><label>Common General Test</td><td><input type="text" name="jTxtCommonGeneralTest" value="' + CommonGeneralTest + '"></label></td></tr>' +
                '<tr><td><label>Z-Score</td><td><input type="text" name="jTxtZScore" value="' + Zscore + '"></label></td></tr>' +
                '<tr><td><label>Island Rank</td><td><input type="text" name="jTxtIslandRank" value="' + IslandRank + '"></label></td></tr>' +
                '<tr><td><label>District Rank</td><td><input type="text" name="jTxtDistrictRank" value="'+ DistrictRank +'"></label></td></tr>' +
                '</table>',
            buttons: { Okay: 1, Cancel: -1 },
//            focus: "input[name='jTxtGrade']",
            submit:function( e, v, m, f){
                e.preventDefault();
                console.log(Zscore);
                S1Grade = f["jTxtS1Grade"];
                S2Grade = f["jTxtS2Grade"];
                S3Grade = f["jTxtS3Grade"];
                GenGrade = f["jTxtGenGrade"];
                CommonGeneralTest = f["jTxtCommonGeneralTest"];
                Zscore = f["jTxtZScore"];
                IslandRank = f["jTxtIslandRank"];
                DistrictRank = f["jTxtDistrictRank"];
                console.log(Zscore);

                if( v == 1){
                    var params = {"IndexNo" : indexNo, "S1Grade" : S1Grade, "S2Grade" : S2Grade, "S3Grade" : S3Grade, "GenGrade" : GenGrade, "CommonGeneralTest" : CommonGeneralTest, "Zscore" : Zscore, "IslandRank" : IslandRank, "DistrictRank" : DistrictRank};
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

//function validate(courseOfStudy)
//{
//    var combo1 = document.getElementById("courseofstudy");
//
//    if(combo1.value == null || combo1.value == "18" || combo1.value == "70" || combo1.value == "71" || combo1.value == "72" || combo1.value == "73" || combo1.value == "74" || combo1.value == "95" ||combo1.value == "96")
//    {
//        alert("Please select Course of study");
//        return 0;
//    }
//    else
//    {
//        return 1;
//    }
//}

function substituteTeacher(day, position, originalID, replacementID, originalName, replacementName){
//    indexNo += subject;
    var weekday = new Array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    var period = new Array('1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th');
    var substitutionDate;
    var states = {
        state0: {
            title: "Substituting " +  originalName /*+ " with ID " + originalID*/,
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
                '</table>',
            buttons: { Okay: 1, Cancel: -1 },
            focus: 1,
            submit:function( e, v, m, f){
                e.preventDefault();
                var selectedDate = f["jDteSubstituted"];
                substitutionDate = f["jDteSubstituted"];
                var selectedDay = new Date(selectedDate);

                selectedDay = selectedDay.getDay() - 1;
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
//                    $.prompt.goToState('state0');
                    var params = {"substitute":true, "replacementStaffID" : replacementID, "Grade" : null, "Class" : null, "Day" : day, "Position" : position, "Date" : substitutionDate, "originalID" : originalID};
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
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
    {
        alert("Please Enter Only Numeric Value:");
        return false;
    }

    return true;
}
