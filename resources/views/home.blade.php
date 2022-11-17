@extends('wrapper')
@section('content')
<h5>Make a dashboard for 4 main activities that you are able to click and get to there</h5>
    <div style="text-align: center;" class=" pt-7 pt-md-8 container">
        <div class="row">
            <div onclick="changeurl('settings')"  style="background-color: greenyellow;" class="col text-center">Profile ettings</div>
            <div onclick="changeurl('sensors')"  style="background-color: lightblue;" class="col text-center">Sensors</div>
        </div>
        <div class="row">
            <div onclick="changeurl('getdata')"  class="col bg-danger text-center">Get Data</div>
            <div onclick="changeurl('insertdata')"  class="col bg-warning text-center">Insert data</div> {{-- add hover --}}
        </div>
    </div>
@endsection
