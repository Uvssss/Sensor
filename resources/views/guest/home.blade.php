@extends('wrapper')
@section('content')
<div class=" flex_center container-fluid" >
    <div class="container-fluid">
    <div>
        <button id="prev"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
            </svg>
        </button>
        <button class="" id="next"><svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
        </button>
        </div>
            <div id="graphContainer" class="d-none" style="height:370px; width: 100%;"></div>
            <div id="columnContainer" class="d-none"  style="height:370px; width: 100%;"></div>
            <div id="humidlineContainer" class="d-none" style="height:370px; width: 100%;"></div>
            <div id="templineContainer" class="d-none"  style="height:370px; width: 100%;"></div>
            <div id="humidareaContainer" class="d-none" style="height:370px; width: 100%;"></div>
            <div id="tempareaContainer" class="d-none" style="height:370px; width: 100%;"></div>
    </div>
</div>
<script src="{{asset ('js/home.js')}}"></script>
@endsection
