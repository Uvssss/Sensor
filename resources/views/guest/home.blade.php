@extends('wrapper')
@section('content')
<div class="container-fluid pt-5" >
    <div class="container-fluid">
        <div class="center container-fluid">
            <div class="row ">
                <div class="col">
                    <div id="graphContainer" class="" style="height:370px; width: 100%;"></div>
                </div>
                <div class="col">
                    <div id="columnContainer" class="" style="height:370px; width: 100%;"></div>
                </div>
            </div>
            <div class="py-3">
                <div id="templineContainer" class="" style="height:370px; width: 100%;"></div>
            </div>
            <div class="py-3">
                <div id="humidlineContainer" class="" style="height:370px; width: 100%;"></div>

            </div>
            <div class="py-3">
                <div id="tempareaContainer" class="" style="height:370px; width: 100%;"></div>
            </div>
            <div class="pt-3">
                <div id="humidareaContainer" class="" style="height:370px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset ('js/home.js')}}"></script>
@endsection
