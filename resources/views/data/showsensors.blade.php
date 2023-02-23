@extends('wrapper')
@section('content')
<div class="container-fluid pt-7 pt-md-6">
    <div>Search aria div</div>
    <div class="row">
        @foreach ($sensors as $sensor)
            <div class="col-md-6 col-md-4 pt-2">
                <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Sensor Name : {{$sensor->sensor}}</h5>
                      <p class="card-text">Location : {{$sensor->location}}</p>
                      <div class="row">
                        <div class="col">
                            <p class="card-text">Created At : {{$sensor->created_at}}</p>
                        </div>
                        <div class="col">
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
@endsection
