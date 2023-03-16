@extends('wrapper')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div id="humidlineContainer"  style="height:370px; width: 100%;"></div>
        <div id="templineContainer"   style="height:370px; width: 100%;"></div>
    </div>
    <div class="container">

    </div>
</div>
<script src="{{asset ('js/homeCharts/line_charts.js')}}"></script>
@endsection
