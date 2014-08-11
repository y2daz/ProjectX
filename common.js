/**
 * Created by yazdaan on 06/08/14.
 */

$(document).ready(function() {
    window.open    = function(){};
    window.print   = function(){};
    // Support hover state for mobile.
    if (false) {
        window.ontouchstart = function(){};
    }
    moveNav();
});

function menuClicked(e) {
    e.classList.toggle("active");
}

function setCookie(cName,value) //Sets a cookie.
{
    document.cookie = cName + " = " + value;
    refreshPage();
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
        var menuDiv = document.getElementById('divMenuButton');
        $(menuDiv).removeClass('hidden');
        var menuBut = document.getElementById('menuButton');
        $(menuBut).setAttribute('hidden', '');
//        alert(w);
//            menuItem.style.left = "5px"
//        var element = document.getElementById('nav');
//        element.style.left = -230 + "px";
//
//        if($('#menuButton').classList.contains("navHide")){
//            $('#navHide, #nav').click(function(){
//                $('#nav').stop().animate({
//                    left: '-100%'
//                }, 200);
//            })
//        }else{
//        function(){
//            $('#nav').stop().animate({
//            left:'0'
//            }, 200);
//        }}
//    }
//    else
//    {
//        menuItem = document.getElementById('navHide')
//        menuItem.style.display = "none";
    }
}
