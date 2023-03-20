
@extends('wrapper')
@section('content')
<div class="container-fluid">
    <div class="container">
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
    </div>
        @if ($results->count()==0)
        <div class="container center">
            <div class="card">
                <div class="card-body">
                    <div class="center"><h2>No Users found</h2></div>
                </div>
            </div>
        @else
            @foreach ($results as $user)
            <div class="container py-2">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <p><b>Username:</b> {{$user->name}}</p>
                            </div>
                            <div class="col"style="text-align:right;" >
                                <b>
                                    <a href="/restoreuser/{{$user->users_id}}">Restore User</a>
                                </b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pl-6">
                        <div class="row ">
                            <div class="col">
                                <p class="card-text"><b>Email: </b> {{$user->email}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text"><b>Created At : </b>{{$user->created_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><b>Permission level:</b> {{$user->Status}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text"><b>Last updated : </b>{{$user->updated_at}}</p>
                            </div>
                            {{-- dump deleted at somewhere dunno where tho --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text"><b>Deleted At : </b>{{$user->deleted_at}}</p>
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
