@extends('wrapper')
@section('content')
<div class="container-fluid pt-5 pt-md-6">
    <div class="container-fluid pt-5">
                <div class="row center">
                    <div class="col-xl-6 col-xl-6">
                        <div id="graphContainer" class="mx-auto align-middle" style="height:550px; width: 100%;"></div>
                    </div>
                    <div class="col-xl-6 col-xl-6 mx-auto align-middle">
                        <div class="card">
                            <div class="card-body">
                                <div style="display:flex;align-items:center;">
                                    <div style="padding:3.8%;">
                                            <h5>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa reprehenderit aliquid pariatur, non delectus vel rem veritatis mollitia distinctio ipsa!</h5>
                                            <hr style="background-color: black" size="5">
                                            <h5>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi eveniet accusantium quae esse quaerat saepe beatae nisi praesentium minima et.</h5>
                                            <hr style="background-color: black" size="5">
                                            <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut odio quidem unde corporis officia. Adipisci repellat soluta quis tempore error!</h5>
                                            <hr style="background-color: black" size="5">
                                            <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut odio quidem unde corporis officia. Adipisci repellat soluta quis tempore error!</h5>
                                            <hr style="background-color: black" size="5">
                                            <h5>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aut odio quidem unde corporis officia. Adipisci repellat soluta quis tempore error!</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<script src="{{asset ('js/home.js')}}"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
