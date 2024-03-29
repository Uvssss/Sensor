
$(document).ready(function () {
    $("#table").trigger("change");
    $("#fromTime").trigger("change");
    $("#toTime").trigger("change");
    $("#from_sensor_id").trigger("change");
    $("#to_sensor_id").trigger("change");
    $("#column").trigger("change");
})

$("#multiple_button").on("click", function () {
    fromtime = $("#fromTime").find(":selected").val();
    totime = $("#toTime").find(":selected").val();
    from_sensor_id = $("#from_sensor_id").find(":selected").val();
    to_sensor_id = $("#to_sensor_id").find(":selected").val();
    table = $("#table").find(":selected").val();
    column = $("#column").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/multiplegetdata/" + from_sensor_id + "/" + to_sensor_id + "/" + table + "/" + fromtime + "/" + totime + "/" + column,
        dataType: "json",
        success: function (data) {
            GraphSetup(data.data, column)
        }
    });
})
function GraphSetup(data, column) {
    maindata = []
    dataPoints = []
    enddata = []
    // Data grouped into several sub arrays grouped by sensor id
    if (column == "max_humid") {
        for (i = 1; i < data.length; i++) {
            if (i == 1) {
                dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].max_humid, sensor: data[i - 1].sensor })
            }
            if (data[i - 1].sensor_id == data[i].sensor_id) {
                dataPoints.push({ x: new Date(data[i].date), y: data[i].max_humid, sensor: data[i].sensor })
            }
            if (data[i - 1].sensor_id != data[i].sensor_id) {
                enddata.push(dataPoints)
                dataPoints = []
                dataPoints.push({ x: new Date(data[i].date), y: data[i].max_humid, sensor: data[i].sensor })
            }
            if (i == (data.length - 1)) {
                enddata.push(dataPoints)
            }
        }
    }
    if (column == "min_humid") {
        for (i = 1; i < data.length; i++) {
            if (i == 1) {
                dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].min_humid, sensor: data[i - 1].sensor })
            }
            if (data[i - 1].sensor_id == data[i].sensor_id) {
                dataPoints.push({ x: new Date(data[i].date), y: data[i].min_humid, sensor: data[i].sensor })
            }
            if (data[i - 1].sensor_id != data[i].sensor_id) {
                enddata.push(dataPoints)
                dataPoints = []
                dataPoints.push({ x: new Date(data[i].date), y: data[i].min_humid, sensor: data[i].sensor })
            }
            if (i == (data.length - 1)) {
                enddata.push(dataPoints)
            }
        }
    }
    if (column == "average_humid") {
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
    }
    if (column == 'max_temp') {
        for (i = 1; i < data.length; i++) {
            if (i == 1) {
                dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].max_temp, sensor: data[i - 1].sensor })
            }
            if (data[i - 1].sensor_id == data[i].sensor_id) {
                dataPoints.push({ x: new Date(data[i].date), y: data[i].max_temp, sensor: data[i].sensor })
            }
            if (data[i - 1].sensor_id != data[i].sensor_id) {
                enddata.push(dataPoints)
                dataPoints = []
                dataPoints.push({ x: new Date(data[i].date), y: data[i].max_temp, sensor: data[i].sensor })
            }
            if (i == (data.length - 1)) {
                enddata.push(dataPoints)
            }
        }
    }
    if (column == 'min_temp') {
        for (i = 1; i < data.length; i++) {
            if (i == 1) {
                dataPoints.push({ x: new Date(data[i - 1].date), y: data[i - 1].min_temp, sensor: data[i - 1].sensor })
            }
            if (data[i - 1].sensor_id == data[i].sensor_id) {
                dataPoints.push({ x: new Date(data[i].date), y: data[i].min_temp, sensor: data[i].sensor })
            }
            if (data[i - 1].sensor_id != data[i].sensor_id) {
                enddata.push(dataPoints)
                dataPoints = []
                dataPoints.push({ x: new Date(data[i].date), y: data[i].min_temp, sensor: data[i].sensor })
            }
            if (i == (data.length - 1)) {
                enddata.push(dataPoints)
            }
        }
    }
    if (column == "average_temp") {
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
    }
    // The group array is sorted by date ASC order
    enddata.sort(function (a, b) {
        return b.date - a.date;
    });
    for (i = 0; i < enddata.length; i++) {
        temparr =
        {
            type: "line",
            showInLegend: true,
            name: enddata[i][0].sensor,
            markerType: "square",
            xValueFormatString: "YYYY-MM-DD HH:MM:ss",
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
    // Running graph creation
    NewGraph(maindata)
}
function NewGraph(data) {
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title: {
            text: "Results"
        },
        axisX: {
            valueFormatString: "YYYY-MM-DD",
            crosshair: {
                enabled: true,
                snapToDataPoint: true
            }
        },
        axisY: {
            title: "Number of Visits",
            includeZero: true,
            crosshair: {
                enabled: true
            }
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            verticalAlign: "bottom",
            horizontalAlign: "left",
            dockInsidePlotArea: true,
            itemclick: toogleDataSeries
        },
        data: data
    });
    chart.render();

    function toogleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        } else {
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}

$("#table").change(function () {
    var table = $(this).find(":selected").val();
    var sensor_id = $("#from_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/gettime/" + table + "/" + sensor_id,
        dataType: "json",   //expect html to be returned
        success: function (data) {
            $("#fromTime").empty();
            $("#toTime").empty();
            $.each(data.date, function (key) {
                $("#fromTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>`)
                $("#toTime").append(`
                <option value="${data.date[key]}">${data.date[key]}</option>`)
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage)
        }
    });
})

$("#from_sensor_id").change(function () {
    var table = $("#table").find(":selected").val();
    var sensor_id = $("#from_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/gettime/" + table + "/" + sensor_id,
        dataType: "json",   //expect html to be returned
        success: function (data) {
            $("#fromTime").empty();
            $("#toTime").empty();
            $.each(data.date, function (key) {
                $("#fromTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
                $("#toTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage)
        }
    });
})

$("#to_sensor_id").change(function () {
    var table = $("#table").find(":selected").val();
    var sensor_id = $("#to_sensor_id").find(":selected").val();
    $.ajax({
        type: "GET",
        url: "/gettime/" + table + "/" + sensor_id,
        dataType: "json",   //expect html to be returned
        success: function (data) {
            $("#fromTime").empty();
            $("#toTime").empty();
            $.each(data.date, function (key) {
                $("#fromTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
                $("#toTime").append(`
            <option value="${data.date[key]}">${data.date[key]}</option>`)
            })
        },
        error: function (jqXhr, textStatus, errorMessage) {
            console.log(errorMessage)
        }
    });
})

