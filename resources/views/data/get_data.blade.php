@extends('wrapper')
@section('content')
<div class="container-fluid pt-7 pt-md-8">
    <h2>GET data via ajax take sensor name and sensor location to get id for it. when button pressed show table data  and print it,add profile setings aand that sort
    </h2>
    <h2>Add 2 selects for location and sensor name to get id
    </h2>
    <h2>get time period from and to</h2>
    <h2>after choosing sensor id , show graphs using the time period</h2>
</div>

<h5>something like this</h5>

<div class=" container pt-7 pt-md-8" >
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
<?php

$dataPoints1 = array(
    array("label"=> "2010", "y"=> 36.12),
    array("label"=> "2011", "y"=> 34.87),
    array("label"=> "2012", "y"=> 40.30),
    array("label"=> "2013", "y"=> 35.30),
    array("label"=> "2014", "y"=> 39.50),
    array("label"=> "2015", "y"=> 50.82),
    array("label"=> "2016", "y"=> 74.70)
);
$dataPoints2 = array(
    array("label"=> "2010", "y"=> 64.61),
    array("label"=> "2011", "y"=> 70.55),
    array("label"=> "2012", "y"=> 72.50),
    array("label"=> "2013", "y"=> 81.30),
    array("label"=> "2014", "y"=> 63.60),
    array("label"=> "2015", "y"=> 69.38),
    array("label"=> "2016", "y"=> 98.70)
);

?>
<script>
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2",
        title:{
            text: "Average Amount Spent on Real and Artificial X-Mas Trees in U.S."
        },
        axisY:{
            includeZero: true
        },
        legend:{
            cursor: "pointer",
            verticalAlign: "center",
            horizontalAlign: "right",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Real Trees",
            indexLabel: "{y}",
            yValueFormatString: "$#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        },{
            type: "column",
            name: "Artificial Trees",
            indexLabel: "{y}",
            yValueFormatString: "$#0.##",
            showInLegend: true,
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
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
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
