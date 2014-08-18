/**
 * Created by Shavin on 8/16/14.
 */

function GenerateReport()
{
    var value;

    if(document.getElementById('r0').checked)
    {
        value = document.getElementById('r0').value;
        document.getElementById('selection').innerHTML = value;
    }

    else if(document.getElementById('r1').checked)
    {
        value = document.getElementById('r1').value;
        document.getElementById('selection').innerHTML = value;
    }
    else if(document.getElementById('r2').checked)
    {
        value = document.getElementById('r2').value;
        document.getElementById('selection').innerHTML = value;
    }
    else if(document.getElementById('r3').checked)
    {
        value = document.getElementById('r3').value;
        document.getElementById('selection').innerHTML = value;
    }
    else if(document.getElementById('r4').checked)
    {
        value = document.getElementById('r4').value;
        document.getElementById('selection').innerHTML = value;
    }
    else if(document.getElementById('r5').checked)
    {
        value = document.getElementById('r5').value;
        document.getElementById('selection').innerHTML = value;
    }
    else
    {
        document.getElementById('selection').innerHTML='View All ';
    }
}