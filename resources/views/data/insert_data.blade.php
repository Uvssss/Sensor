@extends('wrapper')
@section('content')
<div class="container-fluid ">
    <div class="container pb-5" style="text-align: center;">
        <button id="sensorformbutton" onclick="sensordataform()" class="btn btn-primary">Show/Hide Manual data insertion form</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="manualinsert" class="card d-none">
                <div class="card-header">{{ __('Add new data') }}</div>

                <div class="card-body">

                    <form method="POST" action="/insertdata">
                        @csrf
                        <div class="form-group row">
                            <label for="temp" class="col-md-4 col-form-label text-md-right">{{ __('Temperature') }}</label>
                            <div class="col-md-6">
                                <input id="temp" type="text" class="form-control @error('text') is-invalid @enderror" name="temp" required autocomplete="email">

                                @error('temp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="humid" class="col-md-4 col-form-label text-md-right">{{ __('Humidity') }}</label>

                            <div class="col-md-6">
                                <input id="humid" type="text" class="form-control @error('humid') is-invalid @enderror" name="humid" required autocomplete="">

                                @error('humid')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sensor name') }}</label>

                            <div class="col-md-6">
                               <select class="custom-select" name="sensor_id" id="sensor">
                                @foreach ($sensors as $sensor)
                                <option name="" value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="mb-0 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button onclick="" id="" class="btn btn-primary">
                                    {{ __('Add data manually') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="autoinsert" class="card">
                <div class="card-header">{{ __('Get data and post from sensor') }}</div>

                <div class="card-body">

                    <form method="POST" action="/sensordata">
                        @csrf
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Sensor name') }}</label>

                            <div class="col-md-6">
                               <select class="custom-select" name="sensor_id" id="sensor">
                                @foreach ($sensors as $sensor)
                                <option name="" value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>
                        <div class="mb-0 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button id="insertdatabutton" class="btn btn-primary">
                                    {{ __('Add data from Sensor ') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
