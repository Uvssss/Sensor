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
    console.log(data)
    for (let i = 0; i < data.length; i++){
        // { label: "New Jersey",  y: 19034.5 }, this is the example i need to follow
        max_humid[i]={ label: data[i].date, y: data[i].max_humid }
        avg_humid[i]={ label: data[i].date, y: data[i].average_humid }
        min_humid[i]={ label: data[i].date, y: data[i].min_humid }
        avg_temp[i]={ label: data[i].date, y: data[i].average_temp }
        max_temp[i]={ label: data[i].date, y: data[i].max_temp }
        min_temp[i]={ label: data[i].date, y: data[i].min_temp }
    }
    var chart = new CanvasJS.Chart("chartContainer",
    {
        exportEnabled: true,
        animationEnabled: true,
        title:{
            text: "Temperature and Humidity results"
        },
        subtitles: [{
            text: "Click Legend to Hide or Unhide Data Series"
        }],
        axisX: {
            title: "Dates"
        },
        axisY: {
            // title: "test2",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC",
            includeZero: true
        },
        axisY2: {
            // title: "asddsa",
            // titleFontColor: "#C0504E",
            // lineColor: "#C0504E",
            labelFontColor: "#C0504E",
            tickColor: "#C0504E",
            includeZero: true
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [ //Make datapoints into a loop
        {
            type: "column",
            name: "Max Temperature",
            showInLegend: true,
            yValueFormatString: "#,##0.# °C",
            dataPoints: max_temp
        },
        {
            type: "column",
            name: " Min Temperature",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# °C",
            dataPoints: min_temp
        },
        {
            type: "column",
            name: "Average Temperature",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# °C",
            dataPoints: avg_temp
        },
        {
            type: "column",
            name: "Max Humidity",
            showInLegend: true,
            yValueFormatString: "#,##0.# ",
            dataPoints: max_humid
        },
        {
            type: "column",
            name: "Min Humidity",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# ",
            dataPoints: min_humid
        },
        {
            type: "column",
            name: "Average Humidity",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# ",
            dataPoints:avg_humid
        }
    ]
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        e.chart.render();
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
