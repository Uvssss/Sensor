@extends('wrapper')
@section('content')
<!--contact section-->
<section class="pt-7" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <h2>Update User credentials</h2>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-8 mx-auto">
                <form action="/profile" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email"  class="form-control"  name="email"value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newpassword">New password</label>
                                <input type="password"  class="form-control" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="newpassword">Confirm New password</label>
                                <input type="password"  class="form-control" name="confirm_passsword">
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button class="btn btn-primary">Update User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

