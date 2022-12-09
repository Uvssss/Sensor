$("#button").on("click",function()
{
    $(document).ready(function()
    {
        $.ajax({
            type: "GET",
            url: "localhost:8000/api/getdata/{sensor_id}/{table}/{fromTime}/{toTime}",
            async: false,
            success: function(response)
            {
                // REEEEEE
            }
        });
    });
})
// get time select cuz weeks and months are different REEEEEEEEEEEEEEEEEEE

$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "localhost:8000/api/getsensors",
        async: false,
        success: function(response) {
            // REEEE
      }
});
});
