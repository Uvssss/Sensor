$("#button").on("click",function()
{
    $(document).ready(function()
    {
        $.ajax({
            type: "GET",
            url: "/api/getdata/{sensor_id}/{table}/{fromTime}/{toTime}",
            dataType:"json",
            success: function(response)
            {
                // REEEEEE
            }
        });
    });
})


$(document).ready(function(){
    $("#table").trigger("change");
})

$(document).ready(function(){
    $("#fromTime").trigger("change");
})
$(document).ready(function(){
    $("#toTimes").trigger("change");
})

$("#table").change(function(){
    var table = $(this).find(":selected").val();
    var sensor_id=$("#sensor_id").find(":selected").val();
    console.log(table,sensor_id);
    $("#fromTime").empty();
    $("#toTime").empty();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
            console.log(data.date);
           $.each(data.date, function(key){
            $("#fromTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
            $("#toTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})

$("#sensor_id").change(function(){
    var table = $("#table").find(":selected").val();
    var sensor_id=$("#sensor_id").find(":selected").val();
    console.log(table,sensor_id);
    $("#fromTime").empty();
    $("#toTime").empty();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
            console.log(data.date);
           $.each(data.date, function(key){
             $("#fromTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
             $("#toTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})
