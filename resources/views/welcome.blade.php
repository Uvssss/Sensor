@extends('wrapper')
@section('content')
 <!--hero header-->
 <section class="" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-auto text-center">
                <h1>Sense</h1>
                <p class="lead mt-3 mb-5">
                    “Sense” is a sensor humidity and temperature management system that will display data in graphs,
                </p>
            </div>
        </div>
    </div>
</section>


<!--contact section-->
<section class="" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Want to work with us?</h2>
                <div class="divider bg-primary mx-auto"></div>
                <p class=" lead">
                    Are you working on something great? We'd love to help make it happen.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <form action="/form" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="name" name="name" class="form-control" placeholder="Your name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email"   required name="email" class="form-control" placeholder="Your email address">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" name="tel"  class="form-control" placeholder="Phone number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="url" name="url"  class="form-control" placeholder="Your website">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <textarea rows="5" name="text"   required class="form-control" placeholder="What are you looking for?"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Send your message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

