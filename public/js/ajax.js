$("#button").on("click",function()
{
    fromtime=$("#fromTime").find(":selected").val();
    totime=$("#toTime").find(":selected").val();
    sensor_id=$("#sensor_id").find(":selected").val();
    table=$("#table").find(":selected").val();
    // window.location="/api/getdata/"+sensor_id+"/"+table+"/"+fromtime+"/"+totime;
    $.ajax({
        type: "GET",
        url: "/api/getdata/"+sensor_id+"/"+table+"/"+fromtime+"/"+totime,
        dataType:"json",
        success: function(data)
        {
            Graph(data.data);
        }
    });
})

function Graph(data)
{
    avg_humid=[];
    min_humid=[];
    max_humid=[];
    avg_temp=[];
    min_temp=[];
    max_temp=[];
    for (let i = 0; i < data.length; i++){
        // { label: "New Jersey",  y: 19034.5 }, this is the example i need to follow
        max_humid[i]={ label: data[i].date, y: data[i].max_humid }
        avg_humid[i]={ label:data[i].date, y: data[i].average_humid }
        min_humid[i]={ label:data[i].date, y: data[i].min_humid }
        avg_temp[i]={ label: data[i].date, y: data[i].average_temp }
        max_temp[i]={ label: data[i].date, y: data[i].max_temp }
        min_temp[i]={ label:data[i].date, y: data[i].min_temp }
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
            visible: false,
            showInLegend: true,
            yValueFormatString: "##.00",
            name: "Max humidity",
            dataPoints:max_humid
        },
        {
            type: "spline",
            showInLegend: true,
            visible: false,
            yValueFormatString: "##.00",
            name: "Average humidity",
            dataPoints:avg_humid
        },
        {
            type: "spline",
            visible: false,
            showInLegend: true,
            yValueFormatString: "##.00",
            name: "Min humidty",
            dataPoints:min_humid
        },
        {
            type: "spline",
              visible: false,
            showInLegend: true,
            yValueFormatString: "##.00",
            name: "Max temperature",
            dataPoints:max_temp
        },
        {
            type: "spline",
            showInLegend: true,
            yValueFormatString: "##.00",
            name: "Average temperature",
            dataPoints:avg_temp
        },
        {
            type: "spline",
            showInLegend: true,
            yValueFormatString: "##.00",
            name: "Min temperature",
            dataPoints:min_temp
        }]
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
