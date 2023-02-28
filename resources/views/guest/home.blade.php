@extends('wrapper')
@section('content')
<div class="container-fluid pt-5 pt-md-6">
    <div class="row">
        <div class="col" >
            <div class="bg-white" style="width: 500px;">
                @if($perms_id == 1)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Singular sensor data shown in a graph</b></div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Multiple sensor data shown in a graph.</b></div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Profile</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Your profile and its settings</b></div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Just Sensor name and location</b></div>
                    </a>
                    <a href="/about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">About Us</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Something about us</b></div>
                    </a>
                @endif
                @if($perms_id==2)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Singular sensor data shown in a graph</b></div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Multiple sensor data shown in a graph</b></div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Profile</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Your profile and its settings</b></div>
                    </a>
                    <a href="/sensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Sensors</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Sensor insertion, Sensor updating,all sensors and its location </b></div>
                    </a>
                    <a href="/insertdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Insert Data</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Manually add or automatically add humidity and temperature</b> </div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Just Sensor name and location</b></div>
                    </a>
                    <a href="/about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">About Us</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Something about us</b></div>
                    </a>
                @endif
                @if($perms_id >2)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Singular sensor data shown in a graph</b></div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Multiple sensor data shown in a graph.</b></div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Profile</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Your profile and its settings</b></div>
                    </a>
                    <a href="/sensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Sensors</strong>

                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Sensor insertion, Sensor updating,all sensors and its location </b></div>
                    </a>
                    <a href="/insertdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Insert Data</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Manually add or automatically add humidity and temperature </b></div>
                    </a>
                    <a href="/operator" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Operator</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Username and the users permision level, Can be used to upgrade or downgrade user's permision level</b></div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Just Sensor name and location</b></div>
                    </a>
                    <a href="about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1" style="color:black;">About Us</strong>
                        </div>
                        <div class="col-10 mb-1 small"><b style="color:black;">Something about us</b></div>
                    </a>
                @endif
            </div>
        </div>
        <div class="col">
            <h2>I Dont know to put here</h2>
        </div>
    </div>
</div>
@endsection
