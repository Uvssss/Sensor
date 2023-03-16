@extends('wrapper')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div id="humidareaContainer" style="height:370px; width: 100%;"></div>
        <div id="tempareaContainer" style="height:370px; width: 100%;"></div>
    </div>
    <div class="container">

    </div>
</div>
<script src="{{asset ('js/homeCharts/area_charts.js')}}"></script>
@endsection
