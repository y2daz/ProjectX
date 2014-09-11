/**
 * Created by Madhushan on 8/16/14.
 */

function isLetter(str) {
    return str.length === 1 && str.toLowerCase().match(/[a-z]/i);
}

$("#value").on('blur', function(e){
    alert("ALALAL");
//    var searchClass = $(this).val();
//
//    var grade = "";
//    var i = 0;
//
//    console.log(grade);
//
//    while( !isNaN(searchClass[i]) ){
//        console.log(searchClass[i]);
//        grade = grade.toString() + searchClass[i].toString();
//        i++;
//        console.log(grade);
//    }
////
////    console.log(grade);
////    if ( i < 1){
////        grade = "";
////    }
////
////    grade = grade + " ";
////
////    console.log(grade);
////    i = searchClass.length - 1;
////
////    while( isLetter(searchClass[i]) ){
////        grade = grade.toString() + searchClass[i].toString();
////        i--;
////    }
////    console.log(grade);
////    $(this).val(grade);
});