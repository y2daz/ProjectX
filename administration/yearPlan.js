/**
 * Created by yazdaan on 23/08/14.
 */


function submitYearPlan()
{
    if ( $('.selected').length > 0)
    {
        var dates = [];

        $('.selected').each(function(i, obj)
        {
            var name = $(obj).attr('name');
            dates.push( name );
            post(document.URL, dates, "POST");
        });
    }
}
