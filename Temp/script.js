/**
 * Created by Tharindu on 8/8/14.
 */


function addTextbox()
{
    var x = document.getElementById("subjectList").innerHTML;

    var newText = "<tr><td>2</td><td><input type='text' class='myText' name='sub' ></td><tr>";

    document.getElementById("subjectList").innerHTML = x + newText;
}

function clickedTeacher()
{
    document.getElementById('selection').innerHTML='Class : ';
    document.getElementById('toHide').hidden = "hidden";
}

function clickedClass()
{
    document.getElementById('selection').innerHTML='Teacher : ';
    document.getElementById('toHide').hidden = "";
}