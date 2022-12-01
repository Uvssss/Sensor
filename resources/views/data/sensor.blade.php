@extends('wrapper')
@section('content')
<div class="container pt-7 pt-md-8">
    <div style="text-align:center;">
        <button class="btn btn-success" onclick="showsensorform()">Show/Hide Form</button>
    </div>
    <div id="sensortable" class="py-5">
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Sensor Name</th>
                    <th>Sensor Location</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensor as $sensor)
                <tr onclick="SensorUpdateView({{$sensor->id}});">
                    <td>{{$sensor->sensor}}</td>
                    <td>{{$sensor->location}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div id="sensorform" class="d-none py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register new Sensor') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/sensors">
                            @csrf
                            <div class="form-group row">
                                <label for="sensor" class="col-md-4 col-form-label text-md-right">Sensor Name</label>

                                <div class="col-md-6">
                                    <input id="sensor" type="text" class="form-control @error('sensor') is-invalid @enderror" name="sensor" value="{{ old('sensor') }}" required autofocus>

                                    @error('sensor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                <div class="col-md-6">
                                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" required>

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-0 form-group row">
                                <div class="col-md-8s offset-md-5">
                                    <button  type="submit" class="btn btn-primary">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- Add ajax later for table data --}}
