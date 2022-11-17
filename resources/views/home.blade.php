@extends('wrapper')
@section('content')
<h5>Make a dashboard for 4 main activities that you are able to click and get to there</h5>
    <div style="text-align: center;" class=" pt-7 pt-md-8 container">
        <h1>Dashboard</h1>
        <div class="row ">
            <h1>Looks garbage must change later</h1>
            <div onclick="changeurl('settings')" class="hoverDiv col text-cente m-2">
                <div class="p-5">
                    <h3>Profile settings</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div onclick="changeurl('sensors')"   class=" hoverDiv col text-center m-2">
                <div class="p-5">
                <h3>Sensors</h3>
                <p>Lorem ipsum dolor sit amet.</p>
            </div>
            </div>
        </div>
        <div class="row">
            <div onclick="changeurl('getdata')"  class=" hoverDiv col  text-center m-2">
                <div class="p-5">
                    <h3 > Get Data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
            <div onclick="changeurl('insertdata')"  class="hoverDiv col  text-center m-2">
                <div class="p-5">
                    <h3 >Insert data</h3>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>

            </div>
        </div>
    </div>
@endsection
