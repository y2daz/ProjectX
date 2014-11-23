/**
 * Created by yazdaan on 23/08/14.
 */


function submitYearPlan()
{
    if ( $('.selected').length > 0)
    {
        var dates = new Array();

        $('.selected').each(function(i, obj)
        {
            var name = $(obj).attr('name');
            dates.push( name );
            post(document.URL, dates, "POST");
        });
    }
}

function fillYearPlan(holidays){
    var i;
    for ( i = 0; i < $(holidays).length; i++)
    {
        $('[name="' + holidays[i] + '"]').addClass("selected");
    }
}