
$(document).ready(function(){
    graphAjax()
    chartAjax()
})

function graphAjax(){
    $.ajax({
        type: "GET",
        url: "/api/home/circle-chart",
        dataType:"json",
        success: function(data)
        {
            GraphSetup(data)
        }
    });
}

function GraphSetup(data){
    console.log(data)
}

function chartAjax(){
    $.ajax({
        type: "GET",
        url: "/api/home/line-chart",
        dataType:"json",
        success: function(data)
        {
            // console.log(data.data)
            chartSetup(data.data)
        }
    });
}

function chartSetup(data){
    unix_timestamp=[]
    for(i=0;i<data.length;i++){
        unix_timestamp.push({x:Date.parse(data[i][1].concat(":00:00")),y:data[i][0]})

    }
    chartBuilder(unix_timestamp)
}

function chartBuilder(data)
{
    var chart = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        title: {
            text: "Amount of sensors in our database"
        },
        axisY: {
            includeZero: true
        },
        data: [{
            type: "line",
            name: "CPU Utilization",
            connectNullData: true,
            //nullDataLineDashType: "solid",
            xValueType: "dateTime",
            xValueFormatString: "DD MMM hh:mm TT",
            dataPoints:data
        }]
    });
    chart.render();
}


