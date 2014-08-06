/**
 * Created by yazdaan on 06/08/14.
 */
function setCookie(cName,value)
{
    document.cookie = cName + " = " + value;
    refreshPage();
}

function refreshPage()
{
    location.reload(true);
}