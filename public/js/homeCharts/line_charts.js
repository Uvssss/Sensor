$(document).ready(function () {
    avg_humid_lineAjax()
    avg_temp_lineAjax()
})
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
            yValueFormatString: "#0.## rh",
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
