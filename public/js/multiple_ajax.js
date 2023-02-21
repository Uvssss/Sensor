
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
        url: "/api/multiplegetdata/"+from_sensor_id+"/"+to_sensor_id+"/"+table+"/"+fromtime+"/"+totime+"/"+column,
        dataType:"json",
        success: function(data)
        {
            // console.log(data.data)
            GraphSetup(data.data)
            // NewGraph(data.data)
        }
    });
})
function GraphSetup(data){
    for(i=0;i<=data[data.length-1].id){
        end
        for(x=0; x<data[])
    }
}
function NewGraph(data)
{
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Site Traffic"
        },
        axisX:{
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        toolTip:{
            shared:true
        },
        legend:{
            cursor:"pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data:data
    });
    chart.render();

    function toogleDataSeries(e){
	    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		    e.dataSeries.visible = false;
	    } else{
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

