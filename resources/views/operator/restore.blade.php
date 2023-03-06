@extends('wrapper')
@section('content')
<div class="container pt-7 pt-md-8">
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
    </div>
@endsection
