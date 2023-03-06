@extends('wrapper')
@section('content')
 <!--hero header-->
 <section class="pt-7 pt-md-8" id="home">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto my-auto text-center">
                <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, recusandae.</h1>
                <p class="lead mt-4 mb-5">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus, vero!
                </p>
            </div>
        </div>
    </div>
</section>


<!--contact section-->
<section class="py-4" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Want to work with us?</h2>
                <div class="divider bg-primary mx-auto"></div>
                <p class="text-muted lead">
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
                                <input type="name" name="name" class="form-control" placeholder="Your name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Your email address">
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
                                <textarea rows="5" name="text"  class="form-control" placeholder="What are you looking for?"></textarea>
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

