$(document).ready(function () {
    graphAjax()
    ColumnAjax()

})
function graphAjax() {
    $.ajax({
        type: "GET",
        url: "/home/circle-chart",
        dataType: "json",
        success: function (data) {
            GraphSetup(data.data)
        }
    });
}

function ColumnAjax() {
    $.ajax({
        type: "GET",
        url: "/home/column-chart",
        dataType: "json",
        success: function (data) {
            column_setup(data.data)
        }
    });
}
function column_setup(data) {
    dataPoints = []
    for (i = 0; i < data.length; i++) {
        temparr = { y: data[i].loc_count, label: data[i].location }
        dataPoints.push(temparr)
    }
    columnBuilder(dataPoints)
}


function GraphSetup(data) {
    endarray = []
    for (i = 0; i < data.length; i++) {
        endarray.push({ y: parseFloat(data[i][0]).toFixed(2), label: data[i][1] })
    }
    // console.log(endarray)
    GraphBuilder(endarray)
}

function GraphBuilder(data) {
    var chart = new CanvasJS.Chart("graphContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "Sensor location percentage"
        },
        exportEnabled: true,
        animationEnabled: true,
        data: [{
            type: "pie",
            startAngle: 25,
            toolTipContent: "<b>{label}</b>: {y}%",
            showInLegend: "true",
            legendText: "{label}",
            indexLabelFontSize: 16,
            indexLabel: "{label} - {y}%",
            dataPoints: data
        }]
    });
    chart.render();
}

function columnBuilder(data) {
    var chart = new CanvasJS.Chart("columnContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title: {
            text: "Sensor amount in Location"
        },
        data: [{
            type: "column",
            dataPoints: data
        }]
    });
    chart.render();

}
