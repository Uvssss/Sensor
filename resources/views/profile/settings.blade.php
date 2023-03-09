@extends('wrapper')
@section('content')
<div class="container pt-7">
    <div class="card">
        <div class="card-header">Update User Credentials</div>
        <div class="card-body">
            <div class="row">
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
                        <div class="row">
                            <div class="text-center mt-3 col">
                                <button class="btn btn-primary">Update User</button>
                            </div>
                            <div class="text-center mt-3 col">
                                <a class="btn btn-warning" href="/deleteuser/{{Auth::user()->id}}">Delete User</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

