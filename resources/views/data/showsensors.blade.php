@extends('wrapper')
@section('content')
<div class="container-fluid pt-7 pt-md-6">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-4">
                <input type="text" class="form-control" id="search" placeholder="Search">
            </div>
            <div class="col-md-6 col-md-4">
                <select class="custom-select" style="height:52px" id="searchby">
                    <option value="sensor">Search By Sensor name</option>
                    <option value="location">Search By Sensor location</option>
                </select>
            </div>
        </div>
        <div class="text-center pt-2">
            <button class="btn btn-primary" onclick="SearchByName()">Submit</button>
        </div>
    </div>
    <div class="row">
        @foreach ($sensors as $sensor)
            <div class="col-md-6 col-md-4 pt-2">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Sensor Name : {{$sensor->sensor}}</h5>
                      <p class="card-text">Location : {{$sensor->location}}</p>
                      <div class="row">
                        <div class="col-md-6 col-md-4">
                            <p class="card-text">Created At : {{$sensor->created_at}}</p>
                        </div>
                        <div class="col-md-6 col-md-4">
                            <p class="card-text">Last Updated : {{$sensor->updated_at}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        @endforeach
    </div>
    <div class="center">
        {{ $sensors->links() }}
    </div>
</div>
<script src="{{asset ('js/sensor.js')}}"></script>
@endsection
