@extends('wrapper')
@section('content')
<div class="container pt-7 pt-md-8">
    <div style="text-align:center;">
        <button class="btn btn-success" onclick="showsensorform()">Show/Hide Form</button>
    </div>
    <div id="sensortable" class="py-5">
        <h2 style="text-align: center">All sensors</h2>
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>Sensor Name</th>
                    <th>Sensor Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensor as $sensor)
                <tr>
                    <td>{{$sensor->sensor}}</td>
                    <td>{{$sensor->location}}</td>
                    <td><a href="/deletesensor/{{$sensor->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg></a>
                      <a href="/update-sensors/{{$sensor->id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg></a>
                    </td>
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
                        <form method="POST" action="/api/sensors">
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
<script src="{{asset ('js/checks.js')}}"></script>
@endsection
