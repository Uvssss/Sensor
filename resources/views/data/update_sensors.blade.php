@extends('wrapper')
@section('content')
<div class="container pt-7 pt-md-8">
    <div id="sensorform" class=" py-5">
        <div class="row justify-content-center">
    <div class="col-md-8">
        {{-- Add OLD sensor name and loc, or do something that prevents from overwriting previous location and name to find id of that sensor --}}
                <div class="card">
                    <div class="card-header">{{ __('Update Sensor') }}</div>
                    <div class="card-body">
                        <form method="POST" action="/updatesensors/{{($id)}}">
                            @csrf
                            <div class="form-group row">
                                <label for="sensor" class="col-md-4 col-form-label text-md-right">New Sensor Name</label>

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
                                <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('New Location') }}</label>

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
                                        {{ __('Update') }}
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
<script src="{{asset ('js/checks.js')}}"></script>
@endsection
