@extends('wrapper')
@section('content')
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-4">
                <input type="text" class="form-control" id="restore_value" placeholder="Search">
            </div>
            <div class="col-md-6 col-md-4">
                <select class="custom-select" style="height:52px" id="restore_column">
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
                                <b><a href="/restoreuser/{{$user->users_id}}">Restore User</a></b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pl-6">
                        <div class="row ">
                            <div class="col">
                                <p class="card-text mb-0"><b>Email: </b> {{$user->email}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text mb-0"><b>Created At : </b>{{$user->created_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text mb-0"><b>Permission level:</b> {{$user->Status}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text mb-0"><b>Last updated : </b>{{$user->updated_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="card-text mb-0"><b>Deleted At : </b>{{$user->deleted_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
    <div class="text-center pt-2">{{ $results->links() }}</div>
    <script src="{{ asset('js/search.js') }}"></script>
@endsection
