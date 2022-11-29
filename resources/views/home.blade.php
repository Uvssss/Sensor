@extends('wrapper')
@section('content')
    <div style="text-align: center;" class=" pt-7 pt-md-8 container">
        <h1>Dashboard</h1>
        <div class="row ">
            <div onclick="changeurl('settings')" class=" dashboard col text-center m-1">
                <div class="p-5">
                    <h3>Profile settings</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div onclick="changeurl('sensors')" class=" dashboard  col text-center m-1">
                <div class="p-5">
                <h3>Sensors</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="row">
            <div onclick="changeurl('getdata')" class="  col dashboard  text-center m-1">
                <div class="p-5">
                    <h3 > Get Data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
            <div onclick="changeurl('insertdata')" class=" col dashboard text-center m-1">
                <div class="p-5">
                    <h3 >Insert data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
