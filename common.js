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

    moveNav();

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


//    alert(curText);

    if ((curText == text) || (curText == ""))
    {
        $(element).addClass('grayText');
        $(element).val(text);
    }
    else
    {
        $(element).removeClass('grayText');
    }
}

function remGrayText(element, text)
{
    var curText = element.value;

    if (curText == text)
    {
        $(element).removeClass('grayText');
        $(element).val("");
    }
}

function moveNav()
{
    var w = Math.max(document.documentElement.clientWidth, window.innerWidth || 0)

    if (w <= 1280)
    {
        var menuBut = document.getElementById('menuButton');
        $(menuBut).removeClass('hidden');
        var element = document.getElementById('nav');
        element.style.left = -230 + "px";
    }
}

function sendMessage(text){
    $.prompt(text);
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
                S1Grade = f["jTxtS1Grade"];
                S2Grade = f["jTxtS2Grade"];
                S3Grade = f["jTxtS3Grade"];
                GenGrade = f["jTxtGenGrade"];
                CommonGeneralTest = f["jTxtCommonGeneralTest"];
                Zscore = f["jTxtZscore"];
                IslandRank = f["jTxtIslandRank"];
                DistrictRank = f["jTxtDistrictRank"];

                if( v == 1){
//                    var params = {"IndexNo" : indexNo, "Subject" : subject, "Grade" : grade, "NewGrade" : "NewGrade"};
//                    post(document.URL, params, "post");
                }
                else
                    $.prompt.close();
            }
        }
    }
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