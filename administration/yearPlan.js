/**
 * Created by yazdaan on 23/08/14.
 */


function submitYearPlan()
{
    if ($('.selected').length > 0)
    {
        var dates = new Array();

        $('.selected').each(function(i, obj)
            {
                var name = $(obj).attr('name');
                dates.push(name);
                post(document.URL, dates, "POST");
            });
    }
}

function fillYearPlan(holidays){
    var i;
    alert ("Bla" + " yellow");
    for ( i = 0; i < $(holidays).length; i++)
    {
        alert(holidays[i]);


//        $.(".day").each( function(x, obj){
//        if ( $(obj).attr('name') == holidays[i] )
//            $(obj).addClass("selected");
//        });
//        $( ).addClass("selected");
    }
}