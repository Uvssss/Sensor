@extends('wrapper')
@section('content')
    <div style="text-align: center;" class=" pt-7 pt-md-8 container">
        <h5>Make a dashboard for 4 main activities that you are able to click and get to there</h5>
        <h1>Dashboard</h1>
        <h1>Looks garbage must change later</h1>
        <div class="row ">
            <div onclick="changeurl('settings')" class=" div col text-center m-2">
                <div class="p-5">
                    <h3>Profile settings</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div onclick="changeurl('sensors')" class=" div  col text-center m-2">
                <div class="p-5">
                <h3>Sensors</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="row">
            <div onclick="changeurl('getdata')" class="  col div  text-center m-2">
                <div class="p-5">
                    <h3 > Get Data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
            <div onclick="changeurl('insertdata')" class=" col div text-center m-2">
                <div class="p-5">
                    <h3 >Insert data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
