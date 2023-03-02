@extends('wrapper')
@section('content')
<div class="container-fluid pt-5 pt-md-6">
    <div class="row">
        <div class="col" ></div>
        <div class="col"></div>
            <div class="row">
                <div class="col">
                    <div id="graphContainer" style="height: 370px; width: 100%;"></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{asset ('js/home.js')}}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
