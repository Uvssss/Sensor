$("#button").on("click",function()
{
    fromtime=$("#fromTime").find(":selected").val();
    totime=$("#toTime").find(":selected").val();
    sensor_id=$("#sensor_id").find(":selected").val();
    table=$("#table").find(":selected").val();
    window.location="/api/getdata/"+sensor_id+"/"+table+"/"+fromtime+"/"+totime;
    $.ajax({
        type: "GET",
        url: "/api/getdata/"+sensor_id+"/"+table+"/"+fromtime+"/"+totime,
        dataType:"json",
        success: function(data)
        {
            // console.log(data);
            // temp = JSON.parse(data.text)
            console.log(data)
        }
    });
})


$(document).ready(function(){
    $("#table").trigger("change");
})

$(document).ready(function(){
    $("#fromTime").trigger("change");
})
$(document).ready(function(){
    $("#toTime").trigger("change");
})
$(document).ready(function(){
    $("#sensor_id").trigger("change");
})

$("#table").change(function(){
    var table = $(this).find(":selected").val();
    var sensor_id=$("#sensor_id").find(":selected").val();
    $("#fromTime").empty();
    $("#toTime").empty();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
           $.each(data.date, function(key){
            // $("#fromTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
            // $("#toTime").append("<option value=" + data.date[key]+">"+data.date[key]+ "</option>")
            $("#fromTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>
            `)
            $("#toTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>
            `)
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
           $.each(data.date, function(key){
            $("#fromTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>
        `)
        $("#toTime").append(`
        <option value="${data.date[key]}">${data.date[key]}</option>
    `)
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})
