@extends('wrapper')
@section('content')
<div class="container-fluid pt-5 pt-md-6">
    <div class="row">
        <div class="col" >
            <div class="bg-white" style="width: 500px;">
                @if($perms_id == 1)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Singular sensor data shown in a graph</div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Multiple sensor data shown in a graph.</div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Profile</strong>
                        </div>
                        <div class="col-10 mb-1 small">Your profile and its settings</div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small">Just Sensor name and location</div>
                    </a>
                    <a href="/about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">About Us</strong>

                        </div>
                        <div class="col-10 mb-1 small">Something about us</div>
                    </a>
                @endif
                @if($perms_id==2)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Singular sensor data shown in a graph</div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Multiple sensor data shown in a graph.</div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Profile</strong>

                        </div>
                        <div class="col-10 mb-1 small">Your profile and its settings</div>
                    </a>
                    <a href="/sensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Sensors</strong>

                        </div>
                        <div class="col-10 mb-1 small">Sensor insertion, Sensor updating,all sensors and its location </div>
                    </a>
                    <a href="/insertdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Insert Data</strong>
                        </div>
                        <div class="col-10 mb-1 small">Manually add or automatically add humidity and temperature </div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small">Just Sensor name and location</div>
                    </a>
                    <a href="/about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">About Us</strong>

                        </div>
                        <div class="col-10 mb-1 small">Something about us</div>
                    </a>
                @endif
                @if($perms_id >2)
                    <a href="/showdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Singular sensor data shown in a graph</div>
                    </a>
                    <a href="/showdatamultiple" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show multiple data</strong>

                        </div>
                        <div class="col-10 mb-1 small">Multiple sensor data shown in a graph.</div>
                    </a>
                    <a href="/profile" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Profile</strong>

                        </div>
                        <div class="col-10 mb-1 small">Your profile and its settings</div>
                    </a>
                    <a href="/sensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Sensors</strong>

                        </div>
                        <div class="col-10 mb-1 small">Sensor insertion, Sensor updating,all sensors and its location </div>
                    </a>
                    <a href="/insertdata" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Insert Data</strong>
                        </div>
                        <div class="col-10 mb-1 small">Manually add or automatically add humidity and temperature </div>
                    </a>
                    <a href="/operator" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Operator</strong>
                        </div>
                        <div class="col-10 mb-1 small">Username and the users permision level, Can be used to upgrade or downgrade user's permision level</div>
                    </a>
                    <a href="/showsensors" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">Show Sensors</strong>
                        </div>
                        <div class="col-10 mb-1 small">Just Sensor name and location</div>
                    </a>
                    <a href="about" class="list-group-item list-group-item-action py-3 lh-tight" aria-current="true">
                        <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">About Us</strong>
                        </div>
                        <div class="col-10 mb-1 small">Something about us</div>
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
