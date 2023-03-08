
$(document).ready(function () {
    graphAjax()
    humid_areaAjax()
    temp_areaAjax()
    avg_humid_lineAjax()
    avg_temp_lineAjax()
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

function humid_areaAjax() {
    $.ajax({
        type: "GET",
        url: "/home/humid-area-chart",
        dataType: "json",
        success: function (data) {
            humid_area_setup(data.data)
        }
    });
}
function temp_areaAjax() {
    $.ajax({
        type: "GET",
        url: "/home/temp-area-chart",
        dataType: "json",
        success: function (data) {
            temp_area_setup(data.data)
        }
    });
}

function avg_humid_lineAjax() {
    $.ajax({
        type: "GET",
        url: "/home/humid-line-chart",
        dataType: "json",
        success: function (data) {
            avg_humid_line_setup(data.data)
        }
    });
}
function avg_temp_lineAjax() {
    $.ajax({
        type: "GET",
        url: "/home/temp-line-chart",
        dataType: "json",
        success: function (data) {
            avg_temp_line_setup(data.data)
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
function temp_area_setup(data) {
    // console.log(data)
    maindata = []
    enddata = []
    dataPoints = []
    for (i = 1; i < data.length; i++) {
        if (i == 1) {
            dataPoints.push({ x: new Date(data[i - 1].date), y: [data[i - 1].min_temp,data[i - 1].max_temp], sensor: data[i - 1].sensor })
        }
        if (data[i - 1].sensor_id == data[i].sensor_id) {
            dataPoints.push({ x: new Date(data[i].date), y:[data[i].min_temp,data[i].max_temp], sensor: data[i].sensor })
        }
        if (data[i - 1].sensor_id != data[i].sensor_id) {
            enddata.push(dataPoints)
            dataPoints = []
            dataPoints.push({ x: new Date(data[i].date), y: [data[i].min_temp,data[i].max_temp], sensor: data[i].sensor })
        }
        if (i == (data.length - 1)) {
            enddata.push(dataPoints)
        }
    }
    // The group array is sorted by date ASC order
    enddata.sort(function (a, b) {
        return b.date - a.date;
    });
    for (i = 0; i < enddata.length; i++) {
        temparr =
        {
            type: "rangeArea",
    	    showInLegend: true,
    	    name: enddata[i][0].sensor,
    	    markerSize: 0,
    	    yValueFormatString: "#0.## °C",
    	    dataPoints:enddata[i]
        }
        maindata.push(temparr)
    }
    // deleting sensor from datapoints
    for (i = 0; i < maindata.length; i++) {
        datpoint = maindata[i].dataPoints;
        for (x = 0; x < datpoint.length; x++) {
            delete datpoint[x].sensor;
        }
    }
    temp_AreaBuilder(maindata)

}
function humid_area_setup(data) {
    // console.log(data)
    maindata = []
    enddata = []
    dataPoints = []
    for (i = 1; i < data.length; i++) {
        if (i == 1) {
            dataPoints.push({ x: new Date(data[i - 1].date), y: [data[i - 1].min_humid,data[i - 1].max_humid], sensor: data[i - 1].sensor })
        }
        if (data[i - 1].sensor_id == data[i].sensor_id) {
            dataPoints.push({ x: new Date(data[i].date), y: [data[i].min_humid,data[i].max_humid], sensor: data[i].sensor })
        }
        if (data[i - 1].sensor_id != data[i].sensor_id) {
            enddata.push(dataPoints)
            dataPoints = []
            dataPoints.push({ x: new Date(data[i].date), y: [data[i].min_humid,data[i].max_humid], sensor: data[i].sensor })
        }
        if (i == (data.length - 1)) {
            enddata.push(dataPoints)
        }
    }
    enddata.sort(function (a, b) {
        return b.date - a.date;
    });
    for (i = 0; i < enddata.length; i++) {
        temparr =
        {
            type: "rangeArea",
    	    showInLegend: true,
    	    name: enddata[i][0].sensor,
    	    markerSize: 0,
    	    yValueFormatString: "#0.## ",
    	    dataPoints:enddata[i]
        }
        maindata.push(temparr)
    }
    // deleting sensor from datapoints
    for (i = 0; i < maindata.length; i++) {
        datpoint = maindata[i].dataPoints;
        for (x = 0; x < datpoint.length; x++) {
            delete datpoint[x].sensor;
        }
    }
    humid_AreaBuilder(maindata)

}
function avg_humid_line_setup(data) {
    dataPoints = []
    maindata = []
    enddata = []
    for (i = 1; i < data.length; i++) {
        if (i == 1) {
            dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].average_humid, sensor: data[i - 1].sensor })
        }
        if (data[i - 1].sensor_id == data[i].sensor_id) {
            dataPoints.push({ x: new Date(data[i].date), y: data[i].average_humid, sensor: data[i].sensor })
        }
        if (data[i - 1].sensor_id != data[i].sensor_id) {
            enddata.push(dataPoints)
            dataPoints = []
            dataPoints.push({ x: new Date(data[i].date), y: data[i].average_humid, sensor: data[i].sensor })
        }
        if (i == (data.length - 1)) {
            enddata.push(dataPoints)
        }
    }
    enddata.sort(function (a, b) {
        return b.date - a.date;
    });
    for (i = 0; i < enddata.length; i++) {
        temparr =
        {
            name: enddata[i][0].sensor,
            type: "spline",
            yValueFormatString: "#0.## %rh",
            showInLegend: true,
            dataPoints: enddata[i]
        }
        maindata.push(temparr)
    }
    // deleting sensor from datapoints
    for (i = 0; i < maindata.length; i++) {
        datpoint = maindata[i].dataPoints;
        for (x = 0; x < datpoint.length; x++) {
            delete datpoint[x].sensor;
        }
    }
    avg_humid_lineBuilder(maindata)
}
function avg_temp_line_setup(data) {
    dataPoints = []
    maindata = []
    enddata = []
    for (i = 1; i < data.length; i++) {
        if (i == 1) {
            dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].average_temp, sensor: data[i - 1].sensor })
        }
        if (data[i - 1].sensor_id == data[i].sensor_id) {
            dataPoints.push({ x: new Date(data[i].date), y: data[i].average_temp, sensor: data[i].sensor })
        }
        if (data[i - 1].sensor_id != data[i].sensor_id) {
            enddata.push(dataPoints)
            dataPoints = []
            dataPoints.push({ x: new Date(data[i].date), y: data[i].average_temp, sensor: data[i].sensor })
        }
        if (i == (data.length - 1)) {
            enddata.push(dataPoints)
        }
    }
    enddata.sort(function (a, b) {
        return b.date - a.date;
    });
    for (i = 0; i < enddata.length; i++) {
        temparr =
        {
            name: enddata[i][0].sensor,
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: enddata[i]
        }
        maindata.push(temparr)
    }
    // deleting sensor from datapoints
    for (i = 0; i < maindata.length; i++) {
        datpoint = maindata[i].dataPoints;
        for (x = 0; x < datpoint.length; x++) {
            delete datpoint[x].sensor;
        }
    }
    avg_temp_lineBuilder(maindata)
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

function avg_humid_lineBuilder(data) {

    var chart = new CanvasJS.Chart("humidlineContainer", {
        animationEnabled: true,
        title: {
            text: "Hourly Average Humidity for different sensors"
        },
        axisX: {
            valueFormatString: "DD MMM HH:00"
        },
        axisY: {
            title: "Humidity (in %RH)",
            suffix: " %rh"
        },
        legend: {
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip: {
            shared: true
        },
        data: data
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}

function avg_temp_lineBuilder(data) {

    var chart = new CanvasJS.Chart("templineContainer", {
        animationEnabled: true,
        title: {
            text: "Hourly Average Temperature for different sensors"
        },
        axisX: {
            valueFormatString: "DD MMM HH:00"
        },
        axisY: {
            title: "Temperature (in °C)",
            suffix: "°C"
        },
        legend: {
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip: {
            shared: true
        },
        data: data
    });
    chart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

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

function temp_AreaBuilder(data) {
    var chart = new CanvasJS.Chart("tempareaContainer", {
        exportEnabled: true,
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Temperature Variation"
        },
        axisX: {
            title: "April 2017",
            valueFormatString: "DD MMM"
        },
        axisY: {
            suffix: " °C"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            horizontalAlign: "center",
            itemclick: toggleDataSeries
        },
        data: data
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
function humid_AreaBuilder(data) {
    var chart = new CanvasJS.Chart("humidareaContainer", {
        exportEnabled: true,
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Humidity Variation"
        },
        axisX: {
            title: "April 2017",
            valueFormatString: "DD MMM"
        },
        axisY: {
            suffix: " %rh"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            horizontalAlign: "center",
            itemclick: toggleDataSeries
        },
        data: data
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
