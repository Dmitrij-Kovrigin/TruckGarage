<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.tiny.cloud/1/t0jopdygd17dntcd9q8ewn34s44lvh7x1hoaiw6uzk60yh0g/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" style="background-black">
        <div class="container-fluid background-black">
            <a class="navbar-brand m-4" href="{{ url('/') }}">
                <h1 class="main_title">
                    <span class="anime">T</span>
                    <span class="anime">R</span>
                    <span class="anime">U</span>
                    <span class="anime">C</span>
                    <span class="anime">K </span>
                    <span class="anime">-</span>
                    <span class="anime">G</span>
                    <span class="anime">A</span>
                    <span class="anime">R</span>
                    <span class="anime">A</span>
                    <span class="anime">G</span>
                    <span class="anime">E</span>
                </h1>
            </a>
        </div>
        <nav class="navbar navbar-expand-md background-black">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Trucks
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('trucks') }}">
                                    All trucks
                                </a>
                                <a class="dropdown-item" href="{{ route('truck_create') }}">
                                    Create new truck
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Mechanics
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('mechanic_index') }}">
                                    All mechanics
                                </a>
                                <a class="dropdown-item" href="{{ route('mechanic_create') }}">
                                    Create new mechanic
                                </a>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @if ($errors->any())
                    <div class="alert">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    @if(session()->has('success_message'))
                    <div class="alert alert-success" role="alert">
                        {{session()->get('success_message')}}
                    </div>
                    @endif

                    @if(session()->has('info_message'))
                    <div class="alert alert-info" role="alert">
                        {{session()->get('info_message')}}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        tinymce.init({
            selector: '#textarea'
        })

    </script>
</body>
</html>
