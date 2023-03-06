@extends('wrapper')
@section('content')
<div class="container pt-md-7">
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
        <h2 class="pt-3" style="text-align: center">Active users</h2>
        <table class="table table-hover table-light">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Permision level</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $result)
                <tr>
                    <td>{{$result->name}}</td>
                    <td>{{$result->Status}}</td>
                    <td><a href="/deleteuser/{{$result->users_id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg></a>
                      <a href="/downgradeuser/{{$result->users_id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                      </svg></a>
                      <a href="/upgradeuser/{{$result->users_id}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 0 0 8a8 8 0 0 0 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                      </svg></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="text-center">{{ $results->links() }}</div>
<script src="{{asset ('js/sensor.js')}}"></script>
@endsection
