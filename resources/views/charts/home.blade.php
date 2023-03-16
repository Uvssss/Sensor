@extends('wrapper')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div id="graphContainer"  style="height:370px; width: 100%;"></div>
        <div id="columnContainer" class="pt-3"  style="height:370px; width: 100%;"></div>
    </div>
    <div class="container">

    </div>
</div>
<script src="{{asset ('js/homeCharts/location_charts.js')}}"></script>
@endsection
