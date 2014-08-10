/**
 * Created by yazdaan on 06/08/14.
 */
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
//    var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0)

//    alert(w);

    if (w <= 1280)
    {
        menuItem = document.getElementById('navHide')
        menuItem.style.display = "block";
        menuItem.style.left = ""
        element = document.getElementById('nav');
        element.style.left = -230 + "px";

        $(document).ready(function(){
            $('#navHide, #nav').mouseout(function(){
                $('#nav').stop().animate({
                    left: '-100%'
                }, 200);
            }).mouseover(function(){
                $('#nav').stop().animate({
                    left:'0'
                }, 200);
            });

        });
    }
    else
    {
        menuItem = document.getElementById('navHide')
        menuItem.style.display = "none";
    }
}