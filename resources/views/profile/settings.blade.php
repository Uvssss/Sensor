@extends('wrapper')
@section('content')
@section('content')
<div class="container-fluid pt-6 flex_center">
    <div class="container row ">
        <div class="col container ">
            <div class="card">
                <div class="card-header">{{ __('Update User Credentials') }}</div>
                <div class="card-body mr-5 ml-5" style="">
                    <form method="POST" action="/updateuser">
                        @csrf
                        <div class="form-group">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                                <input id="name1" type="text" class="form-control" name="name" readonly value="{{Auth::user()->name}}"  autocomplete="name" autofocus>
                        </div>

                        <div class="form-group">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <input id="emai1l" type="email" class="form-control " readonly name="email" value="{{Auth::user()->email}}"  autocomplete="email">
                        </div>

                        <div class="form-group">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group ">
                                <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        <div class="mb-0 form-group">
                            <div class="text-center">
                                <button id="reg_submit" onclick="CheckPassword()" class="btn btn-primary mr-3 my-2">
                                    {{ __('Update Account') }}
                                </button>
                                <a href="/deleteuser">
                                    <button id="" onclick="" class="btn btn-danger">{{ __('Delete Account') }}
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset ('js/checks.js')}}"></script>
@endsection
