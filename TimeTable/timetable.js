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

function clickedTeacher()
{
    document.getElementById('selection').innerHTML='Teacher : ';
    document.getElementById('toHide').hidden = "hidden";
}

function clickedClass()
{
    document.getElementById('selection').innerHTML='Class : ';
    document.getElementById('toHide').hidden = "";
}