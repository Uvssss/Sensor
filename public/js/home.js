
$(document).ready(function(){
    graphAjax()
})

function graphAjax(){
    $.ajax({
        type: "GET",
        url: "/home/circle-chart",
        dataType:"json",
        success: function(data)
        {
            GraphSetup(data.data)
        }
    });
}

function areaAjax(){
    $.ajax({
        type: "GET",
        url: "/home/area-chart",
        dataType:"json",
        success: function(data)
        {
            // GraphSetup(data.data)
        }
    });
}
function lineAjax(){
    $.ajax({
        type: "GET",
        url: "/home/line-chart",
        dataType:"json",
        success: function(data)
        {
            // GraphSetup(data.data)
        }
    });
}
function ColumnAjax(){
    $.ajax({
        type: "GET",
        url: "/home/column-chart",
        dataType:"json",
        success: function(data)
        {
            // GraphSetup(data.data)
        }
    });
}


function GraphSetup(data){
    console.log(data)
    endarray=[]
    for(i=0;i<data.length;i++){
        endarray.push({ y:  parseFloat(data[i][0]).toFixed(2), label: data[i][1] })
    }
    // console.log(endarray)
    GraphBuilder(endarray)
}

function GraphBuilder(data){
    var chart = new CanvasJS.Chart("graphContainer", {
        theme: "light2", // "light1", "light2", "dark1", "dark2"
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
            dataPoints:data
        }]
    });
    chart.render();
}

function lineBuilder(data){

    var chart = new CanvasJS.Chart("lineContainer", {
        animationEnabled: true,
        title:{
            text: "Daily High Temperature at Different Beaches"
        },
        axisX: {
            valueFormatString: "DD MMM,YY"
        },
        axisY: {
            title: "Temperature (in °C)",
            suffix: " °C"
        },
        legend:{
            cursor: "pointer",
            fontSize: 16,
            itemclick: toggleDataSeries
        },
        toolTip:{
            shared: true
        },
        data: [{
            name: "Myrtle Beach",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 31 },
            ]
        },
        {
            name: "Martha Vineyard",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 20 },

            ]
        },
        {
            name: "Nantucket",
            type: "spline",
            yValueFormatString: "#0.## °C",
            showInLegend: true,
            dataPoints: [
                { x: new Date(2017,6,24), y: 22 },
            ]
        }]
    });
    chart.render();

    function toggleDataSeries(e){
        if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else{
            e.dataSeries.visible = true;
        }
        chart.render();
    }

}

function columnBuilder(data){
    var chart = new CanvasJS.Chart("columnContainer", {
        animationEnabled: true,
        exportEnabled: true,
        theme: "light1", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Simple Column Chart with Index Labels"
        },
          axisY: {
          includeZero: true
        },
        data: [{
            type: "column", //change type to bar, line, area, pie, etc
            //indexLabel: "{y}", //Shows y value on all Data Points
            indexLabelFontColor: "#5A5757",
              indexLabelFontSize: 16,
            indexLabelPlacement: "outside",
            dataPoints: [
                { x: 10, y: 71 },
                { x: 20, y: 55 },
                { x: 30, y: 50 },
                { x: 40, y: 65 },
                { x: 50, y: 92, indexLabel: "\u2605 Highest" },
                { x: 60, y: 68 },
                { x: 70, y: 38 },
                { x: 80, y: 71 },
                { x: 90, y: 54 },
                { x: 100, y: 60 },
                { x: 110, y: 36 },
                { x: 120, y: 49 },
                { x: 130, y: 21, indexLabel: "\u2691 Lowest" }
            ]
        }]
    });
    chart.render();
}

function AreaBuilder(data){
var chart = new CanvasJS.Chart("areaContainer", {
	exportEnabled: true,
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Temperature Variation - Ladakh vs Chandigarh"
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
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "rangeArea",
		showInLegend: true,
		name: "Ladakh",
		markerSize: 0,
		yValueFormatString: "#0.## °C",
		dataPoints: [
			{ x: new Date(2017, 03, 01), y: [05, 21] },
		]
	},
	{
		type: "rangeArea",
		showInLegend: true,
		name: "Chandigarh",
		markerSize: 0,
		yValueFormatString: "#0.## °C",
		dataPoints: [
			{ x: new Date(2017, 03, 01), y: [15, 31] },

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
