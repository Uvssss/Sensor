@extends('wrapper')
@section('content')
<div class="container-fluid pt-7 pt-md-6" >
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h3 style="text-align:center">Get data for mutiple sensors</h3>
                    <div class="row">
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="table">Select table</label>
                            <div>
                                <select class="custom-select " name="table" id="table">
                                    <option value="hourly">Hourly</option>
                                    <option value="daily">Daily</option>
                                    <option value="weekly">Weekly</option>
                                    <option value="monthly">Monthly</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="column">Select column</label>
                            <div>
                                <select class="custom-select " name="column" id="column">
                                    <option value="Average_temp">Average temperature</option>
                                    <option value="Average_humid">Average humidity</option>
                                    <option value="min_humid">Lowest humidity</option>
                                    <option value="min_temp">Lowest temperature</option>
                                    <option value="max_temp">Highest temperature</option>
                                    <option value="max_humid">Highest humidity</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="Sensor">Select From Sensor</label>
                            <div>
                                <select class="custom-select" name="from_sensor_id" id="from_sensor_id">
                                    @foreach ($sensors as $sensor)
                                    <option value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="Sensor">Select To Sensor</label>
                            <div>
                                <select class="custom-select" name="to_sensor_id" id="to_sensor_id">
                                    @foreach ($sensors as $sensor)
                                    <option value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="From Time"> Select start time</label>
                            <div class="">
                                <select class="custom-select " name="fromTime" id="fromTime"></select>
                            </div>
                        </div>
                        <div class="col-md-6 col-md-4">
                            <label class="col-form-label" for="toTime">Select end time</label>
                            <div class="">
                                <select class="custom-select" name="toTime" id="toTime"></select>
                            </div>
                        </div>
                    </div>
                    <div class="pt-4 text-center" >
                        <button id="multiple_button" class="btn btn-primary">Show Data</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script src="{{asset ('js/multiple_ajax.js')}}"></script>
@endsection
