<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Arimo:400,400i,700,700i" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" id="theme-color">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" id="theme-color">
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.5.0/feather.min.js"></script>
    <script src="{{ asset('js/canvasjs/canvasjs.min.js') }}"></script>
</head>

<body style="background-color: #ececec">
    <nav class="navbar navbar-expand-md navbar-light bg-white fixed-top sticky-navigation">
        <a class="navbar-brand mx-auto" href="/">
            {{ config('app.name', 'Laravel') }}
        </a>

        <button class="navbar-toggler img navbar-toggler-right border-0" type="button" data-toggle="collapse"
            data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation"><img width="35px" height="35px"
                src="https://cdn.iconscout.com/icon/premium/png-256-thumb/mobile-menu-7-825750.png" alt="">
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
                        <li class="nav-item">
                            <a class="nav-link dropdown-item" href="/about">About</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class=" btn nav-link dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/home">Home</a>
                                <a class="dropdown-item" href="/profile">Profile</a>
                                <a class="dropdown-item" href="/about">About</a>
                                <hr style="background-color: black" size="5">
                                <a class="dropdown-item" href="/showdata">Show Data</a>
                                <a class="dropdown-item" href="/showdatamultiple">Show Data Multiple</a>
                                <a class="dropdown-item" href="/showsensors">Show Sensors</a>
                                @if ($perms_id == 2)
                                    <hr style="background-color: black" size="5">
                                    <a class="dropdown-item" href="/insertdata">Insert Data</a>
                                    <a class="dropdown-item" href="/sensors">Sensors</a>
                                @endif
                                @if ($perms_id > 2)
                                    <a class="dropdown-item" href="/insertdata">Insert Data</a>
                                    <a class="dropdown-item" href="/sensors">Sensors</a>
                                    <hr style="background-color: black" size="5">
                                    <a class="dropdown-item" href="/operator">Operator</a>
                                    <a class="dropdown-item" href="/restore">Restore Users</a>
                                @endif
                            </div>
                        </div>
                    </li>
                    <li class="nav-item" style="display:flex;align-items:center;">
                        <a class="nav-link" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                    </li>

                @endguest
            </ul>
        </div>
    </nav>
    <div class="container-fluid pt-6">
        @yield('content')
    </div>
</body>

</html>
