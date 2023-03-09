@extends('wrapper')
@section('content')

<div class="container-fluid pt-7 pt-md-6" >
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
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
                            <label class="col-form-label" for="Sensor">Select Sensor</label>
                            <div>
                                <select class="custom-select" name="sensor_id" id="sensor_id">
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
                        <button id="button" class="btn btn-primary">Show Data</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="pt-3" id="chartContainer" style="height: 500px;"></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<script src="{{asset ('js/ajax.js')}}"></script>
@endsection
