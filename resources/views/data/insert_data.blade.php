@extends('wrapper')
@section('content')
<div class="container-fluid pt-7 pt-md-8">
    <h2>GET data via ajax take sensor name and sensor location to get id for it. when button pressed show table data  and print it,add profile setings aand that sort
    </h2>
    <h2>Add 2 selects for location and sensor name to get id
    </h2>
    <h2>make a form for data insert  using previous to h2 tags in mind for humidity and temp</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add new parameters') }}</div>

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
                                <option selected>Choose sensor for data insertion</option>
                                @foreach ($sensors as $sensor)
                                <option name="" value="{{$sensor->id}}">{{$sensor->sensor}}</option>
                                @endforeach
                               </select>
                            </div>
                        </div>

                        <div class="mb-0 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="" class="btn btn-primary">
                                    {{ __('Add new data row') }}
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
