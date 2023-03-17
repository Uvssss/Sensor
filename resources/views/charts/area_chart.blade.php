@extends('wrapper')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div id="humidareaContainer" style="height:370px; width: 100%;"></div>
        <div id="tempareaContainer" class="py-3" style="height:370px; width: 100%;"></div>
    </div>
    <div class="container pt-4 flex_center">
        <div class="row">
            <div class="col">
                <button class="btn btn-info mr-2"><a href="/home/linecharts" style="color: white">Line Charts</a></button>
            </div>
            <div class="col">
                <button class="btn btn-info"><a href="/home" style="color: white">Location Charts</a></button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset ('js/homeCharts/area_charts.js')}}"></script>
@endsection
