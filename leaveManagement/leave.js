/**
 * Created by Shavin on 8/16/14.
 */

 function GenerateReport()
 {
 var value;

 var val2 = "test";

 alert(val2);

 if(document.getElementById('StaffID').checked)
 {
 value = document.getElementById('StaffID').value;
 document.getElementById('selection').innerHTML = value;
 }
 else if(document.getElementById('Date').checked)
 {
 value = document.getElementById('Date').value;
 document.getElementById('selection').innerHTML = value;
 }
 else
 {
 document.getElementById('selection').innerHTML='Staff ID ';
 }
 }

