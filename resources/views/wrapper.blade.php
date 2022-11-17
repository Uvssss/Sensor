<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!--Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i" rel="stylesheet">

        <!--vendors styles-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Bootstrap CSS / Color Scheme -->
        <link rel="stylesheet" href="{{ asset('css/default.css') }}" id="theme-color">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="theme-color">
        <script src="{{ asset("js/script.js")}}"></script>
    </head>

    <body style="background-color: #ececec">

        <!--navigation-->
        <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top sticky-navigation">
            <a class="navbar-brand mx-auto" href="/">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a id="navbarDropdown" class="nav-link" href="/profile" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">{{ __('Logout') }}</a>
                    </li>
                @endguest
                </ul>
            </div>
        </nav>
<div class="container-fluid">
    @yield("content")
</div>
    </body>
    </html>
