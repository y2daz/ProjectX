/**
 * Created by Tharindu on 8/8/14.
 */


function addTextbox()
{
    var table = document.getElementById("subjectList");

    var num = $('.subNumber').length;

    var newTextbox = document.createElement('tr');
    newTextbox.innerHTML = "<td>" + (num + 1) + "</td><td><input type='text' class='subNumber' name='sub' ></td>";


    table.appendChild(newTextbox);

//    var newText = "<tr><td>" + (num + 1) + "</td><td><input type='text' class='subNumber' name='sub' ></td><tr>";

//    document.getElementById("subjectList").innerHTML = table + newText;
}


function addNewRow()
{
    var table = document.getElementById("assign");

    var num = $('.noOfSubject').length;

    var newTextbox = document.createElement('tr');

    var a = "<td  class=\"noOfSubject\">Subject " + (num + 1) + "</td><td><input type='text' class=\"text2\" name=\"sub\""+(num + 1) + "></td>";

    newTextbox.innerHTML = a;


    table.appendChild(newTextbox);



}

function clickedTeacher()
{
    var lang = getCookie("language");

    if (lang == 0)
    {
        document.getElementById('selection').innerHTML='Teacher : ';
    }
    else
    {
        document.getElementById('selection').innerHTML='ගුරුවරයාගේ නම : ';
    }
    document.getElementById('toHide').hidden = "hidden";


    $('#main').height(800);
    $('#footer').css({ top: '900px' });
    $('.rowToHide').css({ display: '' });

}

function clickedClass()
{
    var lang = getCookie("language");

    if (lang == 0)
    {
        document.getElementById('selection').innerHTML='Class : ';
    }
    else
    {
        document.getElementById('selection').innerHTML='පන්තිය : ';
    }
    document.getElementById('toHide').hidden = "";

   $('#main').height(800);
   $('#footer').css({ top: '900px' });
   $('.rowToHide').css({ display: 'none' });

}