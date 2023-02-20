
$(document).ready(function(){
    $("#table").trigger("change");
    $("#fromTime").trigger("change");
    $("#toTime").trigger("change");
    $("#from_sensor_id").trigger("change");
    $("#to_sensor_id").trigger("change");
    $("#column").trigger("change");
})

$("#multiple_button").on("click",function()
{
    fromtime=$("#fromTime").find(":selected").val();
    totime=$("#toTime").find(":selected").val();
    from_sensor_id=$("#from_sensor_id").find(":selected").val();
    to_sensor_id=$("#to_sensor_id").find(":selected").val();
    table=$("#table").find(":selected").val();
    column=$("#column").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/api/multiplegetdata/"+from_sensor_id+"/"+to_sensor_id+"/"+table+"/"+fromtime+"/"+totime,
        dataType:"json",
        success: function(data)
        {
            console.log(data)
            NewGraph(data.data)
        }
    });
})
function NewGraph(data){
    max_humid=[];
    for (let i = 0; i < data.length; i++){
        // { label: "New Jersey",  y: 19034.5 }, this is the example i need to follow
        max_humid[i]={ label: data[i].date, y: data[i].max_humid }
    }
    var chart = new CanvasJS.Chart("chartContainer", {
        theme:"light2",
        animationEnabled: true,
        title:{
            text: "Temperature and humidity results"
        },
        toolTip: {
            shared: "true"
        },
        legend:{
            cursor:"pointer",
            itemclick : toggleDataSeries
        },
        data: [{
            type: "spline",
            visible: true,
            showInLegend: true,
            yValueFormatString: "##.00",
            name:"sda",
            dataPoints:max_humid
        },]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible ){
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }
        }


$("#table").change(function(){
    var table = $(this).find(":selected").val();
    var sensor_id=$("#from_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
            $("#fromTime").empty();
            $("#toTime").empty();
           $.each(data.date, function(key){
            $("#fromTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>`)
            $("#toTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>`)
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})

$("#from_sensor_id").change(function(){
    var table = $("#table").find(":selected").val();
    var sensor_id=$("#from_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
            $("#fromTime").empty();
            $("#toTime").empty();
           $.each(data.date, function(key){
            $("#fromTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
            $("#toTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})

$("#to_sensor_id").change(function(){
    var table = $("#table").find(":selected").val();
    var sensor_id=$("#to_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/api/gettime/"+table+"/"+sensor_id,
        dataType: "json",   //expect html to be returned
        success: function(data){
            $("#fromTime").empty();
            $("#toTime").empty();
           $.each(data.date, function(key){
            $("#fromTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
            $("#toTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
           })
       },
        error: function(jqXhr, textStatus, errorMessage){
            console.log(errorMessage)
       }
   });
})

