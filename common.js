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
        mainDiv = document.getElementById('')
        element = document.getElementById('nav');
            element.style.position = "absolute";
            element.style.float = "left";
            element.style.width = "230px";
            element.style.top = "260px";
            element.style.left = "0px";
    }
}