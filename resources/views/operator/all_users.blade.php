@extends('wrapper')
@section('content')
<div class="container-fluid">
    <div class="container">
        @if ($results->count()==0)
            {{-- add no results --}}
        @else
            @foreach ($results as $user)
            <div class="py-3">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col">
                                <p><b>Username:</b> {{$user->name}}</p>
                            </div>
                            <div class="col" >
                                <p style="text-align:right">DELETE UPGRADE DOWNGRADE</p>
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
                        <div class="row ">
                            <div class="col">
                                <p><b>Permission level:</b> {{$user->Status}}</p>
                            </div>
                            <div class="col">
                                <p class="card-text"><b>Last updated : </b>{{$user->updated_at}}</p>
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
