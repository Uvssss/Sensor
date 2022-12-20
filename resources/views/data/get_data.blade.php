@extends('wrapper')
@section('content')

<div class=" container-fluid pt-md-6" >
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('hello') }}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <label for="table">Select table</label>
                        <select class="custom-select" name="table" id="table">
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
                </div>
                <div class="row">
                    <div class="col">
                        <label for="From Time"> Select start time</label>
                        <select class="custom-select" name="fromTime" id="fromTime"></select>
                    </div>
                    <div class="col">
                        <label for="toTime">Select end time</label>
                        <select class="custom-select" name="toTime" id="toTime"></select>
                    </div>
                </div>
                <div class="" style="text-align: center;">
                    <button id="button" class="btn btn-primary">Show Data</button>
                </div>
            </div>
        </div>
</div>
<div id="chartContainer" style="height: 500px; width: 100%;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="{{asset ('js/ajax.js')}}"></script>
@endsection
