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
                <a href="/home/linecharts" style="color: white">
                <button class="btn btn-info mr-2">Line Charts</button></a>
            </div>
            <div class="col">
                <a href="/home" style="color: white">
                <button class="btn btn-info">Location Charts</button></a>
            </div>
        </div>
    </div>
</div>
<script src="{{asset ('js/homeCharts/area_charts.js')}}"></script>
@endsection
