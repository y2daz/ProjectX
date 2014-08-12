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
        var menuBut = document.getElementById('menuButton');
        $(menuBut).removeClass('hidden');
        var element = document.getElementById('nav');
        element.style.left = -230 + "px";
    }
}

function message(){


}