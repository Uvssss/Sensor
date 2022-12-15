@extends('wrapper')
@section('content')

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
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="{{asset ('js/ajax.js')}}"></script>
@endsection
