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
            console.log(data.data)
            // Graph(data.data);
            Graph();
        }
    });
})

function Graph()
{
    var chart = new CanvasJS.Chart("chartContainer",
    {
        exportEnabled: true,
        animationEnabled: true,
        title:{
            text: "Car Parts Sold in Different States"
        },
        subtitles: [{
            text: "Click Legend to Hide or Unhide Data Series"
        }],
        axisX: {
            title: "States"
        },
        axisY: {
            title: "Oil Filter - Units",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC",
            includeZero: true
        },
        axisY2: {
            title: "Clutch - Units",
            titleFontColor: "#C0504E",
            lineColor: "#C0504E",
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
        data: [{
            type: "column",
            name: "Oil Filter",
            showInLegend: true,
            yValueFormatString: "#,##0.# Units",
            dataPoints: [
                { label: "New Jersey",  y: 19034.5 },
                { label: "Texas", y: 20015 },
                { label: "Oregon", y: 25342 },
                { label: "Montana",  y: 20088 },
                { label: "Massachusetts",  y: 28234 }
            ]
        },
        {
            type: "column",
            name: "Clutch",
            axisYType: "secondary",
            showInLegend: true,
            yValueFormatString: "#,##0.# Units",
            dataPoints: [
                { label: "New Jersey", y: 210.5 },
                { label: "Texas", y: 135 },
                { label: "Oregon", y: 425 },
                { label: "Montana", y: 130 },
                { label: "Massachusetts", y: 528 }
            ]
        }]
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
