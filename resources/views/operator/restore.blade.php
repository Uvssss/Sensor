@extends('wrapper')
@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-4">
                    <input type="text" class="form-control" id="" placeholder="Search">
                </div>
                <div class="col-md-6 col-md-4">
                    <select class="custom-select" style="height:52px" id="">
                        <option value="">Search By Sensor name</option>
                        <option value="">Search By Sensor location</option>
                    </select>
                </div>
            </div>
            <div class="text-center pt-2">
                <button class="btn btn-primary" onclick="">Submit</button>
            </div>
            @if ($results->count() == 0)
                <div class="center">
                    <div class="card flex_center">
                        <div class="card-body">
                            <h3>There are no deleted users.</h3>
                        </div>
                    </div>
                </div>
            @else
                <div class="">
                    @foreach ($results as $user)
                        <div class="pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">User Name : {{ $user->name }}</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Email : {{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Permission level : {{ $user->Status }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p class="card-text">Created At : {{ $user->created_at }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Last Updated : {{ $user->updated_at }}</p>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Deleted At : {{ $user->deleted_at }}</p>
                                        </div>
                                    </div>
                                    {{-- add actions --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">{{ $results->links() }}</div>
            @endif
        </div>
    </div>
@endsection
