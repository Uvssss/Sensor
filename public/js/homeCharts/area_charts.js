$(document).ready(function () {
    humid_areaAjax()
    temp_areaAjax()

})
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

function temp_AreaBuilder(data) {
    var chart = new CanvasJS.Chart("tempareaContainer", {
        exportEnabled: true,
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Temperature Variation"
        },
        axisX: {
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
