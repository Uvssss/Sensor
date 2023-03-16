@extends('wrapper')
@section('content')
<div class="container-fluid" >
    <div class="container-fluid">
        <div>
            <button id="prev"><a href="/home/linecharts"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg></a>
            </button>
            <button class="" id="next">
                <a href="/home"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg></a>
            </button>
        </div>
        <div>
            <div id="humidareaContainer" style="height:370px; width: 100%;"></div>
            <div id="tempareaContainer" style="height:370px; width: 100%;"></div>
        </div>
    </div>
</div>
<script src="{{asset ('js/homeCharts/area_charts.js')}}"></script>
@endsection