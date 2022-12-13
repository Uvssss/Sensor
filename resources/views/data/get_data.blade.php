@extends('wrapper')
@section('content')

{{-- I can iterate this, plus this graph is good. --}}
<?php
$dataPoints = array(
    // foreach ($data as $key => $value) {
    //     array("y" => 3373.64, "label" => "Germany" ),,
    // }
	array("y" => 3373.64, "label" => "Germany" ),
	array("y" => 2435.94, "label" => "France" ),
	array("y" => 1842.55, "label" => "China" ),
	array("y" => 1828.55, "label" => "Russia" ),
	array("y" => 1039.99, "label" => "Switzerland" ),
	array("y" => 765.215, "label" => "Japan" ),
	array("y" => 612.453, "label" => "Netherlands" ),
    array("y" => 712.453, "label" => "test" )
);

?>
<div class=" container pt-7 pt-md-8" >
    <div class="row">
        <div class="col">
            <label for="table">Select table</label>
            <select class="custom-select" name="table" id="table">
                <option value="currently">Currently</option>
                <option value="hourly">Hourly</option>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
        <div class="col">
            <label for="Sensor">Select Sensor</label>
            <select class="custom-select" name="sensor_id" id="sensor_id">
                @foreach ($sensors as $sensor)
                <option value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <label for="From Time"> Select start time</label>
            <select class="custom-select" name="fromTime" id="fromTime"></select>
        </div>
        <div class="col">
            <label for="toTime">Select end time</label>
            <select class="custom-select" name="toTime" id="toTime"></select>
        </div>
    </div>
    <div class="py-2" style="text-align: center;">
        <button id="button" class="btn btn-primary">Show Data</button>
    </div>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
<script>
window.onload = function()
{
     var chart = new CanvasJS.Chart("chartContainer",
     {
        animationEnabled: true,
        theme: "light2",
        title:
        {
            text: "Gold Reserves"
        },
        axisY:
        {
            title: "Gold Reserves (in tonnes)"
        },
        data:
        [{
            type: "column",
            yValueFormatString: "#,##0.## tonnes",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
 });
 chart.render();
 }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="{{asset ('js/ajax.js')}}"></script>
@endsection
