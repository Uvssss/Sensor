
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
        theme: "light1", // "light1", "light2", "dark1", "dark2"
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
