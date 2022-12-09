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
// get time select cuz weeks and months are different
// When choosing table, make sensor_id and from and to time appear


$(document).ready(function(){
    $("#table").trigger("change");
})

$(document).ready(function(){
    $("#sensor_id").trigger("change");
})
$(document).ready(function(){
    $("#fromTime").trigger("change");
})
$(document).ready(function(){
    $("#toTimes").trigger("change");
})


$("#table").change(function(){
    var table = $(this).find(":selected").val();
    $("#sensor_id").empty();
    $.ajax({
        type: "GET",
        url: null,
        dataType: "json",   //expect html to be returned
        success: function(data){
           $.each(data, function(key){
            $("#sensor_id").append("<option value=" + data[key]['sensor_id']+">"+data[key]['name']+ "</option>")
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log("error")
       }
   });
})


$("#table").change(function(){
    var table = $(this).find(":selected").val();
    $("#fromTime").empty();
    $.ajax({
        type: "GET",
        url: null,
        dataType: "json",   //expect html to be returned
        success: function(data){
           $.each(data, function(key){
            $("#fromTime").append("<option value=" + data[key]['date']+">"+data[key]['date']+ "</option>")
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log("error")
       }
   });
})
$("#table").change(function(){
    var table = $(this).find(":selected").val();
    $("#toTime").empty();
    $.ajax({
        type: "GET",
        url: null,
        dataType: "json",   //expect html to be returned
        success: function(data){
           $.each(data, function(key){
            $("#toTime").append("<option value=" + data[key]['date']+">"+data[key]['date']+ "</option>")
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log("error")
       }
   });
})


$(document).ready(function() {
    // table get element valeu from table select
    $.ajax({
        type: "GET",
        url: "localhost:8000/api/getsensors",
        async: false,
        data:table,
        success: function(response) {

      }
})
});

$(document).ready(function() {
    // table get element value
    $.ajax({
        type: "GET",
        url: "localhost:8000/api/gettime",
        async: false,
        data:table,
        success: function(response) {

      }
})
});
