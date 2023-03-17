@extends('wrapper')
@section('content')
    <div class="container">
        <div class="container">
            <div id="sensortable" class="">
                <div class="row">
                    <div class="col-md-6 col-md-4">
                        <input type="text" class="form-control" id="operator_value" placeholder="Search">
                    </div>
                    <div class="col-md-6 col-md-4">
                        <select class="custom-select" style="height:52px" id="operatorcolumn">
                            <option value="email">Search By Email</option>
                            <option value="name">Search By Username</option>
                        </select>
                    </div>
                </div>
                <div class="text-center pt-2">
                    <button class="btn btn-primary" onclick="OperatorSearch()">Submit</button>
                </div>
            </div>
            @if ($results->count() == 0)
                <div class="center">
                    <div class="card flex_center">
                        <div class="card-body">
                            <h3>There are no other users.</h3>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    @foreach ($results as $user)
                        <div class="col-md-6 col-md-4 pt-2">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">User Name : {{ $user->name }}</h5>
                                    <div class="row">
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Email : {{ $user->email }}</p>
                                        </div>
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Permission Level : {{ $user->Status }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Created At : {{ $user->created_at }}</p>
                                        </div>
                                        <div class="col-md-6 col-md-4">
                                            <p class="card-text">Last Updated : {{ $user->updated_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            @endif
        </div>
    </div>
    <div class="text-center">{{ $results->links() }}</div>
    <script src="{{ asset('js/sensor.js') }}"></script>
@endsection
